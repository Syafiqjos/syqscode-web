<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $letter;
    public $target;
    public $linked;
    public $linkeded;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($letter,$target,$linked,$linkeded)
    {
        $this->letter = $letter;
        $this->target = $target;
        $this->linked = $linked;
        $this->linkeded = $linkeded;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('aimaina@syqscode.com')->view('mails.newsletter_verification')->text('mails.newsletter_verification_text')->with(['target'=>$this->target,'link'=>$this->linked,'linked'=>$this->linkeded]);
    }
}
