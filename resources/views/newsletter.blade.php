@extends('layouts.main')

@section('title')
    Newsletter - Syqscode
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
    <h1 class="blog-title">Subscribe Newsletter</h1>
    <h2 style="font-size: 18px;background-color: rgb(55,25,25);padding:2px;"><i>Jika kamu mengisi form ini, kamu bakal menerima email setiap kali ada post baru </i></h2>
    <div class="blog-body">
        <form action="" method="post" align="center">
            @csrf
            <label style="margin:0 auto;margin-top:10px;margin-bottom:10px;display:block;font-size:24px;" for="email">Masukkan Email</label>
            <h2>
            @if($status == 'nodgut')
                Query Nod gut
            @elseif($status == 'emailnodgut')
                Masukkan email yang valid
            @elseif($status == 'emailsogud')
                Kamu telah berlangganan newsletter ^_^
            @elseif($status == 'hai')
                Oke, silahkan verifikasi email nya dulu ya
            @elseif($status == 'kosongan')
                Kok emailnya kosongan ?
            @elseif($status == 'initial')

            @else
                Add d  a  E r  oo RR  r yan  g  g ak  d i k t e   a ha ui  i  i
            @endif
            </h2>
            <input style="margin:0 auto;display:block;padding:4px;width:80%;font-size:24px;" type="text" id="email" name="email"></input>
            <input style="margin:0 auto;display:block;width:20%;padding:8px;margin-top:10px;" type="submit" value="Oke"></input>
        </form>
    </div>
@endsection
