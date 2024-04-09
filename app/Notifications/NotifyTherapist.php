<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyTherapist extends Notification implements ShouldQueue
{
    use Queueable;

    public $_details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->_details = $details;
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
            ->subject('Pain Map Customer Allocation')
            ->greeting("Dear {$this->_details->full_name},")
            ->line('You have a new patient that has been allocated to you as they have completed the Pain Map symptom checker and are in your area. Please login to the Pain Map dashboard to access their details.')
            ->action('Click here to login', url("{$this->_details->host}/login"))
            ->line('We hope you can help them.')
            ->line('All the best')
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
