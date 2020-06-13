<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $letter;
     public $fr;
     public $message;

    public function __construct($letter,$fr,$message)
    {
        $this->letter = $letter;
        $this->fr = $fr;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('aimaina@syqscode.com')->view('mails.request')->with(['from'=>$this->fr,'mess'=>$this->message]);
    }
}
