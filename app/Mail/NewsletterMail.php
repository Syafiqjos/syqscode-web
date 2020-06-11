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
    public $target;
    public $post;
    public $unlink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($letter,$target,$post,$unlink)
    {
        $this->letter = $letter;
        $this->target = $target;
        $this->post = $post;
        $this->unlink = $unlink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->from('aimaina@syqscode.com')->view('mails.newsletter')->text('mails.newsletter_text')->with(['target'=>$this->target,'post'=>$this->post,'unverif'=>$this->unlink]);
    }
}
