<!DOCTYPE html>

<html>
    <head>
        <title>@yield('title')</title>
        <script type="application/javascript" src="{{asset('/lib/vue.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('/lib/syqstyle.css')}}" >
    </head>
    <body>
        <div>
            @yield('content')
        </div>
    </body>
</html>
