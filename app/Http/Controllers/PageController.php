<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\Tag;

const total_perpage = 2;

class PageController extends Controller
{
    public function default(Request $request){
        $po = Post::all();
        $posts = $po->slice(0 * total_perpage,total_perpage)->values();
        $len = ceil($po->count() / total_perpage);
        return view('page',['page'=>'default','ppage'=>$len,'posts'=>$posts]);
    }

    public function check(Request $request, $page){
        if ($page < 0){
            $page = '0';
        }
        $po = Post::all();
        $posts = $po->slice($page * total_perpage,total_perpage)->values();
        $len = ceil($po->count() / total_perpage);
        return view('page',['page'=>$page,'ppage'=>$len,'posts'=>$posts]);
    }

    public function check0(Request $request){
        $page = '0';
        $po = Post::all();
        $posts = $po->slice($page * total_perpage,total_perpage)->values();
        $len = ceil($po->count() / total_perpage);
        return view('page',['page'=>$page,'ppage'=>$len,'posts'=>$posts]);
    }

    public function tags(Request $request, $url, $page){
        if ($page < 0){
            $page = '0';
        }

        $tag_id = Tag::where('url','tags/'.$url)->first()->id;

        $po = Post::where('tags','LIKE',$tag_id)->get();
        $posts = $po->slice($page * total_perpage,total_perpage)->values();
        $len = ceil($po->count() / total_perpage);
        return view('page',['page'=>$page,'ppage'=>$len,'posts'=>$posts]);
    }

    public function tags0(Request $request, $url){
        $page = '0';

        $tag_id = Tag::where('url','tags/'.$url);
        if ($tag_id->count() <= 0){
            return 'no post 404';
        }
        $tag_id = $tag_id->first()->id;

        $po = Post::where('tags','like','%'.$tag_id.'%')->get();

        $posts = $po->slice($page * total_perpage,total_perpage)->values();
        $len = ceil($po->count() / total_perpage);
        return view('page',['page'=>$page,'ppage'=>$len,'posts'=>$posts]);
    }
}
