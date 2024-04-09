<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerResponseBindings();
    }

    protected function registerResponseBindings()
    {
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
        $this->app->singleton(TwoFactorLoginResponseContract::class, TwoFactorLoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view("auth.login");
        });

        Fortify::registerView(function () {
            return view("auth.register");
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view("auth.forgot-password");
        });

        Fortify::resetPasswordView(function ($request) {
            return view("auth.reset-password", ["request" => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view("auth.verify-email");
        });

        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge');
        });

        // Customise the authentication process
        Fortify::authenticateUsing(function (Request $request) {
            $requestEmail = strtolower($request->email);
            $user = User::where('email', $requestEmail)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                if (in_array($user->status, [1, 2])) {
                    // $user->online_status = 1;
                    // $user->save();

                    return $user;
                } else {
                    throw ValidationException::withMessages([
                        Fortify::email() => "Your account is inactive. Please contact PainMap Administrator for assistance.",
                    ]);
                }
            } else {
                throw ValidationException::withMessages([
                    Fortify::email() => "Invalid credentials. Please verify your email and/or password and try again.",
                ]);
            }
        });
    }
}
