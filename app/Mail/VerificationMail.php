<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $letter;
    public $target;
    public $linked;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($letter,$target,$linked)
    {
        $this->letter = $letter;
        $this->target = $target;
        $this->linked = $linked;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('aimaina@syqscode.com')->view('mails.verification')->text('mails.verification_text')->with(['target'=>$this->target,'link'=>$this->linked]);
    }
}
