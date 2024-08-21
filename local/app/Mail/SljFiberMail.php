<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SljFiberMail extends Mailable
{
    use Queueable, SerializesModels;

    private $attachmentPath;

    private $attachmentName;

    private $title;

    private $body;

    private $mailSubject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attachmentPath, $attachmentName, $title, $body, $mailSubject)
    {
        $this->attachmentPath = $attachmentPath;
        $this->attachmentName = $attachmentName;
        $this->title = $title;
        $this->body = $body;
        $this->mailSubject = $mailSubject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $this->subject("subject");
        // $this markdown(string $view, array $data = [])
        // $this->from(object|array|string $address, string|null $name = null)

        $mail = $this->view('emails.sljMail')->with([
            'title' => $this->title, 
            'body'  => $this->body
        ]);
        $mail = $mail
        // ->subject($this->mailSubject)
        ->attach(
            // public_path('pdf/invoices/example.pdf')
            $this->attachmentPath, [
                'as' => $this->attachmentName,
                // 'as' => 'example.pdf', // optional
                'mime' => 'application/pdf', // optional
            ]
        );
        // you can add other attachment if you want
        return $mail;
    }
}
