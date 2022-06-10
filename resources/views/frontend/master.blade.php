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

        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> --}}

    @yield('css')
    @stack('css')
    {{-- <link type="text/css" href="{{ asset('css') }}/argon.css?v=1.0.0" rel="stylesheet"> --}}


  {{-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> --}}

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
    
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}


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

    
     <script src="{{ asset('js/app.js') }}"></script>


    @yield('js')
    @stack('js')
</body>

</html>
