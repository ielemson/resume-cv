<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $name, $email, $message_body;
    public function __construct($name,$email,$message_body)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message_body = $message_body;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'info@ielemson.com';
        $subject = 'Contact Us';
        $title = 'My Portfolio';
        return $this->view('mail.contactus')
        ->from($address, $title)
        ->subject($subject)
        ->with(['name' => $this->name, 'email'=>$this->email,'message_body'=>$this->message_body]);
    }
}
