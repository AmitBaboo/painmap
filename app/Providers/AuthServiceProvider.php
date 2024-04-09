<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->greeting('Hello,')
                ->line("Thank you for taking the time to discuss becoming a Pain Map Recommended Therapist. I'm very pleased to say that you have been accepted. You can now continue to create your profile and activate your account so that you can start to receive leads for people in your area who need your help.")
                ->action('Verify Email Address', $url)
                ->line('If you have any questions, please get in touch and we look forward to working with you.')
                ->line('Kind regards')
                ->salutation('The Pain Map Team');

            // ->line('Let me use this opportunity to welcome you to PainMap. Please verify your email address by clicking on the button below.')
            // ->action('Verify Email Address', $url)
            // ->line('If you are registering as a physio therapist, note that after verifying your email, our manager will contact you and show you the next steps to take.')
            // ->line('This will take place before your account is activated.')
            // ->line('Once again, we are glad you are here. Let join together to make the world a better place.');
        });
    }
}
