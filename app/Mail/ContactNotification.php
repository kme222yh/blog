<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($request)
     {
         $this->name = $request->name;
         $this->email = $request->email;
         $this->text = $request->message;
         $this->subject = $request->subject;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         $params = [
             'name' => $this->name,
             'email' => $this->email,
             'text' => $this->text,
             'subject' => $this->subject,
         ];
         return $this->view(['text'=>'emails.contact'])->with($params);
     }
}
