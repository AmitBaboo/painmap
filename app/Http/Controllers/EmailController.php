<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class EmailController extends Controller
{
    public function send_contactus_mail()
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        Mail::to('eaccomford@gmail.com')->send(new ContactUsMail($details));
       
        dd("Email is Sent.");
    }
}
