<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendResultEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $mail_details;

    public $theme = 'adminlte.css';


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_details)
    {
        $this->mail_details = $mail_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Here is your road map to pain relief')->view('email.resultemail', ['details' => $this->mail_details]);
    }
}
