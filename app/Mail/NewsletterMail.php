<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $letter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($letter)
    {
        $this->letter = $letter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('aimaina@syqscode.com')->view('mails.newsletter')->text('mails.newsletter_text')->with(['a'=>'a']);
    }
}
