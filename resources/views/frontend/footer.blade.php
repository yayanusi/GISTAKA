<footer id="footer" class="section">

        <div class="container">

            <div class="row">

                <div class="col-md-4">
                    <div class="footer">
                        <div class="footer-logo">
                            <a class="logo" href="#"><img src="{{ asset('frontend') }}/img/logo.png"
                                    alt=""></a>
                        </div>
                        <p>Aplikasi sistem informasi geografis persebaran Sekolah TK di Kecamatan
                            Loajanan Kabupaten Kutai Kartanegara.</p>
                        
                    </div>
                </div>


                {{-- <div class="col-md-4">
                    <div class="footer">
                        <h3 class="footer-title">Galery</h3>
                        <ul class="footer-galery">
                            <li><a href="#"><img src="{{ asset('frontend') }}/img/galery-1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend') }}/img/galery-2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend') }}/img/galery-3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend') }}/img/galery-4.jpg" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend') }}/img/galery-5.jpg" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend') }}/img/galery-6.jpg" alt=""></a></li>
                        </ul>
                    </div>
                </div> --}}


                {{-- <div class="col-md-4">
                    <div class="footer">
                        <h3 class="footer-title">Newsletter</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
                        </p>
                        <form class="footer-newsletter">
                            <input class="input" type="email" placeholder="Enter your email">
                            <button class="primary-button">Subscribe</button>
                        </form>
                        <ul class="footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div> --}}

            </div>


            <div id="footer-bottom" class="row">
                <div class="col-md-6 col-md-push-6">
                    <ul class="footer-nav">
                        <li><a href="{{ route('frontpage') }}">Beranda</a></li>
                        <li><a href="{{ route('maps') }}">GIS</a></li>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        {{-- <li><a href="#">Events</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <div class="footer-copyright">
                        <span>
                            Copyright &copy;
                            <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | GISTAKA
                        </span>
                    </div>
                </div>
            </div>

        </div>

    </footer>