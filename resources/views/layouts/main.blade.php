<!DOCTYPE html>

<html>
    <head>
        <meta char="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title')
        </title>

        <link rel="icon" href="{{ asset('/lib/logo-icon.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/lib/syqstyle.css') }}">
        <script type="application/javascript" src="{{asset('/lib/vue.min.js')}}"></script>
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
                        <div class="subsegment">
                            <div>
                                <p><img src="/lib/fbi.jpg" width="80%" ></img>
                                    Download GTA san andreas dengan menggunakan kincir angin yang sangat besar
                                </p>
                            </div>
                        </div>
                        <div class="subsegment">
                            <p><img src="/lib/fbi.jpg" width="80%" ></img>
                                Download GTA V
                            </p>
                        </div>
                        <div class="subsegment">
                            <p><img src="/lib/glitch.jpg" width="80%" ></img>
                                Download GTA V
                            </p>
                        </div>
                        <div class="subsegment">
                            <p><img src="/lib/logo-icon.png" width="80%" ></img>
                                Download GTA V
                            </p>
                        </div>
                        <div class="subsegment">
                            <p><img src="/lib/sweet.jpg" width="80%" ></img>
                                Download GTA V
                            </p>
                        </div>
                    </div>
                    <div class="segment">
                        <h2>Page</h2>
                        <div class="subsegment">
                            <h3>Homepage</h3>
                            <h3>About Me</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-divider">
                    <div class="footer-part footer-width" style="background-color: rgb(5,5,5);">
                        <h2>Page</h2>
                        <div class="subsegment" style="border-radius: 4px;background-color: rgb(15,15,15);">
                            <h3 style="width:100%;">Homepage</h3>
                            <h3 style="width:100%;">Search</h3>
                            <h3 style="width:100%;">Request</h3>
                            <h3 style="width:100%;">About Me</h3>
                        </div>
                    </div>
                    <div class="footer-part footer-width" style="background-color: rgb(15,15,15);">
                        <h2>Contact</h2>
                        <div class="subsegment" style="border-radius: 4px;background-color: rgb(25,25,25);">
                            <h3 style="width:100%;">Instagram</h3>
                            <h3 style="width:100%;">Line</h3>
                        </div>
                    </div>
                    <div class="footer-part footer-width" style="background-color: rgb(25,25,25);">
                        <h2>About Me</h2>
                        <div class="subsegment-no-hover" style="border-radius: 4px;background-color: rgb(35,35,35);">
                            <h3 style="width:80%;">
                                Syqsterr, Alecetra @ Syqscode
                                <br><br><br>
                                Member of Departement
                                <br><br>
                                Love Technologies
                                <br><br>
                                Like Experiment
                                <br><br>
                                Love Aimaina and 2D
                                <br><br>
                                Love PinoccioP, Mili, NekoHacker and Nanahira
                                <br><br><br>
                                No pHotoSs
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
                scroll_val : 0
            },
            methods : {
                anim_encode(){
                    this.loading = 0;
                    this.isloading = true;
                    this.next_title = btoa(this.title).slice(0,8);
                    if (this.next_title == this.title){
                        this.next_title = "Syqscode";
                    }
                }
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
    </script>
</html>
