<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $letter;
    public $fr;
    public $target;
    public $post;
    public $selfcontent;
    public $content;
    public $unverif;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($letter,$fr,$target,$post,$selfcontent,$content,$unverif)
    {
        $this->letter = $letter;
        $this->fr = $fr;
        $this->target = $target;
        $this->post = $post;
        $this->selfcontent = $selfcontent;
        $this->content = $content;
        $this->unverif = $unverif;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('aimaina@syqscode.com')->view('mails.commentreply')->text('mails.commentreply_text')->with(['post'=>$this->post,'from'=>$this->fr,'target'=>$this->target,'selfcontent'=>$this->selfcontent,'content'=>$this->content,'unverif'=>$this->unverif]);
    }
}
