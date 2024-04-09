<?php

use App\Mail\SendResultEmail;
use App\Models\Customer;
use App\Models\PageContent;
use App\Models\Plan;
use App\Models\ResultView;
use App\Models\UserPlan;
use App\Notifications\ResultNotification;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// use PDF;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend routes
Route::get('/symptoms-checker', [App\Http\Controllers\SymptomsCheckerController::class, 'index'])->name('symptoms-checker');
Route::get('/product', [App\Http\Controllers\PageController::class, 'index'])->name('product');
Route::get('/about', [App\Http\Controllers\PageController::class, 'index'])->name('about');
Route::get('/painmap', [App\Http\Controllers\PageController::class, 'index'])->name('painmap');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'index'])->name('contact');
Route::get('/faq', [App\Http\Controllers\PageController::class, 'index'])->name('faq');
Route::get('/article', [App\Http\Controllers\PageController::class, 'index'])->name('article');
Route::get('/video', [App\Http\Controllers\PageController::class, 'index'])->name('video');
Route::get('/advice', [App\Http\Controllers\PageController::class, 'index'])->name('advice');
Route::get('/home', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/disclaimer', [App\Http\Controllers\PageController::class, 'disclaimer'])->name('disclaimer');
Route::get('/landing-page', [App\Http\Controllers\PageController::class, 'landing_page'])->name('landing-page');
Route::get('/policy/{type}', [App\Http\Controllers\PageController::class, 'policy'])->name('policy');
Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/article-details/{id}', [App\Http\Controllers\PageController::class, 'article_details'])->name('article-details');

Route::get('/load_question/{id}', [App\Http\Controllers\PageController::class, 'load_question']);

// loading code snippet 
Route::get('/load_init_question/{id}', [App\Http\Controllers\PageController::class, 'load_init_question']);

// Backend public routes
Route::post('/customers', [App\Http\Controllers\back\CustomerController::class, 'storeCustomerInfo']);
Route::post('/register-therapist', [App\Http\Controllers\back\UserController::class, 'registerTherapist'])->middleware('throttle:2,60');
Route::post('/admin/register-therapist', [App\Http\Controllers\back\UserController::class, 'registerTherapist']);

Route::get('/plans-home', [App\Http\Controllers\PlanController::class, 'plans_home'])->name('plans.home');

Route::get('/show-app-plans', [App\Http\Controllers\PlanController::class, 'showPlans']);
Route::get('/payment', [App\Http\Controllers\PlanController::class, 'payment']);
Route::get('/plan/{plan}', [App\Http\Controllers\PlanController::class, 'show'])->name('plans.show');
Route::post('/subscription', [App\Http\Controllers\SubscriptionController::class, 'create'])->name('subscription.create');

Route::get('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripe']);
Route::post('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('stripe.post');


Route::get('registration-form', function () {
    return view('pages/front/registrationForm');
});

// User needs to be authenticated, email verified and account setup before going to any of these routes
// Route::group(['middleware' => ['auth:sanctum', 'verified', 'accountsetup']], function () {
// Route::group(['middleware' => ['auth:sanctum', 'verified', 'hasphoto', 'hasplan', 'haspaid']], function () {
Route::group(['middleware' => ['auth:sanctum', 'verified', 'hasphoto']], function () {

    // Plan routes
    Route::get('/plans', [App\Http\Controllers\PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/{id}', [App\Http\Controllers\PlanController::class, 'showPlan']);
    Route::post('/plans', [App\Http\Controllers\PlanController::class, 'storePlan'])->name('plans.store');
    Route::post('/plans/{id}', [App\Http\Controllers\PlanController::class, 'updatePlan'])->name('plans.update');
    Route::delete('/plans/{id}', [App\Http\Controllers\PlanController::class, 'deletePlan'])->name('plans.delete');

    // Invoice Routes
    Route::get('/user/invoice/{invoice}', [App\Http\Controllers\back\UserController::class, 'downloadInvoice']);

    // cms 
    Route::get('/page_editable_content/{pageId}', [App\Http\Controllers\back\PageController::class, 'page_editable_content']);
    Route::get('/delete_page_content/{id}', [App\Http\Controllers\back\PageController::class, 'delete_page_content']);
    Route::get('/page_add_content/{pageId}', [App\Http\Controllers\back\PageController::class, 'page_add_content']);
    Route::get('/load_page_content/{pageId}', [App\Http\Controllers\back\PageController::class, 'load_page_content']);
    Route::post('/add_page_content', [App\Http\Controllers\back\PageController::class, 'add_page_content']);
    Route::post('/edit_page_content', [App\Http\Controllers\back\PageController::class, 'edit_page_content']);

    Route::get('/categories', [App\Http\Controllers\back\CategoryController::class, 'categories']);
    Route::post('/add_category', [App\Http\Controllers\back\CategoryController::class, 'add_category']);
    Route::post('/edit_category', [App\Http\Controllers\back\CategoryController::class, 'edit_category']);
    Route::get('/delete_category/{id}/{status}', [App\Http\Controllers\back\CategoryController::class, 'delete_category']);

    Route::get('/sub-categories', [App\Http\Controllers\back\CategoryController::class, 'sub_categories']);
    Route::post('/add_sub_category', [App\Http\Controllers\back\CategoryController::class, 'add_sub_category']);
    Route::post('/edit_sub_category', [App\Http\Controllers\back\CategoryController::class, 'edit_sub_category']);
    Route::get('/delete_sub_category/{id}/{status}', [App\Http\Controllers\back\CategoryController::class, 'delete_sub_category']);

    Route::get('/admin-about', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-advice', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-home', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-faq', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-product', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-blog', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-contact', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-painmap', [App\Http\Controllers\back\PageController::class, 'index']);
    Route::get('/admin-landing', [App\Http\Controllers\back\PageController::class, 'index']);

    // Dasboard
    Route::get('/dashboard', [App\Http\Controllers\back\DashboardController::class, 'index']);

    // symtom checker
    Route::get('/load_question_answers/{id}', [App\Http\Controllers\back\SymptomsCheckerController::class, 'load_question_answers']);
    Route::get('/load_question_follow_up/{bodypartid}/{questionid}', [App\Http\Controllers\back\SymptomsCheckerController::class, 'load_question_follow_up']);
    Route::get('/load_question_update/{questionid}', [App\Http\Controllers\back\SymptomsCheckerController::class, 'load_question_update']);
    Route::post('/set_question', [App\Http\Controllers\back\SymptomsCheckerController::class, 'set_question']);
    Route::post('/set_question_answer', [App\Http\Controllers\back\SymptomsCheckerController::class, 'set_question_answer']);
    Route::post('/update_question', [App\Http\Controllers\back\SymptomsCheckerController::class, 'update_question']);
    Route::post('/save_final_question', [App\Http\Controllers\back\SymptomsCheckerController::class, 'save_final_question']);
    Route::get('/delete_question/{id}', [App\Http\Controllers\back\SymptomsCheckerController::class, 'destroy']);
    Route::get('/make-symptoms-checker', [App\Http\Controllers\back\SymptomsCheckerController::class, 'index']);
    Route::post('/set_init_question', [App\Http\Controllers\back\SymptomsCheckerController::class, 'set_init_question']);

    // Customer routes
    Route::get('/customers', [App\Http\Controllers\back\CustomerController::class, 'getCustomers']);
    Route::get('/assigned-customers', [App\Http\Controllers\back\CustomerController::class, 'getAssignedCustomers']);
    Route::post('/customers/{id}', [App\Http\Controllers\back\CustomerController::class, 'updateCustomerInfo']);
    Route::delete('/customers/{id}', [App\Http\Controllers\back\CustomerController::class, 'deleteCustomerInfo']);


    // Therpists
    Route::get('/therapists', [App\Http\Controllers\back\UserController::class, 'getSubscribedTherapists']);
    Route::post('/therapists/{id}', [App\Http\Controllers\back\UserController::class, 'updateTherapistInfo']);
    Route::get('/user-subscription', [App\Http\Controllers\back\UserController::class, 'getUserSubscription']);
    Route::get('/users/{id}', [App\Http\Controllers\back\UserController::class, 'getUserInfo']);

    // Resources
    Route::get("/resources", [App\Http\Controllers\back\ResourceController::class, "getResources"]);
    Route::get("/therapist-resources", [App\Http\Controllers\back\ResourceController::class, "getTherapistResources"]);
    Route::post("/resources", [App\Http\Controllers\back\ResourceController::class, "storeResource"]);
    Route::get("/resources/{id}", [App\Http\Controllers\back\ResourceController::class, "getResource"]);
    Route::post("/resources/{id}", [App\Http\Controllers\back\ResourceController::class, "updateResource"]);
    Route::delete("/resources/{id}", [App\Http\Controllers\back\ResourceController::class, "deleteResource"]);

    // Add user route
    Route::post('/register-user', [App\Http\Controllers\back\UserController::class, 'registerUser']);
    Route::post('/logout-user', [App\Http\Controllers\back\UserController::class, 'logOutUser']);

    Route::post("/update-user-info", [App\Http\Controllers\back\UserController::class, "updateUserInfo"]);
    Route::post("/change-password", [App\Http\Controllers\back\UserController::class, "changePassword"]);

    Route::get("/profile", [App\Http\Controllers\back\UserController::class, "getUserProfileInformation"]);
    Route::get("/logout-device/{id}", [App\Http\Controllers\back\UserController::class, "logoutDevice"]);

    Route::post("/find-assign-therapist", [App\Http\Controllers\back\UserController::class, "findAndAssignTherapist"]);

    // Analystics
    Route::get("/customers-stat-data", [App\Http\Controllers\back\CustomerController::class, "getAnalyticsData"]);
    Route::get("/therapist-stat-data", [App\Http\Controllers\back\UserController::class, "getAnalyticsData"]);

    // Subscriptions
    Route::post('/cancel-subscription', [App\Http\Controllers\SubscriptionController::class, "cancelSubscription"]);

    // Contact Us
    Route::get("/contact-us", [App\Http\Controllers\back\CustomerController::class, "getContactUsInformation"]);

    // Email Subscription
    Route::get("/email-subscription", [App\Http\Controllers\back\EmailSubscriptionController::class, "getEmailSubscription"]);
});

// User setup route
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/redirect', [App\Http\Controllers\back\UserController::class, "showDesiredPage"]);
    Route::get("/show-plans", [App\Http\Controllers\back\UserController::class, "showPlans"]);
    Route::get("/upload-photo", [App\Http\Controllers\back\UserController::class, "uploadPhoto"]);

    Route::post("/upload-photo", [App\Http\Controllers\back\UserController::class, "loadUserPhoto"]);
    Route::post("/save-plan", [App\Http\Controllers\back\UserController::class, "storeUserPlan"]);
    Route::get("/plan-payment", [App\Http\Controllers\PlanController::class, 'show']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/dashboard');
    })->middleware(['signed'])->name('verification.verify');
});


// External customer routes
Route::get('/nearest-therapist', [App\Http\Controllers\back\UserController::class, 'getNearestTherapist']);
Route::get("/post-code/{id}", [App\Http\Controllers\PageController::class, 'getPostCode']);

// Password reset route
Route::get('/reset', function (Request $request) {
    return view('auth.reset-password');
});

Route::get("/contact-mail", [App\Http\Controllers\EmailController::class, "send_contactus_mail"]);
// Route::get("/users-online", [App\Http\Controllers\back\UserController::class, "getNumberOfOnlineUsers"]);

Route::get("/checkFistQuestionSet/{id}", [App\Http\Controllers\SymptomsCheckerController::class, "checkFistQuestionSet"]);
Route::get("/deleteQuestionAnswer/{id}", [App\Http\Controllers\back\SymptomsCheckerController::class, "deleteQuestionAnswer"]);
Route::post("/addQuestionAnswer", [App\Http\Controllers\back\SymptomsCheckerController::class, "addQuestionAnswer"]);

// Emails
Route::post('/save-subscription', [App\Http\Controllers\back\EmailSubscriptionController::class, 'store']);
Route::post("/email-subscription", [App\Http\Controllers\back\EmailSubscriptionController::class, "sendSubscriptionEmail"]);
Route::get('/check-email', [App\Http\Controllers\back\UserController::class, 'checkEmail']);

// Contact Us
Route::post("/contact-us", [App\Http\Controllers\back\CustomerController::class, "sendEnquiry"]);

// Route::get('/invoice-pdf', function () {

//     $pdf = PDF::loadView('pages.back.pdf');

//     // download PDF file with download method
//     return $pdf->download('pdf_file.pdf');
//     // return view('vendor.cashier.receipt', [
//     //     'vendor' => "TruePhysio",
//     //     'street' => 'Broadway House, 74 Broadway Street',
//     //     'location' => 'Oldham, England, OL8 1LR.',
//     //     'url' => 'www.truephysio.co.uk',
//     //     'product' => "plan_name",
//     // ]);
// });

// Testing routes
Route::get("/get-distance/{post_code}", [App\Http\Controllers\Controller::class, "assignTherapistToCustomer"]);

Route::get('/result-email', function () {
    $email_details = new stdClass();
    $email_details->host = 'http://localhost:1010';

    $customer = Customer::findOrFail(4);

    // Get details to send to the customer as email
    $result_details = ResultView::where('id', 224)->first();
    $therapist = \App\Models\User::select(['id', 'profile_photo_path', 'full_name', 'website', 'company_bio', 'contact_number', 'email'])->where('id', 7)->first();
    $therapist->profile_photo_path = $email_details->host . '/storage/' . $therapist->profile_photo_path;


    $email_details->full_name = $customer->full_name;
    $email_details->diagnosis = implode(' ', explode('\n\n', $result_details->question));
    $email_details->therapist = $therapist;
    $email_details->video = $result_details->video_path;
    $email_details->products = \App\Http\Controllers\Controller::formlizeProductData($result_details->products, $email_details->host);

    // return response()->json($email_details);
    Mail::to($customer->email)
        ->send(new SendResultEmail($email_details));

    // Mail::send('email.resultemail', ['details' => $email_details], function ($message) use ($customer) {
    //     $message->to($customer->email)->subject('Password reset');
    // });

    // return view('email.resultemail', ['details' => $email_details]);
});

Route::get('/show-therapist', function () {
    return view("pages.back.therapist_show");
});

Route::get('/email', function () {
    return view('email.temp');
});
