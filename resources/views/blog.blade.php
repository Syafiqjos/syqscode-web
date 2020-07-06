@extends('layouts.main')

@section('title')
    {{$post->title}} - Syqscode
@endsection

@section('exscr')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#lov").click(function(){
                $.post("",
                {
                    isloved : "b-betsuni, baka"
                },function(data,status){
                    if (data.success == "b-baka"){
                        //Update love
                        vm.jadigimana = "Terima kasih Responsenya";
                        vm.tambahin = "Top, share kalo mau";
                    }
                });
            });

            $("#comment_send").click(function(){
                $.post(window.location.href + "/comment",
                {
                    uncensored : 'senpai...',
                    comment_id : vm.comment_id,
                    comment_name : document.getElementById('name').value,
                    comment_email : document.getElementById('email').value,
                    comment_content : document.getElementById('content').value,
                },function(data,status){
                    if (data.success == "iiiiiiiiikuuuuu ikuuuuu"){
                        //Update Comment
                        if (vm.comment_latest_id != -1){
                            document.getElementById('comment_p' + vm.comment_latest_id).style.backgroundColor = 'rgb(25,25,35)';
                        }
                        document.getElementById('comment_p' + vm.comment_id).outerHTML += '<div id="comment_p'+data.comment_id+'" style="background-color: rgb(25,25,55);padding:5x;margin-left:' + (parseInt(document.getElementById('comment_p' + vm.comment_id).style.marginLeft) + 42) +'px;width:100%;border:2px solid rgb(15,15,15);"><h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">'+data.comment_name+'</h2><div style="display:flex;"><div style="display: block;width:16%;"><!-- <img src="/lib/logo-icon.png" style="display:block;width:64%;margin-left:10px;margin-top:0px;padding-top:0px;padding-left:5px;padding-right:10px;margin-bottom:20px;margin-right:10px;padding-right:5px;"></img> --><h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">|->></h2></div><div style="width:80%;display:block;right:0px;"><p style="width:100%;color:rgb(220,220,220);display: block;align-self:left;text-align:left;margin-left:5px;padding-left:5px;font-size:18px;margin-top:0px;margin-left:10px;text-align: justify;margin-right:20px;">'+data.comment_content+'</p><div id="comment_n'+data.comment_id+'" onclick="comment_showup('+data.comment_id+')" class="readmore" align="right" style="width:92px;margin:auto;margin-right:0px;padding-right:0px;"><h2 style="font-size:16px;">reply</h2></div></div></div></div>';
                        document.getElementById('comment_modal').style.display = 'none';
                        vm.comment_latest_id = data.comment_id;
                        document.getElementById('content').value = "";
                        // alert('Comment submited');
                    } else if (data.success == "iku ikuuu u u u"){
                        alert('Email nod gut');
                    } else if (data.success == "iku ikuuu ku kuuu iku iku"){
                        alert('Nickname taken');
                    } else {
                        alert('Comment nod gut');
                    }
                });
            });

        });
    </script>
@endsection

@section('header')
<div id="comment_modal" class="comment-modal-blur">
    <div class="comment-modal">
        <div style="display:block;color:rgb(245,245,245);">
            <h2 style="font-family: 'SquareFont';letter-spacing: 1px;font-size:24px;margin-bottom:4px;">Comment</h2>
            <div style="display:block;">
                <form action="" method="POST" style="display:block;">
                    <label class="comment-special" align="left" style="margin-left:10px;font-family: 'Roboto';" for="name">Name : </label>
                    <input class="comment-special comment-size" type="text" id="name" name="name" style="background-color:rgb(240,240,240);margin:10px;margin-left:12px;margin-right:auto;font-family:'Roboto';font-size:16px;padding:4px;"></input>
                    <label class="comment-special" align="left" style="margin-left:10px;font-family: 'Roboto';" for="email">Email : </label>
                    <input class="comment-special comment-size" type="text" id="email" name="email" style="background-color:rgb(240,240,240);margin:10px;margin-left:12px;margin-right:auto;font-family:'Roboto';font-size:16px;padding:4px;"></input>
                    <label class="comment-special comment-content" style="display:block;font-family: 'Roboto';" for="content">Content : </label>
                    <textarea class="comment-special comment-great-size" id="content" name="content" style="background-color:rgb(240,240,240);display:block;margin:10px;auto;font-family:'Roboto';font-size:16px;padding:4px;height:64px;resize:none;"></textarea>
                </form>
            </div>
            <div style="display:flex;">
                <span onclick="comment_hide()" style="margin-right:10px;margin-left:auto;margin-top:16px;" class="readmore">
                    <h2>Close</h2>
                </span>
                <span id="comment_send" style="margin-left:10px;margin-right:10px;margin-top:16px;" class="readmore">
                    <h2>Send</h2>
                </span>
            </div>
        </div>
    </div>
</div>
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
    <h1 class="blog-title" style="margin-bottom:0px;">{{$post->title}}</h1>
    <div style="margin-top:0px;margin-bottom:-10px;display: flex; margin-left:auto;margin-right:auto;text-align: center;">
        <img src="/lib/loved.png" style="padding:4px;margin-left:auto;margin-right:10px;width:24px;height:24px;margin-top:10px;"></img>
        <h2 style="padding:4px;margin-left:4px;margin-right:4px;">{{$post->loved}}</h2>
        <img src="/lib/visited.png" style="padding:4px;margin-left:4px;margin-right:4px;width:24px;height:24px;margin-top:10px;"></img>
        <h2 style="padding:4px;margin-left:10px;margin-right:auto;">{{$post->visited}}</h2>
    </div>
    <h2 style="font-size: 18px;background-color: rgb(55,25,25);padding:2px;"><i>"{{$post->description}}"</i></h2>
    <div class="blog-body">
        <h3 style="margin-top: 0px;margin-bottom:32px;font-size:16px;color:rgb(180,180,180);">Log : Ditulis oleh {{$author->username}}; {{$post->created_at}}</h3>
        <img src="{{$post->cover}}"></img>
        @php
            echo $post->content;
        @endphp
        <div style="margin-top:60px;">
            <div class="author" style="background-color:rgb(15,15,15);" align="left">
                <div style="display:block;width:100%;" >
                    <h3 style="width:100%;margin-top:32px;padding-top:10px;font-size: 24px;" align="center">@{{jadigimana}}</h3>
                    <p style="width:100%;margin-left:0px;margin-right:0px;margin-top:-8px;margin-bottom:18px;letter-spacing:1px;text-align:center;" align="center">@{{tambahin}}<p>
                    <img id="lov" align="center" src="/lib/loved.png" style="display:block;width:60px;margin-left:auto;margin-right:auto;padding-left:0px;padding-right:0px;"></img>
                </div>
            </div>
        </div>
        <div style="margin-top:30px;background-color: rgb(55,25,25);">
            <h2 style="margin:0px;padding:16px;font-size:20px;font-family:'SquareFont';letter-spacing:12px;color:rgb(255,255,255);">Author</h2>
            <div class="author" style="background-color:rgb(15,15,15);" align="left">
                <img src="{{$author->profpic}}" class="author-image"></img>
                <div style="display:block;" >
                    <h3 style="width:100%;margin-top:20px;margin-left:20px;padding-top:10px;font-size: 24px;" align="left">@php echo $author->richname; @endphp</h3>
                    <p style="margin-left:20px;padding:2px;margin-top:-8px;margin-bottom:18px;letter-spacing:1px;" align="justify">@php echo $author->description; @endphp<p>
                </div>
            </div>
        </div>
        <h2 style="margin:0px;margin-top:60px;padding:16px;font-size:20px;font-family:'SquareFont';letter-spacing:12px;color:rgb(255,255,255);background-color: rgb(55,25,25)">Comments</h2>
        <div id="comment_n0" onclick="comment_showup(0)" class="readmore" align="right" style="text-align:center;width:100%;margin:auto;">
            <h2 style="font-size:16px;">Add comment</h2>
        </div>
        <div style="margin-top:0px;background-color: rgb(25,25,25);overflow:scroll;">
            <!-- Comments go here, setup blompe -->
            @php
                function recc($x,$margin){
                    echo '
                        <div id="comment_p'.$x->obj->id.'" style="background-color: rgb(25,25,35);padding:5x;margin-left:'.$margin.'px;width:100%;border:2px solid rgb(15,15,15);">
                            <h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">'.$x->obj->name.'</h2>
                            <div style="display:flex;">
                                <div style="display: block;width:16%;">
                                    <!-- <img src="/lib/logo-icon.png" style="display:block;width:64%;margin-left:10px;margin-top:0px;padding-top:0px;padding-left:5px;padding-right:10px;margin-bottom:20px;margin-right:10px;padding-right:5px;"></img> -->
                                    <h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">|->></h2>
                                </div>
                                <div style="width:80%;display:block;right:0px;">
                                    <p style="width:100%;color:rgb(220,220,220);display: block;align-self:left;text-align:left;margin-left:5px;padding-left:5px;font-size:18px;margin-top:0px;margin-left:10px;margin-right:20px;text-align: justify;">'.$x->obj->content.'</p>
                                    <div id="comment_n'.$x->obj->id.'" onclick="comment_showup('.$x->obj->id.')" class="readmore" align="right" style="width:92px;margin:auto;margin-right:0px;padding-right:0px;">
                                        <h2 style="font-size:16px;">reply</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                    foreach($x->child as $d){
                        recc($d,$margin + 42);
                    }
                }

                echo '<div style="background-color:rgb(15,15,15);margin-top:20px;">';
                echo '<div id="comment_p0" style="background-color: rgb(25,25,35);padding:5x;margin-left:-32px;width:100%;border:2px solid rgb(15,15,15);"></div>';
                    foreach($comments as $com){
                        recc($com,10);
                    }
                echo '</div>';
            @endphp
        </div>
    </div>
@endsection

@section('vue-attr')
    jadigimana : '@php echo $author->love_title; @endphp',
    tambahin : '@php echo $author->love_subtitle; @endphp',
    comment_id : 0,
    comment_latest_id : -1
@endsection

@section('vue')
    <script type="text/javascript">
        function comment_showup(id){
            vm.comment_id = id;
            document.getElementById('comment_modal').style.display = 'block';
        }
        function comment_hide(){
            document.getElementById('comment_modal').style.display = 'none';
        }
    </script>
@endsection
