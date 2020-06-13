<!DOCTYPE html>

<html>
    <head>
        <title>Syqscode - Request</title>
        <!-- <link rel="stylesheet" type="text/css" href="/lib/syqstyle.css"></link> -->
        <style>
            .label-parent {
                position:relative;
                bottom:0px;
                margin-top:40px;
                padding:10px;
                width:80%;
            }

            .wrapped-blog {
                /* background-color: rgb(200,200,200); */
                font-family: "Roboto";
                color : rgb(235,235,235);
                width: 80vw;
            }

            .wrapped-blog .page {
                display:flex;
                background-color : rgb(0,0,0);
                border : 1px solid white;
                border-radius: 6px;
                margin-bottom: 10px;
                margin-right: 10px;
                min-height:200px;
            }

            .wrapped-blog .cover {
                position:relative;
                top:50%;
                transform: translate(0,-50%);
                margin-left: 20px;
                width : 80%;
            }

            .wrapped-blog .cover:hover {
                width : 88%;
            }

            .wrapped-blog .page .title {
                text-align: left;
                margin-left:0px;
                margin-top: 20px;
                padding-right: 20px;
                font-size: 32px;
            }

            .wrapped-blog .page .paragraph {
                font-size: 16px;
                text-align: justify;
                padding-right:20px;
                margin-left:0px;
                margin-bottom:10px;
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

            .divider {
                display: flex;
            }

            a:visited {
                text-decoration: none;
                color:rgb(10,100,100);
            }

            a:visited, a h1:link {
                text-decoration: none;
                color:rgb(225,150,150);
            }


            .label {
                border-radius:2px;
                background-color: rgb(50,20,20);
                padding:5px;
            }

        </style>
    </head>
    <body>
        <div style="background-color:rgb(10,10,10);padding:24px;">
            <h1 class="logo-title">Hello, [ADMIN]</h1>
            <h2 style="font-family: 'Roboto';color:white;font-size:16px;">Ada Request baru dari {{$from}} !</h2>
            <p>Siap siap Kak, Requestnya adalah sebagai berikut.</p>
            <div class="wrapped-blog" style="width:720px;background-color:rgb(40,15,15);padding:10px;">
                <p style="margin-left:20px;">{{$mess}}</p>
            </div>
            <p style="font-family: 'Roboto';color:white;font-size:16px;">Yap itu pesannya [ADMIN], walaupun senang ataupun sedih tetap semangat yaa.</p>
            <br>
            <h2 style="font-family: 'Roboto';color:white;font-size:16px;">k- bye</h2>
            <p style="font-family: 'Roboto';color:white;font-size:16px;">- Aimaina</p>
        </div>
    </body>
</html>
