<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Author;

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

            if (strpos($request->comment_name,'<script') !== false || strpos($request->comment_name,'</script') !== false || strpos($request->comment_email,'<script') !== false || strpos($request->comment_email,'</script') !== false || strpos($request->comment_content,'<script') !== false || strpos($request->comment_content,'</script') !== false){
                return response()->json(['success'=>'iku ikuuu']);
            }

            $request->comment_name = str_replace('<','&lt;',$request->comment_name);
            $request->comment_name = str_replace('>','&gt;',$request->comment_name);

            $request->comment_email = str_replace('<','&lt;',$request->comment_email);
            $request->comment_email = str_replace('>','&gt;',$request->comment_email);

            $request->comment_content = str_replace('<','&lt;',$request->comment_content);
            $request->comment_content = str_replace('>','&gt;',$request->comment_content);

            $po = Post::where('url','/blog/'.$url);
            $post = $po->first();
            $com = new Comment();
            $com->post_id = $post->id;
            $com->replied_to = $request->comment_id;
            $com->name = $request->comment_name;
            $com->email = $request->comment_email;
            $com->content = $request->comment_content;
            $com->save();
            return response()->json(['success'=>'iiiiiiiiikuuuuu ikuuuuu','comment_id'=>$com->id,'comment_name'=>$com->name,'comment_email'=>$com->email,'comment_content'=>$com->content]);
        }
        return response()->json(['success'=>'iku ikuuu']);
    }
}
