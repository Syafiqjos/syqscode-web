<?php

namespace App\Http\Controllers;

use URL;

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

        $this->update_sitemap(URL::to('/').$post->url);

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

    public function open_sitemap(){
        $file = fopen('lib/admin/post.txt','r');
        $r = fread($file,filesize('lib/admin/post.txt'));
        $con = explode(PHP_EOL,$r);
        fclose($file);
        $content = '';
        foreach ($con as $co){
            $content .= '<url> <loc>';
            $content .= $co;
            $content .= '</loc> </url>';
            $content .= PHP_EOL;
        }
        $file = fopen('lib/admin/xitemap.xml','w');
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL . $content . PHP_EOL . '</urlset>';
        fwrite($file,$content);
        return redirect('/lib/admin/xitemap.xml');
    }

    public function update_sitemap($link){
        $file = fopen('lib/admin/post.txt','a');
        fwrite($file,$link.PHP_EOL);
        fclose($file);
    }

    public function code_rasterizer(){
        return view('admin.code_rasterizer');
    }
}
