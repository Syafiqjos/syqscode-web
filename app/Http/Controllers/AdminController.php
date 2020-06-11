<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use App\Post;
use App\Author;
use App\Tag;
use App\Http\Controllers\MailController;

class AdminController extends Controller
{
    public function create_post(){
        $authors = Author::all();
        $tags = Tag::all();
        return view('admin.post_creator',['authors'=>$authors,'tags'=>$tags]);
    }

    public function edit_post(Request $request, $url){
        $authors = Author::all();
        $tags = Tag::all();
        $posts = Post::where('url','/blog/'.$url);
        if ($posts->count() >= 1){
            $post = $posts->first();
            return view('admin.post_editor',['post'=>$post,'authors'=>$authors,'tags'=>$tags]);
        }
        return 'No Post';
    }

    public function update_post(Request $request){
        if ($request->exists('post_preview')){
            return $this->preview_post($request);
        } else if ($request->exists('post_upload')){
            return $this->upload_post_update($request);
        }
        return "ANDREAS";
    }

    public function insert_post(Request $request){
        if ($request->exists('post_preview')){
            return $this->preview_post($request);
        } else if ($request->exists('post_upload')){
            return $this->upload_post($request);
        }
        return "ANDREAS";
    }

    public function preview_post(Request $request){
        $post = new Post();
        $post->visited = rand(101,10103);
        $post->loved = rand(101,$post->visited);
        $post->url = '/blog/'.$request->get('url');
        $post->title = $request->get('title');
        $post->description = $request->get('desc');
        $post->content = $request->get('content');
        $post->cover = $request->get('cover');
        $post->tags = $request->get('tags');
        $post->author = $request->get('author');
        $author = Author::where('id',$post->author)->first();
        $root = array();
        return view('blog',["post" => $post, "comments" => $root, "author" => $author]);
    }

    public function upload_post(Request $request){
        $post = new Post();
        $post->url = '/blog/'.$request->get('url');
        $post->title = $request->get('title');
        $post->description = $request->get('desc');
        $post->content = $request->get('content');
        $post->cover = $request->get('cover');

        $printed = '';
        $tags = Tag::all();

        $i = 0;

        foreach($tags as $tag){
            if ($request->get('tag_'.$tag->id) != NULL){
                $printed .= '['.$tag->id.']';
                if ($i < $tags->count() - 1){
                    $printed .= ',';
                }
                $i++;
            }
        }

        $post->tags = $printed;

        $post->author_id = $request->get('author');
        $post->save();

        $mc = new MailController();

        $mc->newsletter($request);

        return redirect($post->url);
    }

    public function upload_post_update(Request $request){
        $post = Post::where('id',$request->get('id'))->first();
        $post->title = $request->get('title');
        $post->description = $request->get('desc');
        $post->content = $request->get('content');
        $post->cover = $request->get('cover');

        $printed = '';
        $tags = Tag::all();

        $i = 0;

        foreach($tags as $tag){
            if ($request->get('tag_'.$tag->id) != NULL){
                $printed .= '['.$tag->id.']';
                if ($i < $tags->count() - 1){
                    $printed .= ',';
                }
                $i++;
            }
        }

        $post->tags = $printed;

        $post->author_id = $request->get('author');
        $post->save();
        return redirect($post->url);
    }
}
