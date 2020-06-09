<!DOCTYPE html>

<html>
    <head>
        <title>Syqscode - Replied Comment</title>
        <style>
            body {
                background-color:rgb(10,10,10);
            }
            .logo-title{
                font-family: 'SquareFont';
                text-align: left;
                margin-bottom:10px;
            }
            h1 {
                color:rgb(225,225,225);
            }
            h2,p {
                color:rgb(255,255,255);
                font-family: 'Roboto';
                color:white;
                font-size:16px;
            }

            a {
                color : rgb(195,75,75);
                text-decoration: none;
            }

            a:hover {
                color : rgb(195,75,75);
            }

            a:visited {
                color : rgb(195,75,75);
            }

            .readmore {
                margin-top:40px;
                margin-right: 20px;
                width:120px;
            }

            .readmore h2 {
                font-family: "SquareFont";
                font-size: 16px;
                letter-spacing: 1px;
                border-radius: 2px;
                background-color: rgb(80,10,10);
                color:rgb(255,255,255);
                padding:10px;
            }

            .readmore h2:hover {
                background-color: rgb(255,255,255);
                color: rgb(80,10,10);
            }

        </style>
    </head>
    <body>
        <div style="background-color:rgb(10,10,10);padding:24px;">
            <h1 class="logo-title">Hello, {{$target->name}}
            </h1>
            <h2 style="font-family: 'Roboto';color:white;font-size:16px;">Komentarmu di <a style="font-family: 'SquareFont';border: 2px solid white;padding:2px;" href="http://syqscode.com/">Syqscode</a> baru aja dibalas</h2>
            <p>
                <a href="{{URL::to('/').$post->url}}">{{$post->title}}</a>, dari {{ $from->name }} :
            </p>

            <div style="background-color: rgb(25,25,35);padding:5x;margin-left:10px;width:540px;border:2px solid rgb(15,15,15);padding-right:20px;">
                <h2 style="font-family:'Roboto';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">{{$target->name}}</h2>
                <div style="display:flex;">
                    <div style="display: block;width:16%;">
                        <h2 style="font-family:'Roboto';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">|->></h2>
                    </div>
                    <div style="width:80%;display:block;right:0px;">
                        <p style="width:100%;color:rgb(220,220,220);display: block;align-self:left;text-align:left;margin-left:5px;padding-left:5px;font-size:18px;margin-top:0px;margin-left:10px;margin-right:20px;text-align: justify;">{{$selfcontent}}</p>
                    </div>
                </div>
            </div>
            <div style="background-color: rgb(25,25,55);padding:5x;margin-left:60px;width:540px;border:2px solid rgb(15,15,15);padding-right:20px;">
                <h2 style="font-family:'Roboto';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">{{$from->name}}</h2>
                <div style="display:flex;">
                    <div style="display: block;width:16%;">
                        <h2 style="font-family:'Roboto';padding:10px;margin-left:10px;font-size:20px;margin-bottom: 0px;">|->></h2>
                    </div>
                    <div style="width:80%;display:block;right:0px;">
                        <p style="width:100%;color:rgb(220,220,220);display: block;align-self:left;text-align:left;margin-left:5px;padding-left:5px;font-size:18px;margin-top:0px;margin-left:10px;margin-right:20px;text-align: justify;">{{$content}}</p>
                    </div>
                </div>
            </div>

            <br>
            <p style="font-family: 'Roboto';color:white;font-size:16px;">Jika kamu tidak mau menerima email reply comment ini lagi, kamu dapat mematikannya melalui link berikut <a href="{{URL::to('/').'/verify?c='.$unverif}}">ini</a>.</p>
            <br>
            <h2 style="font-family: 'Roboto';color:white;font-size:16px;">k- bye</h2>
            <p style="font-family: 'Roboto';color:white;font-size:16px;">- Aimaina</p>
        </div>
    </body>
</html>
