<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTemplate extends Mailable
{
    use Queueable, SerializesModels;

   

    private $title;

    private $body;

    private $mailSubject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $body, $mailSubject)
    {
        $this->title = $title;
        $this->body = $body;
        $this->mailSubject = $mailSubject;
    }

    
    public function build()
    {
     
        $mail = $this->view('testmail')->with([
            'title' => $this->title, 
            'body'  => $this->body
        ]);
        
        return $mail;
    }
}


