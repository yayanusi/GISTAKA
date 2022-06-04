@extends('frontend.master')

{{-- @section('isIndex') @include('frontend.slider') @stop --}}
@section('indexStyle') style="height: 25px!important;" @stop
@section('useFooter') @include('frontend.footer') @stop

@section('content')
    <div id="page-header">

        <div class="section-bg" style="background-image: url({{ asset('frontend') }}/img/bg-1.jpg);"></div>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-content">
                        <h1>Detail Berita</h1>
                        <ul class="breadcrumb">
                            <li><a href="{{ route('frontpage') }}">Home</a></li>

                            <li><a href="{{ route('berita') }}">Berita</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="section">

        <div class="container">

            <div class="row">

                <main id="main" class="col-md-12">

                    <div class="article">

                        <div class="article-img">
                            <img src="{{ $data->foto }}" alt="">
                        </div>


                        <div class="article-content">

                            <h2 class="article-title">{{ $data->judul }}</h2>


                            <ul class="article-meta">
                                <li>{{ tgl_id($data->updated_at) }}</li>
                                <li>By Admin</li>
                                <li>0 Comments</li>
                            </ul>

                            <p>{{ $data->preview }}</p>
                            
                            <p>{!! $data->isi !!}</p>
                        </div>


                        {{-- <div class="article-tags-share">

                            <ul class="tags">
                                <li>TAGS:</li>
                                <li><a href="#">Charity</a></li>
                                <li><a href="#">Health</a></li>
                                <li><a href="#">Donation</a></li>
                            </ul>


                            <ul class="share">
                                <li>SHARE:</li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>

                        </div>


                        <div class="article-comments">
                            <h3>Comments (3)</h3>

                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/xavatar-1.jpg.pagespeed.ic.RkR3XY-knB.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>Joe Doe</h4>
                                        <span class="time">2 min ago</span>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>

                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="img/xavatar-2.jpg.pagespeed.ic.lZk0jiPD8Z.jpg"
                                            alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h4>Joe Doe</h4>
                                            <span class="time">2 min ago</span>
                                            <a href="#" class="reply">Reply</a>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.</p>
                                    </div>
                                </div>

                            </div>


                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="img/xavatar-1.jpg.pagespeed.ic.RkR3XY-knB.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>Joe Doe</h4>
                                        <span class="time">2 min ago</span>
                                        <a href="#" class="reply">Reply</a>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>

                        </div>


                        <div class="article-reply">
                            <h3>Leave a reply</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="input" placeholder="Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="input" placeholder="Email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="input" placeholder="Website" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="input" placeholder="Message"></textarea>
                                        </div>
                                        <button class="primary-button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}

                    </div>

                </main>


                

            </div>

        </div>

    </div>
@endsection
