<!DOCTYPE html>

<html>
    <head>
        <title>Syqscode - Newsletter</title>
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
            <h1 class="logo-title">Hello, {{$target}}
            </h1>
            <h2 style="font-family: 'Roboto';color:white;font-size:16px;">Ada post baru di <a style="font-family: 'SquareFont';border: 2px solid white;padding:2px;" href="http://syqscode.com/">Syqscode</a> !</h2>
            <br>
            <p style="font-family: 'Roboto';color:white;font-size:16px;">Jika kamu tidak mau menerima newsletter ini lagi, kamu dapat unsubscribe melalui link berikut <a href="{{URL::to('/').'/verify?n='.$unverif}}">ini</a>.</p>
            <br>
            <h2 style="font-family: 'Roboto';color:white;font-size:16px;">k- bye</h2>
            <p style="font-family: 'Roboto';color:white;font-size:16px;">- Aimaina</p>
        </div>
    </body>
</html>
