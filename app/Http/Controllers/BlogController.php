<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function check(Request $request, $url){
        $post = Post::where('url','blog/'.$url)->first();
        return view('blog',["post" => $post]);
    }
}
