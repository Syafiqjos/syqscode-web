@extends('layouts.main')

@section('header')
<div class="logo-title-mini logo-title-small">
    <div class="title-divider">
        <a href="/" style="color:rgb(192,192,192);"><h1 v-on:click="anim_encode()" style="margin:0px;font-size: 40px;"> [@{{title}}] </h1></a>
        <div class="main-links-shrinked">
            <a class="header-link" href="/tags/web"><h2 style="padding-left: 20px;padding-right: 20px;">Web</h2></a>
            <a class="header-link" href="/tags/programming"><h2 style="padding-left: 20px;padding-right: 20px;">Programming</h2></a>
            <a class="header-link" href="/tags/ctfs"><h2 style="padding-left: 20px;padding-right: 20px;">CTFs</h2></a>
            <a class="header-link" href="/tags/lifehack"><h2 style="padding-left: 20px;padding-right: 20px;">LifeHack</h2></a>
            <a class="header-link" href="/tags/tutorial"><h2 style="padding-left: 20px;padding-right: 20px;">Tutorial</h2></a>
            <a class="header-link" href="/about-us"><h2 style="padding-left: 20px;padding-right: 20px;">About Us</h2></a>
        </div>
    </div>
</div>
<div class="welcome-desc-static"><h2 style="color: white;font-family: 'SquareFont';letter-spacing:4px;">@{{desc}}</h2></div>
@endsection

@section('posts')
    <h1 class="blog-title" style="margin-bottom:0px;">@yield('page-title')</h1>
    <h2 style="font-size: 18px;background-color: rgb(55,25,25);padding:2px;"><i>"@yield('page-description')"</i></h2>
    <div class="blog-body">
        @yield('content')
    </div>
@endsection
