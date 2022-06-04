@extends('frontend.master')

{{-- @section('isIndex') @include('frontend.slider') @stop --}}
@section('indexStyle') style="height: 25px!important;" @stop
@section('useFooter') @include('frontend.footer') @stop

@section('content')
<div id="page-header">

			<div class="section-bg bg-info" style="background-image: url({{ asset('frontend') }}/img/bg-1.jpg);"></div>


			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="header-content">
							<h1>Berita</h1>
							<ul class="breadcrumb">
								<li><a href="{{ route('frontpage') }}">Home</a></li>
								<li class="active">Berita</li>
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
                    <div class="row">
                    @foreach($data as $key => $temp)
                        <div class="col-md-6">
                            <div class="article">
                                <div class="article-img">
                                    <a href="{{ route('berita.detail', $temp->id) }}">
                                        <img src="{{ $temp->foto }}" alt="">
                                    </a>
                                </div>
                                <div class="article-content">
                                    <h3 class="article-title"><a href="{{ route('berita.detail', $temp->id) }}">{{ $temp->judul}}</a></h3>
                                    <ul class="article-meta">
                                        <li>{{ $temp->created_at }}</li>
                                        <li>By Admin</li>
                                        <li>0 Comments</li>
                                    </ul>
                                    <p>{{$temp->preview}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                       

                        <div class="clearfix visible-md visible-lg"></div>

                    </div>
                </main>


                {{-- <aside id="aside" class="col-md-3">

                    <div class="widget">
                        <h3 class="widget-title">Category</h3>
                        <div class="widget-category">
                            <ul>
                                <li><a href="#">Health<span>(57)</span></a></li>
                                <li><a href="#">Food<span>(86)</span></a></li>
                                <li><a href="#">Education<span>(241)</span></a></li>
                                <li><a href="#">Donation<span>(65)</span></a></li>
                                <li><a href="#">Events<span>(14)</span></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="widget">
                        <h3 class="widget-title">Latest Posts</h3>

                        <div class="widget-post">
                            <a href="#">
                                <div class="widget-img">
                                    <img src="img/xwidget-1.jpg.pagespeed.ic.oldoL5gfhD.jpg" alt="">
                                </div>
                                <div class="widget-content">
                                    Possit nostro aeterno eu vis, ut cum quem reque
                                </div>
                            </a>
                            <ul class="article-meta">
                                <li>By John doe</li>
                                <li>12 November 2018</li>
                            </ul>
                        </div>


                        <div class="widget-post">
                            <a href="#">
                                <div class="widget-img">
                                    <img src="img/xwidget-2.jpg.pagespeed.ic.BwvwTN5sj9.jpg" alt="">
                                </div>
                                <div class="widget-content">
                                    Vix fuisset tibique facilisis cu. Justo accusata ius at
                                </div>
                            </a>
                            <ul class="article-meta">
                                <li>By John doe</li>
                                <li>12 November 2018</li>
                            </ul>
                        </div>


                        <div class="widget-post">
                            <a href="#">
                                <div class="widget-img">
                                    <img src="img/xwidget-3.jpg.pagespeed.ic.Cz6oaCi-ex.jpg" alt="">
                                </div>
                                <div class="widget-content">
                                    Possit nostro aeterno eu vis, ut cum quem reque
                                </div>
                            </a>
                            <ul class="article-meta">
                                <li>By John doe</li>
                                <li>12 November 2018</li>
                            </ul>
                        </div>

                    </div>


                    <div class="widget">
                        <h3 class="widget-title">Latest Causes</h3>

                        <div class="widget-causes">
                            <a href="#">
                                <div class="widget-img">
                                    <img src="img/xwidget-1.jpg.pagespeed.ic.oldoL5gfhD.jpg" alt="">
                                </div>
                                <div class="widget-content">
                                    Possit nostro aeterno eu vis, ut cum quem reque
                                    <div class="causes-progress">
                                        <div class="causes-progress-bar">
                                            <div style="width: 64%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span> -
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>


                        <div class="widget-causes">
                            <a href="#">
                                <div class="widget-img">
                                    <img src="img/xwidget-2.jpg.pagespeed.ic.BwvwTN5sj9.jpg" alt="">
                                </div>
                                <div class="widget-content">
                                    Vix fuisset tibique facilisis cu. Justo accusata ius at
                                    <div class="causes-progress">
                                        <div class="causes-progress-bar">
                                            <div style="width: 75%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span> -
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>


                        <div class="widget-causes">
                            <a href="#">
                                <div class="widget-img">
                                    <img src="img/xwidget-3.jpg.pagespeed.ic.Cz6oaCi-ex.jpg" alt="">
                                </div>
                                <div class="widget-content">
                                    Possit nostro aeterno eu vis, ut cum quem reque
                                    <div class="causes-progress">
                                        <div class="causes-progress-bar">
                                            <div style="width: 53%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div>
                                <span class="causes-raised">Raised: <strong>52.000$</strong></span> -
                                <span class="causes-goal">Goal: <strong>90.000$</strong></span>
                            </div>
                        </div>

                    </div>

                </aside> --}}

            </div>

        </div>

    </div>
@endsection
