<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TermsandConditions extends Mailable
{
    
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
         $this->subject('Thanking You for Accepted Terms & Conditions - SLJ Fiber Networks')->view('customers::acceptedtermsconditions')->with('$details');
         return $this;
    }
}
