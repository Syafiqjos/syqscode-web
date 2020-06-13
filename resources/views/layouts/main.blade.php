<!DOCTYPE html>

<html>
    <head>
        <meta char="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Syqscode">
        <meta name="description" content="Website blog dengan postingan seputar teknologi, pemrograman, CTF, tutorial dan life hack yang fokus pada experiment, percobaan dan pemecahan masalah.">
        <meta name="keywords" content="teknologi,art,ctf,problem solving,programming,coding,experiment,percobaan,tutorial,hack">
        <meta name="copyright" content="@ 2020 Syqscode">
        <meta name="geo.placename" content="Indonesia">
        <meta name="language" content="Bahasa">
        <meta name="target" content="global">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title')
        </title>

        <link rel="icon" href="{{ asset('/lib/logo-icon.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/lib/syqstyle.css') }}">
        <script type="application/javascript" src="{{asset('/lib/vue.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        @yield('exscr')
    </head>
    <body>
        <div id="master" align="center">
            @yield('header')
            <div class="wrapped" >
                <div class="wrapped-blog" width="90%">
                    @yield('posts')
                </div>
                <div class="wrapped-panel" width="10%">
                    <div class="segment">
                        <h2 >Popular Post</h2>
                        @php use App\Post;$popular = Post::all()->where('is_deleted','0')->sortByDesc('visited')->slice(0,5)->values();@endphp
                        @foreach($popular as $popu)
                            <div class="subsegment">
                                <a href="{{$popu->url}}">
                                    <p><img src="{{$popu->cover}}" width="80%" ></img><br>
                                        {{ $popu->title }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="segment">
                        <h2>Newsletter</h2>
                        <div class="subsegment">
                            <a href="/subscribe-newsletter" style="color:rgb(225,225,225)"><h3>Subscribe</h3></a></a>
                        </div>
                    </div>
                    <div class="segment">
                        <h2>Page</h2>
                        <div class="subsegment">
                            <a href="/" style="color:rgb(225,225,225);"><h3>Homepage</h3></a>
                            <a href="/page" style="color:rgb(225,225,225);"><h3>Blog</h3></a>
                            <a href="/tags" style="color:rgb(225,225,225);"><h3>Tags</h3></a>
                            <a href="/request" style="color:rgb(225,225,225);"><h3>Request</h3></a>
                            <a href="/about-us" style="color:rgb(225,225,225);"><h3>About Us</h3></a>
                        </div>
                    </div>
                    <div class="segment">
                        <h2>Sponsor</h2>
                        <div class="subsegment">
                            <a><img width="100%" src="/lib/sponsor-box.png"></img></a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="footer">
                <div class="footer-divider">
                    <div class="footer-part footer-width" style="background-color: rgb(5,5,5);">
                        <h2>Page</h2>
                        <div class="subsegment" style="border-radius: 4px;background-color: rgb(15,15,15);">
                            <a style="color:white;" href="/"><h3 style="width:100%;">Homepage</h3></a>
                            <a style="color:white;" href="/subscribe-newsletter"><h3 style="width:100%;">Subscribe Newsletter</h3></a>
                            <a style="color:white;" href="/page"><h3 style="width:100%;">Blog</h3></a>
                            <a style="color:white;" href="/tags"><h3 style="width:100%;">Tags</h3></a>
                            <a style="color:white;" href="/about-us"><h3 style="width:100%;">About Us</h3></a>
                        </div>
                    </div>
                    <div class="footer-part footer-width" style="background-color: rgb(15,15,15);">
                        <h2>Contact</h2>
                        <div class="subsegment" style="border-radius: 4px;background-color: rgb(25,25,25);">
                            <a style="color:white;" href="/request"><h3 style="width:100%;">Direct Request</h3></a>
                            <a style="color:white;" href="mailto:admin@syqscode.com"><h3 style="width:100%;">Email : admin@syqscode.com</h3></a>
                            <a target="_blank" rel="noopener noreferrer" style="color:white;" href="https://www.instagram.com/syqscode/"><h3 style="width:100%;">Instagram : @syqscode</h3></a>
                            <h3 style="width:100%;">Line : syafiqnd</h3>
                        </div>
                    </div>
                    <div class="footer-part footer-width" style="background-color: rgb(25,25,25);">
                        <h2>About Us</h2>
                        <div class="subsegment-no-hover" style="border-radius: 4px;background-color: rgb(35,35,35);">
                            <h3 style="width:80%;">
                                <p style="margin-bottom: 32px;">Syqsterr, Alecetra @ Syqscode</p>
                                <p style="margin-bottom: 32px;">Member of Departement</p>
                                <p style="margin-bottom: 32px;">Love Technologies</p>
                                <p style="margin-bottom: 32px;">Like Experiment</p>
                                <p style="margin-bottom: 32px;">Contact [ADMIN] anytime.</p>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="trademarks"></div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        var vm = new Vue({
            el : "#master",
            data : {
                title : 'Syqscode',
                next_title : '',
                isloading : false,
                loading : 0,
                scroll_val : 0,

                desc_cursor : false,
                desc_isdeleting : false,
                desc_iswriting : false,
                desc_counter_max : 16,
                desc_counter : 0,
                desc_qu: 0,
                desc_index: 0,
                desc : 'Welcome to The Art of Code',
                desc_target : 'Anjay Mabar bjirr gta san andreas',
                @yield('vue-attr')
            },
            methods : {
                anim_encode(){
                    this.loading = 0;
                    this.isloading = true;
                    this.next_title = btoa(this.title).slice(0,8);
                    if (this.next_title == this.title){
                        this.next_title = "Syqscode";
                    }
                },

            }
        });

        setInterval(()=>{
            if (vm.isloading){
                if (vm.loading < vm.title.length){
                    var dis = vm.next_title.slice(0,vm.loading + 1) + vm.title.slice(vm.loading + 1 ,vm.title.length);
                    vm.title = dis;
                } else {
                    vm.isloading = false;
                }
                vm.loading++;
            }
        },20);

        if (false){
            setInterval(()=>{
                if (!vm.desc_isdeleting){
                    if (vm.desc_qu >= 10){
                        if (vm.desc_cursor){
                            vm.desc = vm.desc.substring(0,vm.desc.length-1);
                        } else {
                            var x = vm.desc;
                            vm.desc += '_';
                        }
                        // if (vm.desc_counter > vm.desc_counter_max){
                        //     vm.desc_isdeleting = true;
                        //     vm.desc_index = vm.desc.length;
                        // }
                        vm.desc_counter++;
                        vm.desc_qu = 0;
                        vm.desc_cursor = !vm.desc_cursor;
                    }
                    vm.desc_qu++;
                } else {
                    if (vm.desc_iswriting){
                        if (vm.desc_index <= vm.desc_target.length){
                            vm.desc = vm.desc_target.substring(0,vm.desc_index + 1);
                            vm.desc_index++;
                        } else {
                            vm.desc_isdeleting = false;
                            vm.desc_iswriting = false;
                            vm.desc_counter = 0;
                            vm.desc_index = 0;
                            vm.desc_qu = 0;
                            vm.desc_cursor = true;
                        }
                    } else {
                        if (vm.desc_index - 1 > 1){
                            vm.desc = vm.desc.substring(0,vm.desc_index-1);
                            vm.desc_index--;
                        } else {
                            vm.desc = vm.desc_target.substring(0,1);
                            vm.desc_iswriting = true;
                        }
                    }
                }
                vm.desc_cursor = !vm.desc_cursor;
            },50);
        }
    </script>
    @yield('vue')
</html>
