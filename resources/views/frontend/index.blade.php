@extends('frontend.master')

@section('isIndex') @include('frontend.slider') @stop
@section('useFooter') @include('frontend.footer') @stop

@section('content')
<div id="about" class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-5">
                    <div class="section-title">
                        <h2 class="title">Selamat Datang di Aplikasi GISTAKA</h2>
                        <p class="sub-title">Aplikasi sistem informasi geografis persebaran Sekolah TK di Kecamatan
                            Loajanan Kabupaten Kutai Kartanegara.</p>
                    </div>
                    <div class="about-content">
                        <p> Hasil yang diharapkan berupa sebuah aplikasi GIS yang dapat memberikan kemudahan kepada
                            masyarakat untuk mengakses sekolah mana saja yang bisa dijadikan referensi untuk pendidikan
                            anak.</p>
                        <a href="#" class="primary-button">Read More</a>
                    </div>
                </div>


                <div class="col-md-offset-1 col-md-6">
                    <a href="#" class="about-video">
                        <img src="{{ asset('frontend') }}/img/about.png" alt="">
                    </a>
                </div>

            </div>

        </div>

    </div>


    <div id="numbers" class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-smile-o"></i>
                        <h3>47k</h3>
                        <span>Donors</span>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-heartbeat"></i>
                        <h3>154K</h3>
                        <span>Children Saved</span>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-money"></i>
                        <h3>785K</h3>
                        <span>Donated</span>
                    </div>
                </div>


                <div class="col-md-3 col-sm-6">
                    <div class="number">
                        <i class="fa fa-handshake-o"></i>
                        <h3>357</h3>
                        <span>Volunteers</span>
                    </div>
                </div>

            </div>

        </div>

    </div>


    {{-- <div id="causes" class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2 class="title">Our Causes</h2>
                        <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="causes">
                        <div class="causes-img">
                            <a href="single-cause.html">
                                <img src="{{ asset('frontend') }}/img/post-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 87%;">
                                    <span>87%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <h3><a href="single-cause.html">Possit nostro aeterno eu vis, ut cum quem reque</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <a href="single-cause.html" class="primary-button causes-donate">Donate Now</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="causes">
                        <div class="causes-img">
                            <a href="single-cause.html">
                                <img src="{{ asset('frontend') }}/img/post-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 53%;">
                                    <span>53%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <h3><a href="single-cause.html">Vix fuisset tibique facilisis cu. Justo accusata ius at</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <a href="single-cause.html" class="primary-button causes-donate">Donate Now</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="causes">
                        <div class="causes-img">
                            <a href="single-cause.html">
                                <img src="{{ asset('frontend') }}/img/post-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 72%;">
                                    <span>72%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <h3><a href="single-cause.html">Possit nostro aeterno eu vis, ut cum quem reque</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <a href="single-cause.html" class="primary-button causes-donate">Donate Now</a>
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-md visible-lg"></div>

                <div class="col-md-4">
                    <div class="causes">
                        <div class="causes-img">
                            <a href="single-cause.html">
                                <img src="{{ asset('frontend') }}/img/post-4.jpg" alt="">
                            </a>
                        </div>
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 64%;">
                                    <span>64%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <h3><a href="single-cause.html">Possit nostro aeterno eu vis, ut cum quem reque</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <a href="single-cause.html" class="primary-button causes-donate">Donate Now</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="causes">
                        <div class="causes-img">
                            <a href="single-cause.html">
                                <img src="{{ asset('frontend') }}/img/post-5.jpg" alt="">
                            </a>
                        </div>
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 72%;">
                                    <span>72%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <h3><a href="single-cause.html">Vix fuisset tibique facilisis cu. Justo accusata ius at</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <a href="single-cause.html" class="primary-button causes-donate">Donate Now</a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="causes">
                        <div class="causes-img">
                            <a href="single-cause.html">
                                <img src="{{ asset('frontend') }}/img/post-6.jpg" alt="">
                            </a>
                        </div>
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: 53%;">
                                    <span>53%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span>
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>
                        <div class="causes-content">
                            <h3><a href="single-cause.html">Possit nostro aeterno eu vis, ut cum quem reque</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <a href="single-cause.html" class="primary-button causes-donate">Donate Now</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div> --}}


    <div id="cta" class="section">

        <div class="section-bg" style="background-image: url({{ asset('frontend') }}/img/background-1.jpg);"
            data-stellar-background-ratio="0.5"></div>


        <div class="container">

            <div class="row">

                <div class="col-md-offset-2 col-md-8">
                    <div class="cta-content text-center">
                        <h1>GIS Taman Kanak-kanan</h1>
                        <p class="lead">Aplikasi sistem informasi geografis persebaran Sekolah TK di Kecamatan
                            Loajanan Kabupaten Kutai Kartanegara.</p>
                        <a href="#" class="primary-button">Telusuri Maps</a>
                    </div>
                </div>

            </div>

        </div>

    </div>


    {{-- <div id="events" class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2 class="title">Upcoming Events</h2>
                        <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="event">
                        <div class="event-img">
                            <a href="single-event.html">
                                <img src="{{ asset('frontend') }}/img/event-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="event-content">
                            <h3><a href="single-event.html">Possit nostro aeterno eu vis, ut cum quem reque</a></h3>
                            <ul class="event-meta">
                                <li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
                                <li><i class="fa fa-map-marker"></i> 2736 Hinkle Deegan Lake Road</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="event">
                        <div class="event-img">
                            <a href="single-event.html">
                                <img src="{{ asset('frontend') }}/img/event-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="event-content">
                            <h3><a href="single-event.html">Vix fuisset tibique facilisis cu. Justo accusata ius at</a>
                            </h3>
                            <ul class="event-meta">
                                <li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
                                <li><i class="fa fa-map-marker"></i> 2736 Hinkle Deegan Lake Road</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-md visible-lg"></div>

                <div class="col-md-6">
                    <div class="event">
                        <div class="event-img">
                            <a href="single-event.html">
                                <img src="{{ asset('frontend') }}/img/event-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="event-content">
                            <h3><a href="single-event.html">Possit nostro aeterno eu vis, ut cum quem reque</a></h3>
                            <ul class="event-meta">
                                <li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
                                <li><i class="fa fa-map-marker"></i> 2736 Hinkle Deegan Lake Road</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="event">
                        <div class="event-img">
                            <a href="single-event.html">
                                <img src="{{ asset('frontend') }}/img/event-4.jpg" alt="">
                            </a>
                        </div>
                        <div class="event-content">
                            <h3><a href="single-event.html">Vix fuisset tibique facilisis cu. Justo accusata ius at</a>
                            </h3>
                            <ul class="event-meta">
                                <li><i class="fa fa-clock-o"></i> 24 October, 2018 | 8:00AM - 11:00PM</li>
                                <li><i class="fa fa-map-marker"></i> 2736 Hinkle Deegan Lake Road</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div> --}}


    {{-- <div id="testimonial" class="section">

        <div class="section-bg" style="background-image: url({{ asset('frontend') }}/img/background-2.jpg);"
            data-stellar-background-ratio="0.5"></div>


        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div id="testimonial-owl" class="owl-carousel owl-theme">

                        <div class="testimonial">
                            <div class="testimonial-meta">
                                <div class="testimonial-img">
                                    <img src="{{ asset('frontend') }}/img/avatar-1.jpg" alt="">
                                </div>
                                <h3>John Doe</h3>
                                <span>Volunteer</span>
                            </div>
                            <div class="testimonial-quote">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </blockquote>
                            </div>
                        </div>


                        <div class="testimonial">
                            <div class="testimonial-meta">
                                <div class="testimonial-img">
                                    <img src="{{ asset('frontend') }}/img/avatar-2.jpg" alt="">
                                </div>
                                <h3>John Doe</h3>
                                <span>Volunteer</span>
                            </div>
                            <div class="testimonial-quote">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </blockquote>
                            </div>
                        </div>


                        <div class="testimonial">
                            <div class="testimonial-meta">
                                <div class="testimonial-img">
                                    <img src="{{ asset('frontend') }}/img/avatar-1.jpg" alt="">
                                </div>
                                <h3>John Doe</h3>
                                <span>Volunteer</span>
                            </div>
                            <div class="testimonial-quote">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </blockquote>
                            </div>
                        </div>


                        <div class="testimonial">
                            <div class="testimonial-meta">
                                <div class="testimonial-img">
                                    <img src="{{ asset('frontend') }}/img/avatar-2.jpg" alt="">
                                </div>
                                <h3>John Doe</h3>
                                <span>Volunteer</span>
                            </div>
                            <div class="testimonial-quote">
                                <blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                </blockquote>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div> --}}


    {{-- <div id="blog" class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-8 col-md-offset-2">
                    <div class="section-title text-center">
                        <h2 class="title">Our Blog</h2>
                        <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="article">
                        <div class="article-img">
                            <a href="single-blog.html">
                                <img src="{{ asset('frontend') }}/img/post-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-content">
                            <h3 class="article-title"><a href="single-blog.html">Possit nostro aeterno eu vis, ut cum
                                    quem reque</a></h3>
                            <ul class="article-meta">
                                <li>12 November 2018</li>
                                <li>By John doe</li>
                                <li>0 Comments</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="article">
                        <div class="article-img">
                            <a href="single-blog.html">
                                <img src="{{ asset('frontend') }}/img/post-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-content">
                            <h3 class="article-title"><a href="single-blog.html">Vix fuisset tibique facilisis cu.
                                    Justo accusata ius at</a></h3>
                            <ul class="article-meta">
                                <li>12 November 2018</li>
                                <li>By John doe</li>
                                <li>0 Comments</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="article">
                        <div class="article-img">
                            <a href="single-blog.html">
                                <img src="{{ asset('frontend') }}/img/post-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="article-content">
                            <h3 class="article-title"><a href="single-blog.html">Possit nostro aeterno eu vis, ut cum
                                    quem reque</a></h3>
                            <ul class="article-meta">
                                <li>12 November 2018</li>
                                <li>By John doe</li>
                                <li>0 Comments</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div> --}}
@endsection