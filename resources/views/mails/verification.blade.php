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
                font-family: 'SquareFont';
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
            <h1>Hello, {{$target}}</h1>
            <h2>Aimaina mendeteksi kamu memberi komentar di situs <a style="font-family: 'SquareFont';border: 2px solid white;padding:2px;" href="http://syqscode.com/">Syqscode</a>.</h2>
            <p>Jika kamu mau menerima email setiap kali komentarmu dibalas, silahkan mengklik url verifikasi dibawah.</p>
            <p>Verifikasi : <a href="{{asset('/')}}{{'verify?c='.$link}}">{{asset('/')}}{{'verify?c='.$link}}<a/></p>
            <p>Meskipun nggak verifikasi, kamu juga masih dapat berkomentar di situs ini.</p>
            <br>
            <h2 style="font-family: 'Roboto';color:white;font-size:16px;">k- bye</h2>
            <p style="font-family: 'Roboto';color:white;font-size:16px;">- Aimaina</p>
        </div>
    </body>
</html>
