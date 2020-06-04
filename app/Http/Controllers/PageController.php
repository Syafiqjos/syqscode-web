<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

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
}
