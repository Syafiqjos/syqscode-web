<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Author;
use App\Subscriber;
use App\Mail\CommentReplyMail;
use Illuminate\Support\Facades\Mail;

class CommentObj {
    public $obj;
    public $child;

    public function init($x){
        $this->obj = $x;
        $this->child = array();
    }

    public function add($x){
        $child.append($x);
    }
}

class BlogController extends Controller
{
    public function check_user($name, $email){
        $subs = Subscriber::where('name',$name);
        if ($subs->count() <= 0){
            $news = new Subscriber();
            $news->name = $name;
            $news->email = $email;
            $news->save();
            return true;
        } else {
            $sub = $subs->first();
            if ($sub->email == $email){
                return true;
            }
        }
        return false;
    }

    public function check_email($email){
        $em = Subscriber::where('email',$email);
        if ($em->count() <= 0){
            $newem = new Subscriber();
            $newem->email = $email;
            $newem->save();

            return false;
        } else {
            $ema = $em->where('verified',true);
            if ($ema->count() <= 0){
                return false;
            } else {
                return true;
            }
        }

        return false;
    }

    public function send_comment_email($x,$post){
        $obj = new \stdClass();
        $obj->sender = 'aimaina@syqscode.com';
        $obj->receiver = $x;

        //URL POST BUAT VIEW BELUM

        Mail::to($obj->receiver)->send(new CommentReplyMail($obj));
    }

    public function reply_email($fr,$tr,$post){
        if ($tr != ''){
            $target = Subscriber::where('email',$tr);
            if ($target->count() > 0){
                if ($this->check_email($target->first()->email)){
                    if ($fr != $tr){
                        $this->send_comment_email($target->first()->email,$post);
                    }
                }
            }
        }

        if ($fr != ''){
            $from = Subscriber::where('email',$fr);
            if ($from->count() > 0){
                $this->check_email($from->first()->email);
            }
        }
    }

    public function check(Request $request, $url){
        $po =  Post::where('url','/blog/'.$url);
        $post = $po->first();
        if ($po->count() <= 0){
            //Return Default kalo 404
            return redirect()->route('home');
        }

        $author = Author::where('id',$post->author_id);

        if ($author->count() <= 0){
            $author = new Author();
            $author->username = "[UNKNOWWN]";
            $author->richname = "<s>[REDACTED]</s>";
            $author->description = "[REDACTED][BUG][REDACTED][ANONYMOUS][REDACTED]";
            $author->profpic = "/lib/logo-icon.png";
            $author->love_title = "DdDdo  yo u   li o ke  di s  po stT t  ?  !?";
            $author->love_subtitle = "iFFf y u0  l  o i   ke  t d his  po  s t  pl e  a s e  lo   v v e v v  v ve  meeeee.e..e.e";
        } else {
            $author = $author->first();
        }

        $post->visited++;
        $post->save();

        //Comentnnts
        $comments = Comment::where('post_id',$post->id)->orderBy('id','desc')->get();

        $root = array();
        $collection = [];
        foreach ($comments as $com){
            $collection[$com->id] = new CommentObj();
            $collection[$com->id]->init($com);
        }

        foreach($collection as $col){
            if ($col->obj->replied_to == 0){
                array_push($root,$col);
            } else {
                array_push($collection[$col->obj->replied_to]->child,$col);
            }
        }

        return view('blog',["post" => $post, "comments" => $root, "author" => $author]);
    }

    public function loved(Request $request, $url){
        if (isset($request->isloved) && $request->isloved == "b-betsuni, baka") {
            $po = Post::where('url','/blog/'.$url);
            $post = $po->first();
            $post->loved++;
            $post->save();
            return response()->json(['success'=>'b-baka']);
        }
        return response()->json(['success'=>'kimochi, warui']);
    }

    public function comment(Request $request, $url){
        if (isset($request->uncensored) && $request->uncensored == "senpai...") {

            if (!filter_var($request->comment_email,FILTER_VALIDATE_EMAIL) && $request->comment_email != ''){
                return response()->json(['success'=>'iku ikuuu u u u']);
            }

            if (strpos($request->comment_name,'<script') !== false || strpos($request->comment_name,'</script') !== false || strpos($request->comment_email,'<script') !== false || strpos($request->comment_email,'</script') !== false || strpos($request->comment_content,'<script') !== false || strpos($request->comment_content,'</script') !== false){
                return response()->json(['success'=>'iku ikuuu']);
            }

            $request->comment_name = str_replace('<','&lt;',$request->comment_name);
            $request->comment_name = str_replace('>','&gt;',$request->comment_name);

            $request->comment_email = str_replace('<','&lt;',$request->comment_email);
            $request->comment_email = str_replace('>','&gt;',$request->comment_email);

            $request->comment_content = str_replace('<','&lt;',$request->comment_content);
            $request->comment_content = str_replace('>','&gt;',$request->comment_content);

            if (!$this->check_user($request->comment_name,$request->comment_email)){
                return response()->json(['success'=>'iku ikuuu ku kuuu iku iku']);
            }

            $po = Post::where('url','/blog/'.$url);
            $post = $po->first();
            $com = new Comment();
            $com->post_id = $post->id;
            $com->replied_to = $request->comment_id;
            $com->name = $request->comment_name;
            $com->email = $request->comment_email;
            $com->content = $request->comment_content;
            $com->save();

            if ($com->replied_to == 0){
                $this->reply_email($com->email,0,'/blog/'.$url);
            } else {
                $this->reply_email($com->email,Comment::where('id',$com->replied_to)->first()->email,'/blog/'.$url);
            }

            return response()->json(['success'=>'iiiiiiiiikuuuuu ikuuuuu','comment_id'=>$com->id,'comment_name'=>$com->name,'comment_email'=>$com->email,'comment_content'=>$com->content]);
        }
        return response()->json(['success'=>'iku ikuuu']);
    }
}
