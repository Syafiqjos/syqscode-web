<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function check(Request $request, $title){
        return view('blog',["title" => $title]);
    }
}
