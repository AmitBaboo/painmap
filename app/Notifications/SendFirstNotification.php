<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendFirstNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $mail_content;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mail_content)
    {
        $this->mail_content = $mail_content;
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
            ->subject('How are you getting on?')
            ->greeting('Dear ' . $this->mail_content->full_name)
            ->line('How are you getting on with the exercises and advice we gave you to help start to relieve your pain? The key to doing the exercises consistently is to add them to something you already do.  Try doing them straight after you go to the toilet.  Or when you’re boiling the kettle for a cup of coffee.  Commit to doing them with something like: After I brush my teeth, I will do 15 of my shoulder exercises.  Then when you do them, give yourself a high five and go again the next time you brush your teeth.')
            ->line('Just a reminder, that if it’s not settling down, then you can speed things up with the products we recommended, by speaking to your recommended Therapist or by booking an online consultation here.')
            ->action('Book Appointment', url('https://www.truephysio.co.uk/clinics/online/'))
            ->line('We hope things are starting to feel better.')
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
