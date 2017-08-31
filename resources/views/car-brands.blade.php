@extends('layouts.master')

@section('content')

    <!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner6.jpg')}}); background-size:cover; background-position:center 70%">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">Our Partners</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">Our Cars</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="c-content-box c-size-md">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="{{asset('assets/base/img/content/banner6.jpg')}}"/>
                </div>
            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->

@endsection

@section('script')
    <!-- BEGIN: PAGE SCRIPTS -->
    <script src="{{asset('js/faq-min.js')}}" type="text/javascript"></script>
    <!-- END: PAGE SCRIPTS -->
@endsection