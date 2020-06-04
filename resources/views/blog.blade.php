@extends('layouts.main')

@section('title')
    Syqscode - {{$post->title}}
@endsection

@section('header')
    <div class="logo-title-mini logo-title-small" style="display: flex;">
        <h1 v-on:click="anim_encode()" style="margin:0px;font-size: 40px;"> [@{{title}}] </h1>
        <div style="display: flex;margin-left:100px; color:rgb(172,172,172);">
            <a class="header-link" href="/tags/technologies"><h2 style="padding-left: 20px;padding-right: 20px;">Technologies</h2></a>
            <a class="header-link" href="/tags/coding"><h2 style="padding-left: 20px;padding-right: 20px;">Coding</h2></a>
            <a class="header-link" href="/tags/programming"><h2 style="padding-left: 20px;padding-right: 20px;">Programming</h2></a>
            <a class="header-link" href="/tags/ctfs"><h2 style="padding-left: 20px;padding-right: 20px;">CTFs</h2></a>
            <a class="header-link" href="/tags/tutorial"><h2 style="padding-left: 20px;padding-right: 20px;">Tutorial</h2></a>
            <a class="header-link" href="/about-me"><h2 style="padding-left: 20px;padding-right: 20px;">About Me</h2></a>
        </div>
    </div>
    <div class="welcome-desc-static"><h2 style="color: white;font-family: 'SquareFont';letter-spacing:4px;">Welcome to The Art of Code</h2></div>
@endsection

@section('posts')
    <h1 style="font-size: 48px;">{{$post->title}}</h1>
    @php
        echo base64_decode($post->content);
    @endphp
@endsection
