@extends('layouts.master')

@section('content')

    <!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full c-centered c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner1.jpg')}}); background-size:cover; background-position:center center">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">About Us</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">About Us</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN: CONTENT/SLIDERS/TEAM-2 -->
    <div class="c-content-box c-size-md c-bg-grey-1">
        <div class="container">
            <!-- Begin: Testimonals 1 component -->
            <div class="c-content-person-1-slider" data-slider="owl">
                <!-- Begin: Title 1 component -->
                <div class="c-content-title-1 wow animated fadeIn">
                    <h3 class="c-center c-font-uppercase c-font-bold">Meet The Team</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <!-- End-->

                <!-- Begin: Owlcarousel -->
                <div class="owl-carousel owl-theme c-theme c-owl-nav-center wow animated fadeInUp" data-items="3" data-slide-speed="8000" data-rtl="false">
                    <div class="c-content-person-1 c-option-2">
                        <div class="c-caption c-content-overlay">
                            <div class="c-overlay-wrapper">
                                <div class="c-overlay-content">
                                    <a href="#"><i class="icon-link"></i></a>
                                    <a href="{{asset('assets/base/img/content/franky.jpg')}}" data-lightbox="fancybox" data-fancybox-group="gallery-2">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </div>
                            </div>
                            <img src="{{asset('assets/base/img/content/franky.jpg')}}" class="img-responsive c-overlay-object" alt="Franky Gabriel Sanjaya" style="height:330px">
                        </div>
                        <div class="c-body">
                            <div class="c-head">
                                <div class="c-name c-font-uppercase c-font-bold">Franky G. Sanjaya</div>
                                <ul class="c-socials c-theme-ul">
                                    <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                </ul>
                            </div>
                            <div class="c-position">
                                S3642810
                            </div>
                            <p>
                                Loves sleeping
                            </p>
                        </div>
                    </div>
                    <div class="c-content-person-1 c-option-2">
                        <div class="c-caption c-content-overlay">
                            <div class="c-overlay-wrapper">
                                <div class="c-overlay-content">
                                    <a href="#"><i class="icon-link"></i></a>
                                    <a href="{{asset('assets/base/img/content/kendrick.jpg')}}" data-lightbox="fancybox" data-fancybox-group="gallery-2">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </div>
                            </div>
                            <img src="{{asset('assets/base/img/content/kendrick.jpg')}}" class="img-responsive c-overlay-object" alt="Kendrick Kesley" style="height:330px">
                        </div>
                        <div class="c-body">
                            <div class="c-head">
                                <div class="c-name c-font-uppercase c-font-bold">Kendrick Kesley</div>
                                <ul class="c-socials c-theme-ul">
                                    <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                </ul>
                            </div>
                            <div class="c-position">
                                S3642811
                            </div>
                            <p>
                                Loves coding
                            </p>
                        </div>
                    </div>
                    <div class="c-content-person-1 c-option-2">
                        <div class="c-caption c-content-overlay">
                            <div class="c-overlay-wrapper">
                                <div class="c-overlay-content">
                                    <a href="#"><i class="icon-link"></i></a>
                                    <a href="{{asset('assets/base/img/content/nadya.jpg')}}" data-lightbox="fancybox" data-fancybox-group="gallery-2">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </div>
                            </div>
                            <img src="{{asset('assets/base/img/content/nadya.jpg')}}" class="img-responsive c-overlay-object" alt="Nadya Safira" style="height:330px">
                        </div>
                        <div class="c-body">
                            <div class="c-head">
                                <div class="c-name c-font-uppercase c-font-bold">Nadya Safira</div>
                                <ul class="c-socials c-theme-ul">
                                    <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                </ul>
                            </div>
                            <div class="c-position">
                                S3642868
                            </div>
                            <p>
                                Loves traveling
                            </p>
                        </div>
                    </div>
                    <div class="c-content-person-1 c-option-2">
                        <div class="c-caption c-content-overlay">
                            <div class="c-overlay-wrapper">
                                <div class="c-overlay-content">
                                    <a href="#"><i class="icon-link"></i></a>
                                    <a href="{{asset('assets/base/img/content/veronica.jpg')}}" data-lightbox="fancybox" data-fancybox-group="gallery-2">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </div>
                            </div>
                            <img src="{{asset('assets/base/img/content/veronica.jpg')}}" class="img-responsive c-overlay-object" alt="Veronica Ong" style="height:330px">
                        </div>
                        <div class="c-body">
                            <div class="c-head">
                                <div class="c-name c-font-uppercase c-font-bold">Veronica Ong</div>
                                <ul class="c-socials c-theme-ul">
                                    <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                </ul>
                            </div>
                            <div class="c-position">
                                S3642807
                            </div>
                            <p>
                                Loves eating
                            </p>
                        </div>
                    </div>
                    <div class="c-content-person-1 c-option-2">
                        <div class="c-caption c-content-overlay">
                            <div class="c-overlay-wrapper">
                                <div class="c-overlay-content">
                                    <a href="#"><i class="icon-link"></i></a>
                                    <a href="{{asset('assets/base/img/content/yulita.jpg')}}" data-lightbox="fancybox" data-fancybox-group="gallery-2">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </div>
                            </div>
                            <img src="{{asset('assets/base/img/content/yulita.jpg')}}" class="img-responsive c-overlay-object" alt="Yulita Putri Hartoyo" style="height:330px">
                        </div>
                        <div class="c-body">
                            <div class="c-head">
                                <div class="c-name c-font-uppercase c-font-bold">Yulita P. Hartoyo</div>
                                <ul class="c-socials c-theme-ul">
                                    <li><a href="#"><i class="icon-social-facebook"></i></a></li>
                                </ul>
                            </div>
                            <div class="c-position">
                                S3642813
                            </div>
                            <p>
                                Loves playing games
                            </p>
                        </div>
                    </div>

                </div>
                <!-- End-->
            </div>
            <!-- End-->
        </div>
    </div><!-- END: CONTENT/SLIDERS/TEAM-2 -->
    <!-- BEGIN: FEATURES 13.2 -->
    <div class="c-content-box c-size-md c-no-padding c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/photo.png')}})">
        <div class="c-content-feature-13">
            <div class="row c-reset">
                <div class="col-md-6 col-md-offset-6 c-bg-white">
                    <div class="c-feature-13-container">
                        <div class="c-content-title-1">
                            <h3 class="c-center c-font-uppercase c-font-bold">What makes us <span class="c-theme-font">GREAT</span></h3>
                            <div class="c-line-center c-theme-bg"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 c-feature-13-tile">
                                <i class="icon-energy c-theme-font c-font-24"></i>
                                <div class="c-feature-13-content">
                                    <h4 class="c-font-uppercase c-theme-font c-font-bold">Blazing Development</h4>
                                    <p class="c-font-dark">Lorem ipsum dolor consetuer adipicing sed diam ticidut erat votpat dolore</p>
                                </div>
                            </div>
                            <div class="col-sm-6 c-feature-13-tile">
                                <i class="icon-star c-theme-font c-font-24"></i>
                                <div class="c-feature-13-content">
                                    <h4 class="c-font-uppercase c-theme-font c-font-bold">Top Quality</h4>
                                    <p class="c-font-dark">Lorem ipsum dolor consetuer adipicing sed diam ticidut erat votpat dolore</p>
                                </div>
                            </div>
                        </div>
                        <div class="row c-margin-t-40">
                            <div class="col-sm-6 c-feature-13-tile">
                                <i class="icon-hourglass c-theme-font c-font-24"></i>
                                <div class="c-feature-13-content">
                                    <h4 class="c-font-uppercase c-theme-font c-font-bold">Highly Efficient</h4>
                                    <p class="c-font-dark">Lorem ipsum dolor consetuer adipicing sed diam ticidut erat votpat dolore</p>
                                </div>
                            </div>
                            <div class="col-sm-6 c-feature-13-tile">
                                <i class="icon-bubbles c-theme-font c-font-24"></i>
                                <div class="c-feature-13-content">
                                    <h4 class="c-font-uppercase c-theme-font c-font-bold">Great Support</h4>
                                    <p class="c-font-dark">Lorem ipsum dolor consetuer adipicing sed diam ticidut erat votpat dolore</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: FEATURES 13-2 --><!-- END: CONTENT/FEATURES/FEATURES-13-2 -->

@endsection