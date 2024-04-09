<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSecondNotification extends Notification implements ShouldQueue
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
            ->line('Hopefully you’re starting to feel a little bit of improvement in your pain.  We wouldn’t expect you to be jumping around just yet, but if you’re following the advice and doing the exercises regularly, then things should be starting to improve. ')
            ->line('If your pain isn’t easing and your problem is very linked to something you’re doing, just try to ease back on that slightly, or change it a bit.  If it’s an activity then perhaps do slightly less if you can.  If it’s sitting that aggravates things, try to move a little more whilst you’re sitting and change where you sit regularly.')
            ->line('Most conditions should be showing some signs of improvement (however small) by now, so if you’re not improving, or you want to speed things up, then we’d really recommend you speak to the Recommended Therapist or book an online session.  They will be able to understand why it’s not starting to settle and can make sure you are feeling better as quickly as possible.')
            ->action('Book Appointment', url('https://www.truephysio.co.uk/clinics/online/'))
            ->line('All the best,')
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
