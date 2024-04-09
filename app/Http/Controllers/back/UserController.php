<?php

namespace App\Http\Controllers\back;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Plan;
use App\Models\User;
use App\Models\UserPlan;
use App\Models\ViewUsers;
use App\Notifications\WelcomeNotification;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use UAParser\Parser;
use Validator;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    use GeneralTrait;

    public function getSubscribedTherapists()
    {
        $therapists = ViewUsers::where('account_type', 2)
        ->whereNotBetween('id', [90, 1800])->get();
        return view('pages.back.therapists')
            ->with('therapists', $therapists)
            ->with("page_uri", 'therapists')
            ->with("parent", "features");
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserInfo(int $id)
    {
        $user = User::findOrFail($id);

        $data = null;

        if ($user) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data saved successfully";
            $data = $user;
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Data not saved. Something went wrong. Please try again";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message,
                "response_data" => $data
            ],
            $response_code
        );
    }

    public function updateTherapistInfo(Request $request, int $id)
    {
        $userUpdate = new UpdateUserProfileInformation();
        $user = User::findOrFail($id);

        $userData = $request->all();

        $result = $userUpdate->update($user, $userData);

        if ($request->status === 1) {
            event(new Registered($result));
        }

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data saved successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Data not saved. Something went wrong. Please try again";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message
            ],
            $response_code
        );
    }

    public function deleteTherepistInfo(int $id)
    {
        $data = User::where("id", $id)->update(["status" => -1]);

        if ($data) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data deleted successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry an error occured";
        }

        return response()->json($response_message, $response_code);
    }

    public function getNearestTherapist(string $postCode)
    {
        $therapists = $this->assignTherapistToCustomer($postCode, 0);

        $data = [];

        foreach ($therapists as $key => $value) {
            $data[] = User::findOrFail($value);
        }

        return response()->json([
            'response_message' => "Data attached",
            "response_data" => $data
        ]);
    }

    // Create a therapist user
    public function registerTherapist(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'contact_number' => ['numeric', 'regex:/^[0-9+]+$/'],
            ], [
                'numeric' => 'The :attribute must be a number.',
                'regex' => 'The :attribute may only contain numbers and the "+" sign.',
            ]);
            
            if ($validator->fails()) {
                return response()->json(
                    [
                        'response_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                        'response_message' => $validator->errors()->first()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            $createUser = new CreateNewUser();

            $therapistData = $request->all();

            if ($request->has('g-recaptcha-response')) {
                $recaptcha = $therapistData['g-recaptcha-response'];
                $res = $this->validateReCaptcha($recaptcha);

                if (!$res['success']) {
                    return response()->json(
                        [
                            'response_code' => Response::HTTP_BAD_REQUEST,
                            'response_message' => "Please indicate you are not a robot."
                        ],
                        Response::HTTP_BAD_REQUEST
                    );
                }
            }

            $result = $createUser->create($therapistData);

            if ($result) {
                // Send the welcome email to the therapist
                // $user = User::findOrFail($result->id);
                $result->notify(new WelcomeNotification);

                // Build response for the request
                $response_code = Response::HTTP_OK;
                $response_message = "Therapist saved successfully";
            } else {
                $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
                $response_message = "Sorry! An error occured. Please try again";
            }

            return response()->json(
                [
                    'response_code' => $response_code,
                    'response_message' => $response_message
                ],
                $response_code
            );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'response_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'response_message' => $th->getMessage()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    // Add admin users
    public function registerUser(Request $request)
    {
 
        $this->validate($request, [
            'full_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'numeric', 'regex:/^[0-9+]+$/', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $userData = $request->all();
        $userData['email'] = strtolower($userData['email']);
        $userData['account_type'] = 1;
        $userData['status'] = 2;
        $userData['website'] = "www.truephysio.com";
        $userData['post_code'] = 'LA1 4UW';
        $userData['password'] = Hash::make($userData['password']);
        $userData["created_by"] = Auth::id();

        $result = DB::transaction(function () use ($userData) {
            return User::create($userData);
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            event(new Registered($result));
            $response_message = "Data saved successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message
            ],
            $response_code
        );
    }

    public function checkEmail(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        return ($user) ? "false" : "true";
    }

    public function getAnalyticsData()
    {
        $analyticsData = [];

        $db_data = DB::select("select status_name, count(status_name) frequency from users_vw where account_type='2' group by status_name order by status_name");

        foreach ($db_data as $key) {
            $analyticsData[$key->status_name] = $key->frequency;
        }
        return response()->json($analyticsData);
    }

    public function showPlans()
    {
        $plans = Plan::all();

        return view("pages.back.account_setup.subscribe")
            ->with("plans", $plans);
    }

    public function storeUserPlan(Request $request)
    {
        $this->validate($request, [
            'plan_id' => 'required|integer'
        ]);

        $user_id = Auth::id();

        $therapist = UserPlan::where('user_id', $user_id)->first();

        $user_action = (isset($therapist->id)) ? 'updated_by' : 'created_by';

        $user_plan = $request->except('_token');
        $user_plan['user_id'] = $user_id;
        $user_plan[$user_action] = $user_id;

        $result = DB::transaction(function () use ($user_plan, $therapist) {
            // Save plan for the user
            return (isset($therapist->id))
                ? $therapist->update($user_plan)
                : UserPlan::create($user_plan);
        });


        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data saved successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message
            ],
            $response_code
        );
    }

    public function logOutUser(Request $request)
    {
        // $user = User::findOrFail(Auth::id());
        // $user->online_status = 0;
        // $user->save();

        auth('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(['status' => 200], 200);

        // return redirect('/');
    }

    public function getNumberOfOnlineUsers()
    {
        $numberOfOnlineUsers = User::where("online_status", 1)->count();

        return response()->json(['userOnline', $numberOfOnlineUsers], 200);
    }

    public function updateUserInfo(Request $request)
    {
        $userUpdate = new UpdateUserProfileInformation();
        $user = User::findOrFail(Auth::id());

        $userData = $request->all();

        $result = $userUpdate->update($user, $userData);

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Profile Updated successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured. Please try again";
        }

        return response()->json(
            [
                'response_code' => $response_code,
                'response_message' => $response_message
            ],
            $response_code
        );
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            "current_password" => "required|string",
            "password" => "required|string|confirmed"
        ]);

        $user = User::findOrFail(Auth::id());

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $result = $user->save();
            if ($result) {
                $response_code = Response::HTTP_OK;
                $response_message = "Password changed successfully";
            } else {
                $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
                $response_message = "Sorry! An error occured. Please try again later.";
            }
        } else {
            $response_code = Response::HTTP_UNPROCESSABLE_ENTITY;
            $response_message = "The provided password does not match your current password.";
        }

        return response()->json(
            [
                'response_code' => $response_code,
                'response_message' => $response_message
            ],
            $response_code
        );
    }

    public function loadUserPhoto(Request $request)
    {
        $this->validate($request, [
            "user_photo" => "required|image|max:1024"
        ]);

        $user = User::findOrFail(Auth::id());

        if (isset($request->user_photo)) {
            $user->updateProfilePhoto($request->user_photo);
            $response_code = Response::HTTP_OK;
            $response_message = "Image uploaded successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json(
            [
                'response_code' => $response_code,
                'response_message' => $response_message
            ],
            $response_code
        );
    }

    public function showDesiredPage()
    {
        $user = User::findOrFail(Auth::id());
        $user_plan = UserPlan::where('user_id', $user->id)->first();

        if (!isset($user->profile_photo_path)) {
            return redirect("/upload-photo");
        }

        if (!isset($user_plan->user_id)) {
            return redirect("/show-plans");
        }

        if (!$user->subscribed()) {
            return redirect("/plan-payment");
        }
    }

    public function getUserProfileInformation()
    {
        $current_device = Session::getId();
        $devices = DB::table('sessions')
            ->where('user_id', Auth::user()->id)
            ->get()->reverse();

        $userAgentParser = Parser::create();

        foreach ($devices as $key) {
            $result = $userAgentParser->parse($key->user_agent);
            $key->platform = $result->os->toString();
            $key->browser =  $result->ua->toString();
        }

        return view("pages.back.show", [
            "user" => Auth::user(),
            "devices" => $devices,
            'current_device' => $current_device
        ]);
    }

    public function logoutDevice(Request $request, $device_id)
    {
        DB::table('sessions')
            ->where('id', $device_id)->delete();

        return redirect('/profile');
    }

    public function findAndAssignTherapist(Request $request)
    {
        $customer = Customer::findOrFail($request->customer_id);

        $therapist_id = $this->assignTherapistToCustomer($customer->post_code);

        if ($therapist_id > 0) {
            $user = User::findOrFail($therapist_id);
            $customer->therapist_id = $therapist_id;
            $customer->status = 0;
            $customer->save();
            $response_code = 200;
            $response_message = "We found {$user->first_name} to be closest and has been assigned successfully";
        } else {
            $response_code = 202;
            $response_message = "Sorry we couldn't find any close therapist for customer";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message
            ],
            $response_code
        );
    }

    public function getUserSubscription()
    {

        $user = User::findOrFail(Auth::id());
        $user_plan = UserPlan::where('user_id', $user->id)->first();

        $invoices = $user->invoices()->sortByDesc('date')->all();

        $plan_details = Plan::findOrFail($user_plan->plan_id);

        if ($user->subscription('default')->onGracePeriod()) {
            // $due_date = Carbon::parse($user->subscription('default')->endsAt);
            $due_date = Carbon::parse($user->payment_date)->addDays(30);
            $date_due = $due_date->format('j M, Y');
            $button = 'Subscription Cancelled';
        } else {
            $button = 'Cancel Subscription';
        }

        return view('pages.back.therapist.subscription')
            ->with('page_uri', 'subscription')
            ->with('plan_details', $plan_details)
            ->with('invoices', $invoices)
            ->with('date_due', isset($date_due) ? $date_due : null)
            ->with('button', $button);
    }

    public function showPlanPayment()
    {
        $plan_id = UserPlan::select('plan_id')->where('user_id', Auth::id())->first()->plan_id;
        return view("pages.back.account_setup.payment", ['plan' => Plan::where('id', $plan_id)->first()]);
    }

    public function uploadPhoto()
    {
        return view("pages.back.account_setup.load_photo", ['photo' => Auth::user()->profilePhoto]);
    }

    public function downloadInvoice(Request $request, $invoiceId)
    {
        $user_id = $request->user()->id;
        $plan_id = UserPlan::select('plan_id')->where('user_id', $user_id)->first()->plan_id;
        $plan_name = Plan::select('name')->where('id', $plan_id)->first()->name;

        return $request->user()->downloadInvoice($invoiceId, [
            'vendor' => "TruePhysio",
            'street' => 'Broadway House, 74 Broadway Street',
            'location' => 'Oldham, England, OL8 1LR.',
            'url' => 'www.truephysio.co.uk',
            'product' => $plan_name,
        ]);
    }
}
