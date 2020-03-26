<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CantactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailAddress,$emailMessage,$emailName,$emailSubject)
    {
        $this->emailName = $emailName;
        $this->emailMessage = $emailMessage;
        $this->emailAddress = $emailAddress;
        $this->emailSubject = $emailSubject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.testemail')
        ->with(['username'=>$this->emailName,'emailMessagge'=>$this->emailMessage,'emailAddress'=>$this->emailAddress])
        ->to('alex_994@ymail.com')
        ->from('provider@diemmesport.it');
    }
}
