@extends('layouts.master')

@section('content')

    <!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner7.jpg')}}); background-position:center 60%">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">How It Works</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">How It Works</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- BEGIN: CONTENT/STEPS/STEPS-1 -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="c-content-title-1 c-margin-b-60">
                        <h3 class="c-center c-font-uppercase c-font-bold">
                            How we ease your booking
                        </h3>
                        <div class="c-line-center"></div>
                        <p class="c-center c-font-uppercase c-font-17">
                            These are the only steps you need!
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 wow animate fadeInLeft">
                    <div class="c-content-step-1 c-opt-1">
                        <div class="c-icon"><span class="c-hr c-hr-first"><span class="c-content-line-icon c-icon-14 c-theme"></span></span></div>
                        <div class="c-title c-font-20 c-font-bold c-font-uppercase">1. First Important STEP</div>
                        <div class="c-description c-font-17">
                            Join our community.
                            Just click register and you're all done!
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 wow animate fadeInLeft" data-wow-delay="0.2s">
                    <div class="c-content-step-1 c-opt-1">
                        <div class="c-icon"><span class="c-hr"><span class="c-content-line-icon c-icon-21 c-theme"></span></span></div>
                        <div class="c-title c-font-20 c-font-bold c-font-uppercase">2. Second Phase</div>
                        <div class="c-description c-font-17">
                            Pick your car!
                            There are lots of them!
                        </div>
                        <a class="btn c-btn-square c-theme-btn c-btn-uppercase c-btn-bold" href="{{url('/cars')}}">EXPLORE</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 wow animate fadeInLeft" data-wow-delay="0.4s">
                    <div class="c-content-step-1 c-opt-1">
                        <div class="c-icon"><span class="c-hr c-hr-last"><span class="c-content-line-icon c-icon-32 c-theme"></span></span></div>
                        <div class="c-title c-font-20 c-font-bold c-font-uppercase">3. Final Action</div>
                        <div class="c-description c-font-17">
                            Book the car! You just need to provide your starting time and a termination time. That's all!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- END: CONTENT/STEPS/STEPS-1 -->

@endsection