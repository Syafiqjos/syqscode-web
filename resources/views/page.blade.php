@extends('layouts.main')

@section('title')
    Syqscode
@endsection

@section('header')
    @if($page == 'default')
        @php
            $page = 0;
        @endphp
        <div class="position-middle-center" width="100%">
            <div>
                <h1 v-on:click="anim_encode()" class="logo-title logo-title-big" style="margin:0px;"> [@{{title}}] </h1>
            </div>
            <div class="main-links" align="center">
                <span class="sub-links"><a href="blog/gta">Technologies</a></span>
                <span class="sub-links"><a href="blog/san">Coding</a></span>
                <span class="sub-links"><a href="blog/san">Programming</a></span>
                <span class="sub-links"><a href="blog/san">CTFs</a></span>
                <span class="sub-links"><a href="blog/san">Tutorial</a></span>
                <span class="sub-links"><a href="blog/san">About Me</a></span>
            </div>
        </div>
        <div class="welcome-desc"><h2 style="color: white;font-family: 'SquareFont';letter-spacing:4px;">Welcome to The Art of Code</h2></div>
    @else
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
    @endif
@endsection

@section('posts')
    @foreach($posts as $post)
        <div class="page" style="background-image: radial-gradient(circle,black,black,black ,rgba(10,10,10,0.72) 0%),url({{asset('/lib/glitch.jpg')}});background-size:cover;">
            <div style="width:32%; display: inline-block;">
                <div style="height: 100%;">
                    <!-- <a href="{{asset('/blog/how-to')}}"><img class="cover" src="{{asset('/lib/glitch.jpg')}}" align="left" /></a> -->
                    <a href="{{asset($post->url)}}"><img class="cover" src="{{asset($post->cover)}}" align="left" /></a>
                </div>
            </div>
            <div style="width:68%; display: inline-block;">
                <a href="{{asset($post->url)}}"><h1 class="title">{{$post->title}}</h1></a>
                <div class="paragraph">
                    {{$post->description}}
                </div>
                <div class="divider">
                    <div class="label-parent">
                        <h2 align="left">Label :
                            @php
                                $tags = explode(',',$post->tags);
                            @endphp
                            @foreach($tags as $tag)
                                @php
                                    $tagn = App\Tag::where('id',$tag[1])->first();
                                @endphp
                                <span class="label">
                                    <a href="{{$tagn->url}}">{{$tagn->name}}</a>
                                </span>
                            @endforeach
                        </h2>
                    </div>
                    <div class="readmore" style="position:relative;bottom:0px;">
                        <a href="{{asset($post->url)}}">
                            <h2 align="right">Read More</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <div style="width:100%;display:flex;text-align: center; margin-top:-10px;" align="center">
            <div style="display:flex;margin:0 auto;" align="center">
                <span class="readmore" style="margin:2px 2px 2px 2px;width: 40px;">
                    <a href="/page/0">
                        <h2 align="center" style="width:20px;"><<</h2>
                    </a>
                </span>
                @if($page-1 < 0)
                    <span class="readmore" style="margin:2px 20px 2px 2px;width: 40px;">
                        <a href="/page/0">
                            <h2 align="center" style="width:20px;"><</h2>
                        </a>
                    </span>
                @else
                <span class="readmore" style="margin:2px 20px 2px 2px;width: 40px;">
                    <a href="/page/{{$page-1}}">
                        <h2 align="center" style="width:20px;"><</h2>
                    </a>
                </span>
                @endif
                @for ($i = $page-2;$i < 5 && $i < $ppage;$i++)
                    @php
                        if ($i < 0){
                            continue;
                        }
                    @endphp
                    @if($i == $page)
                        <span class="readmore-inverted" style="margin:2px 2px 2px 2px;width: 30px;">
                            <a href="/page/{{$i}}">
                                <h2 align="center" style="width:10px;">{{$i}}</h2>
                            </a>
                        </span>
                    @else
                    <span class="readmore" style="margin:2px 2px 2px 2px;width: 30px;">
                        <a href="/page/{{$i}}">
                            <h2 align="center" style="width:10px;">{{$i}}</h2>
                        </a>
                    </span>
                    @endif
                @endfor
                @if($page + 1 > $ppage-1)
                    <span class="readmore" style="margin:2px 2px 2px 20px;width: 40px;">
                        <a href="/page/{{$ppage-1}}">
                            <h2 align="center" style="width:20px;">></h2>
                        </a>
                    </span>
                @else
                    <span class="readmore" style="margin:2px 2px 2px 20px;width: 40px;">
                        <a href="/page/{{$page+1}}">
                            <h2 align="center" style="width:20px;">></h2>
                        </a>
                    </span>
                @endif
                <span class="readmore" style="margin:2px 2px 2px 2px;width: 40px;">
                    <a href="/page/{{$ppage-1}}">
                        <h2 align="center" style="width:20px;">>></h2>
                    </a>
                </span>
            </div>
        </div>
@endsection