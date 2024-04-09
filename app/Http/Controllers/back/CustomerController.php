<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Mail\SendResultEmail;
use App\Models\ContactUs;
use App\Models\Customer;
use App\Models\PostCode;
use App\Models\ResultView;
use App\Models\User;
use App\Models\ViewCustomer;
use App\Notifications\NotifyTherapist;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use stdClass;

class CustomerController extends Controller
{
    use GeneralTrait;

    public function getCustomers()
    {
        $customers = ViewCustomer::all();
        return view("pages.back.customers")
            ->with("customers", $customers)
            ->with("page_uri", 'customers')
            ->with("parent", "features");
    }

    public function getAssignedCustomers()
    {
        $assignedCustomers = ViewCustomer::where('therapist_id', Auth::id())->where('status', '<>', -1)->orderBy('id', 'desc')->get();
        return view("pages.back.therapist.customers")
            ->with("customers", $assignedCustomers)
            ->with("page_uri", 'therapist_customers')
            ->with("parent", "therapist");
    }

    public function getAnalyticsData()
    {
        $analyticsData = [];
        if (Auth::user()->account_type == 2) {
            $therapist = Auth::id();
            $db_data = DB::select("select status_name, count(status_name) frequency from customers_vw where therapist_id=? group by status_name order by status_name", [$therapist]);
        } else {
            $db_data = DB::select("select status_name, count(status_name) frequency from customers_vw group by status_name order by status_name");
        }

        foreach ($db_data as $key) {
            $analyticsData[$key->status_name] = $key->frequency;
        }
        return response()->json($analyticsData);
    }

    public function storeCustomerInfo(Request $request)
    {
        
        $this->validate($request, [
            "full_name" => "required|string|max:150",
            // "email" => "nullable|email",
            // "contact_number" => "nullable|max:11|min:11",
            "post_code" => "required|string|exists:postcodelatlng,postcode",
           'g-recaptcha-response' => 'required|captcha',
            // 'post_code' => ['required', 'regex:/[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}$/']
        ]); 

        $customerPoint = PostCode::getLongitudeLatitude(strtoupper($request->post_code)); 
        $latitude = $customerPoint['latitude'];  // Latitude of the reference point
        $longitude = $customerPoint['longitude'];  // Longitude of the reference point
        $radius = 15;  // Radius in miles

        $earthRadius = 3959;  // Radius of the Earth in miles

        $users = User::with('postalCode')
        ->select('users.*')
        ->selectRaw("{$earthRadius} * ACOS(
            COS(RADIANS({$latitude})) * COS(RADIANS(postcodelatlng.latitude)) *
            COS(RADIANS(postcodelatlng.longitude) - RADIANS({$longitude})) +
            SIN(RADIANS({$latitude})) * SIN(RADIANS(postcodelatlng.latitude))
        ) AS distance")
        ->join('postcodelatlng', 'postcodelatlng.postcode', '=', 'users.post_code')
        ->having('distance', '<=', $radius)
        ->where(
            [
              ['account_type', 2],
              ['status', 2], 
            ]
        )
        ->orderBy('distance')
        ->first(); 

        $therapist_id = $users->id ?? 0; 
        
        $requestData = $request->all();
        $requestData['therapist_id'] = $therapist_id;
        $requestData['post_code'] = strtoupper($requestData['post_code']);
        $requestData['status'] = ($therapist_id > 0) ? 0 : -1;
        $requestData['can_call'] = isset($request->canCall) ? 1 : null;
        $requestData['can_email'] = isset($request->canEmail) ? 1 : null;

        

        // Get the host of the application
        $host = env('APP_URL');

        // Get details to send to the customer as email
        $result_details = ResultView::firstWhere('id', $request->result);

        // Find the specific therapist assigned
        $therapist = User::find($therapist_id);

        // Build the details to be sent to the email
        $email_details = new stdClass();
        $email_details->host = $host;
        $email_details->full_name = $request->full_name;
        $email_details->diagnosis = $result_details->question;
        $email_details->video = $result_details->video_path;
        $email_details->products = Controller::formlizeProductData($result_details->products, $email_details->host);

        // save the result to the customer's table
        $requestData['result'] = $email_details->diagnosis;

        // Actually create the customer information in the database
        // This should return a customer model instance when there is not error.
        // The model instance is going to be used to send the initial email to customer.
        $result = Customer::create($requestData);

        // Initialise the response data
        $data = new stdClass();

        if ($result) {
            // Build the response data
            $data->therapist = ($therapist !== null) ? $therapist->only([
                'full_name',
                'contact_number',
                'email',
                'profile_photo_path',
                'website',
                'company_bio',
                'profilePhoto'
            ]) : null;
            $data->customer = $result;


            // Add therapist info to the email
            $email_details->therapist = $therapist;
            if (isset($email_details->therapist->profile_photo_path)) {
                $email_details->therapist->profile_photo_path = $email_details->host . '/storage/' . $email_details->therapist->profile_photo_path;
            }

            // Send a notification to the customer if email is provided by customer
            if (isset($result->email)) {
                Mail::to($result->email)->send(new SendResultEmail($email_details));
            }

            // Send a notification to the therapist to inform him/her of the customer allocation
            if ($therapist !== null) {
                $therapist->host = $host;
                $therapist->notify(new NotifyTherapist($therapist));
            }

            // Send information and data to the frontend
            $response_code = Response::HTTP_OK;
            $response_message = "Data saved successfully";
            $response_data = $data;
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Data not saved. Something went wrong. Please try again";
            $response_data = $data;
        }

        return response()->json([
            'response_code' => $response_code,
            'response_message' => $response_message,
            'response_data' => $response_data
        ], $response_code);
    }

    public function updateCustomerInfo(Request $request, int $id)
    {
        $this->validate($request, [
            "status" => "required|integer",
            "therapist_id" => "nullable|integer"
        ]);

        $customer = Customer::findOrFail($id);

        $requestData = $request->all();
        $requestData['updated_by'] = Auth::id();

        $result = DB::transaction(function () use ($requestData, &$customer) {
            $customer->update($requestData);
            return 1;
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data saved successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json([
            "response_code" => $response_code,
            "response_message" => $response_message
        ], $response_code);
    }

    public function deleteCustomerInfo(int $id)
    {
        $data = Customer::where("id", $id)->update(["status" => -1]);

        if ($data) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data deleted successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry an error occured";
        }

        return response()->json($response_message, $response_code);
    }

    public function sendEnquiry(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required|string|max:100',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|string'
        ]);

        $email_data = $request->all();

        $recaptcha = $email_data['g-recaptcha-response'];
        $res = $this->validateReCaptcha($recaptcha);
        if (!$res['success']) {
            $response_code = Response::HTTP_BAD_REQUEST;
            $response_message = "Sorry! Please indicate you are not a robot.";
        } else {
            $result = DB::transaction(function () use ($email_data) {
                // Mail::to($email_data['email'])
                //     ->send(new ContactUsMail($email_data));
                // return 1;
                return ContactUs::create($email_data);
            });

            if ($result) {
                $response_code = Response::HTTP_OK;
                $response_message = "Enquiry sent successfully";
            } else {
                $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
                $response_message = "Sorry! An error occured.";
            }
        }





        return response()->json([
            "response_code" => $response_code,
            "response_message" => $response_message
        ], $response_code);
    }

    public function getContactUsInformation()
    {
        $contact_us_information = ContactUs::orderBy('created_at', 'desc')->get();

        return view("pages.back.contact_us", [
            'page_uri' => 'contact_us',
            'parent' => 'features',
            'contact_us_data' => $contact_us_information
        ]);
    }
}