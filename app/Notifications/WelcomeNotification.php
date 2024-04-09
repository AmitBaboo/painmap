<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(env('MAIL_FROM_ADDRESS'), "Pain Map")
            ->subject('Welcome To Pain Map')
            ->greeting('Hello,')
            ->line('Welcome to Pain Map. Thank you so much for showing interest in becoming a Pain Map Recommended Therapist.')
            ->line('We will get in touch with you very soon to carry out our interview process to make sure that you meet the criteria for becoming a Recommended Therapist. We will also talk through the next steps. Don’t worry, there’s not a lot of work, but it’s very important to us that we get the best Therapists to treat our users.')
            ->line('Until you’ve completed these steps, your account won’t be activated.')
            ->line('Thank you again for requesting to join us and we look forward to speaking to you.')
            ->line('Kind regards')
            ->salutation('The Pain Map Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
