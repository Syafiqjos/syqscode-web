@extends('layouts.main')

@section('title')
    Verification - Syqscode
@endsection

@section('header')
<div class="logo-title-mini logo-title-small">
    <div class="title-divider">
        <h1 v-on:click="anim_encode()" style="margin:0px;font-size: 40px;"> [@{{title}}] </h1>
        <div class="main-links-shrinked">
            <a class="header-link" href="/tags/technologies"><h2 style="padding-left: 20px;padding-right: 20px;">Technologies</h2></a>
            <a class="header-link" href="/tags/coding"><h2 style="padding-left: 20px;padding-right: 20px;">Coding</h2></a>
            <a class="header-link" href="/tags/programming"><h2 style="padding-left: 20px;padding-right: 20px;">Programming</h2></a>
            <a class="header-link" href="/tags/ctfs"><h2 style="padding-left: 20px;padding-right: 20px;">CTFs</h2></a>
            <a class="header-link" href="/tags/tutorial"><h2 style="padding-left: 20px;padding-right: 20px;">Tutorial</h2></a>
            <a class="header-link" href="/about-me"><h2 style="padding-left: 20px;padding-right: 20px;">About Me</h2></a>
        </div>
    </div>
</div>
<div class="welcome-desc-static"><h2 style="color: white;font-family: 'SquareFont';letter-spacing:4px;">@{{desc}}</h2></div>
@endsection

@section('posts')
    <h1 class="blog-title">Verification</h1>
    <h2 style="font-size: 18px;background-color: rgb(55,25,25);padding:2px;"><i>Jika kamu mengisi form ini, kamu bakal menerima email setiap kali ada post baru </i></h2>
    <div class="blog-body">
        <h2>{{ $message }}</h2>
    </div>
@endsection
