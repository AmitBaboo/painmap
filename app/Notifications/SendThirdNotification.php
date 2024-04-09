<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendThirdNotification extends Notification implements ShouldQueue
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
            ->subject('Things should be starting to feel a bit better')
            ->greeting('Dear ' . $this->mail_content->full_name)
            ->line('It’s been 10 days since you got your road map to pain relief from us here at Pain Map.  We hope that it’s been useful and that you’re really starting to feel like there is light at the end of the tunnel.')
            ->line('If you are, then that’s brilliant.  Keep going with the exercises, but if you want it to disappear, or you want to work on preventing it happening again, then speak to your Recommended Therapist.')
            ->line('If it’s not improving, then don’t worry.  That doesn’t mean it’s serious or won’t improve, it just means that we’re missing something at the moment.  We’d definitely suggest you speak to your Recommended Therapist or book an online consultation to kick start things and get you feeling better as soon as possible.')
            ->action('Book Appointment', url('https://www.truephysio.co.uk/clinics/online/'))
            ->line('We hope we have helped you feel better, or at the very least helped you find a Therapist that can help you from here.')
            ->line('Take care and we hope you feel back to normal soon,')
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
