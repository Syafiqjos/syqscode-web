<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function check(Request $request, $url){
        $po =  Post::where('url','/blog/'.$url);
        $post = $po->first();
        if ($po->count() <= 0){
            //Return Default kalo 404
            return redirect()->route('home');
        }
        $post->visited++;
        $post->save();
        return view('blog',["post" => $post]);
    }
}
