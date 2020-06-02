<!DOCTYPE html>

<html>
    <head>
        <meta char="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Syqscode</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('/lib/syqstyle.css') }}">
        <script type="application/javascript" src="{{asset('/lib/vue.min.js')}}"></script>
    </head>
    <body>
        <div id="master" align="center">
            <div class="position-middle-center" width="100%">
                <div>
                    <h1 v-on:click="anim_encode()" v-on:mouseover="anim_go()" v-on:mouseleave="anim_lv()" class="logo-title logo-title-big" style="margin:0px;"> [@{{title}}@{{ch}}] </h1>
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
                ch : ''
            },
            methods : {
                anim_go(){
                    // this.isloading = true;
                },
                anim_lv(){
                    // this.isloading = false;
                    // this.ch = '';
                },
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
