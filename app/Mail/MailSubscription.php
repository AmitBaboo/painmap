<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSubscription extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $mail_subscription;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_subscription)
    {
        $this->mail_subscription = $mail_subscription;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('PainMap Email Subscription')->view('email.subscribe');
    }
}
