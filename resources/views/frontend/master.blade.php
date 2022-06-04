<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400%7CSource+Sans+Pro:700" rel="stylesheet">

    <link type="text/css" rel="stylesheet"
        href="{{ asset('frontend') }}/css/bootstrap.min.css%2bowl.carousel.css%2bowl.theme.default.css%2bfont-awesome.min.css%2bstyle.css.pagespeed.cc.jW_7sYDfOu.css" />

    @yield('css')
    @stack('css')



    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script nonce="674c6029-4d2e-4386-a8c2-76ad1af2873e">
        (function(w, d) {
            ! function(a, e, t, r) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zaraz = {
                    deferred: []
                }, a.zaraz.q = [], a.zaraz._f = function(e) {
                    return function() {
                        var t = Array.prototype.slice.call(arguments);
                        a.zaraz.q.push({
                            m: e,
                            a: t
                        })
                    }
                };
                for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
                a.addEventListener("DOMContentLoaded", (() => {
                    var t = e.getElementsByTagName(r)[0],
                        z = e.createElement(r),
                        n = e.getElementsByTagName("title")[0];
                    for (n && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.x =
                        Math.random(), a.zarazData.w = a.screen.width, a.zarazData.h = a.screen.height, a
                        .zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a.zarazData.l = a
                        .location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a
                        .zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a
                        .zarazData.q = []; a.zaraz.q.length;) {
                        const e = a.zaraz.q.shift();
                        a.zarazData.q.push(e)
                    }
                    z.defer = !0;
                    for (const e of [localStorage, sessionStorage]) Object.keys(e).filter((a => a
                        .startsWith("_zaraz_"))).forEach((t => a.zarazData["z_" + t.slice(7)] = JSON
                        .parse(e.getItem(t))));
                    z.referrerPolicy = "origin", z.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(
                        encodeURIComponent(JSON.stringify(a.zarazData))), t.parentNode.insertBefore(z,
                        t)
                }))
            }(w, d, 0, "script");
        })(window, document);
    </script>
</head>

<body>

    <header id="home"  @yield('indexStyle')>

        <nav id="main-navbar">
            <div class="container">
                <div class="navbar-header">

                    <div class="navbar-brand">
                        <a class="logo" href="{{ route('frontpage') }}"><img
                                src="{{ asset('frontend') }}/img/logo.png" alt="logo" min-width="250"></a>
                    </div>


                    <button class="navbar-toggle-btn">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>


                <ul class="navbar-menu nav navbar-nav navbar-right">
                    <li><a href="{{ route('frontpage') }}">Beranda</a></li>
                    <li><a href="{{ route('maps') }}">GIS</a></li>
                    {{-- <li class="has-dropdown"><a href="#">GIS</a>
                        <ul class="dropdown">
                            <li><a href="single-cause.html">Single Cause</a></li>
                        </ul>
                    </li> --}}


                    <li><a href="{{ route('berita') }}">Berita</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>

            </div>
        </nav>
        @yield('isIndex')
    </header>

    @yield('content')





    @yield('useFooter')


    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js%2bowl.carousel.min.js.pagespeed.jc.6INv6TP5LI.js"></script>
    <script>
        eval(mod_pagespeed_o3ddRsRvMY);
    </script>
    <script>
        eval(mod_pagespeed_hws1mPg42b);
    </script>
    <script src="{{ asset('frontend') }}/js/jquery.stellar.min.js%2bmain.js.pagespeed.jc.TaD_OS7Wkn.js"></script>
    <script>
        eval(mod_pagespeed_Ki5OopftaL);
    </script>
    <script>
        eval(mod_pagespeed_JMZFdOFuYW);
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"70d7ba0e8dfd4dd4","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}'
        crossorigin="anonymous"></script>
     <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')
    @stack('js')
</body>

</html>
