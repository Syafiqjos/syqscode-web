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
                        document.getElementById('comment_p' + vm.comment_id).outerHTML += '<div id="comment_p'+data.comment_id+'" style="background-color: rgb(25,25,25);padding:5x;margin-left:' + (parseInt(document.getElementById('comment_p' + vm.comment_id).style.marginLeft) + 42) +'px"><h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">'+data.comment_name+'</h2><div style="display:flex;"><div style="display: block;width:16%;"><!-- <img src="/lib/logo-icon.png" style="display:block;width:64%;margin-left:10px;margin-top:0px;padding-top:0px;padding-left:5px;padding-right:10px;margin-bottom:20px;margin-right:10px;padding-right:5px;"></img> --><h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">|->></h2></div><div style="width:80%;display:block;right:0px;"><p style="width:100%;color:rgb(220,220,220);display: block;align-self:left;text-align:left;margin-left:5px;padding-left:5px;font-size:18px;margin-top:0px;margin-left:10px;text-align: justify;">'+data.comment_content+'</p><div id="comment_n'+data.comment_id+'" onclick="comment_showup('+data.comment_id+')" class="readmore" align="right" style="width:92px;margin:auto;margin-right:0px;padding-right:0px;"><h2 style="font-size:16px;">reply</h2></div></div></div></div>';
                        document.getElementById('comment_modal').style.display = 'none';
                        alert('Comment submited');
                    } else {
                        alert('Comment nod gut');
                    }
                });
            });

        });
    </script>
@endsection

@section('header')
<div id="comment_modal" style="display:none;position:fixed;left:50%;top:50%;transform:translate(-50%,-50%);width:100vw;height:100vh;background-color:rgba(10,10,10,0.42);">
    <div style="position:fixed;left:50%;top:50%;transform:translate(-50%,-50%);width:60vw;height:36vh;background-color:rgb(25,25,25);border:8px solid rgb(55,25,25);">
        <div style="display:block;color:rgb(245,245,245);">
            <h2 style="font-family: 'SquareFont';letter-spacing: 1px;font-size:24px;margin-bottom:4px;">Comment</h2>
            <div style="display:block;">
                <form action="" method="POST" style="display:block;">
                    <label align="left" style="display:inline;font-family: 'Roboto';" for="name">Name : </label>
                    <input type="text" id="name" name="name" style="background-color:rgb(240,240,240);display:inline;margin:10px;margin-left:24px;margin-right:auto;width:32%;font-family:'Roboto';font-size:16px;padding:4px;"></input>
                    <label align="left" style="margin-left:10px;display:inline;font-family: 'Roboto';" for="email">Email : </label>
                    <input type="text" id="email" name="email" style="background-color:rgb(240,240,240);display:inline;margin:10px;margin-left:12px;margin-right:auto;width:32%;font-family:'Roboto';font-size:16px;padding:4px;"></input>
                    <br>
                    <label align="left" style="display:inline;font-family: 'Roboto';" for="content">Content : </label>
                    <br>
                    <textarea id="content" name="content" style="background-color:rgb(240,240,240);display:inline;margin:10px;margin-left:24px;margin-right:auto;width:82%;font-family:'Roboto';font-size:16px;padding:4px;height:64px;resize:none;"></textarea>
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
        <div style="margin-top:60px;">
            <div class="author" style="background-color:rgb(15,15,15);" align="left">
                <div style="display:block;width:100%;" >
                    <h3 style="width:100%;margin-top:32px;padding-top:10px;position:relative;font-size: 24px;" align="center">@{{jadigimana}}</h3>
                    <p style="width:100%;margin-left:0px;margin-right:0px;margin-top:-8px;margin-bottom:18px;position:relative;letter-spacing:1px;text-align:center;" align="center">@{{tambahin}}<p>
                    <img id="lov" align="center" src="/lib/logo-icon.png" style="display:block;width:60px;margin-left:auto;margin-right:auto;padding-left:0px;padding-right:0px;"></img>
                </div>
            </div>
        </div>
        <div style="margin-top:30px;background-color: rgb(55,25,25);">
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
            <h2 style="margin:0px;padding:16px;padding-bottom:4px;font-size:20px;font-family:'SquareFont';letter-spacing:12px;color:rgb(255,255,255);">Comments</h2>
            <!-- Comments go here, setup blompe -->
            @php
                function recc($x,$margin){
                    echo '
                        <div id="comment_p'.$x->obj->id.'" style="background-color: rgb(25,25,25);padding:5x;margin-left:'.$margin.'px">
                            <h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">'.$x->obj->name.'</h2>
                            <div style="display:flex;">
                                <div style="display: block;width:16%;">
                                    <!-- <img src="/lib/logo-icon.png" style="display:block;width:64%;margin-left:10px;margin-top:0px;padding-top:0px;padding-left:5px;padding-right:10px;margin-bottom:20px;margin-right:10px;padding-right:5px;"></img> -->
                                    <h2 style="font-family:\'Roboto\';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">|->></h2>
                                </div>
                                <div style="width:80%;display:block;right:0px;">
                                    <p style="width:100%;color:rgb(220,220,220);display: block;align-self:left;text-align:left;margin-left:5px;padding-left:5px;font-size:18px;margin-top:0px;margin-left:10px;text-align: justify;">'.$x->obj->content.'</p>
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
                    foreach($comments as $com){
                        recc($com,10);
                    }
                echo '</div>';
            @endphp
        </div>
    </div>
@endsection

@section('vue-attr')
    jadigimana : 'Jadi gimana postnya ??',
    tambahin : '"Tambahin love nya kalo emang bagus"',
    comment_id : 0,
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
