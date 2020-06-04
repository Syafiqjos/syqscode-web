@extends('layouts.main')

@section('title')
    {{$post->title}} - Syqscode
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
    <h1 class="blog-title">{{$post->title}}</h1>
    <h2 style="font-size: 18px;background-color: rgb(55,25,25);padding:2px;"><i>"{{$post->description}}"</i></h2>
    <div class="blog-body">
        @php
            echo $post->content;
        @endphp
        <div style="margin-top:60px;background-color: rgb(55,25,25);">
            <h2 style="margin:0px;padding:16px;font-size:20px;font-family:'SquareFont';letter-spacing:12px;color:rgb(255,255,255);">Author</h2>
            <div class="author" style="background-color:rgb(15,15,15);" align="left">
                <img src="/lib/logo-icon.png" class="author-image"></img>
                <div style="display:block;" >
                    <h3 style="width:100%;margin-top:20px;margin-left:20px;padding-top:10px;position:relative;font-size: 24px;" align="left"><s>Neko</s><i>Hacker</i></h3>
                    <p style="margin-left:20px;padding:2px;margin-top:-8px;margin-bottom:18px;position:relative;letter-spacing:1px;" align="left">"Just a cat playing a pussy, never let you guard but leave it behind the urgent circumtancesy until you can defeat the deadly toxic inside yours."<p>
                </div>
            </div>
        </div>
        <div style="margin-top:60px;background-color: rgb(55,25,25);">
            <h2 style="margin:0px;padding:16px;font-size:20px;font-family:'SquareFont';letter-spacing:12px;color:rgb(255,255,255);">Comments</h2>
            <!-- Comments go here, setup blompe -->
        </div>
    </div>
@endsection
