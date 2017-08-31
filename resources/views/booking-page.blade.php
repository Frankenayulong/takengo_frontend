@extends('layouts.master')

@section('content')
<div ng-controller="carsBookingController">
    <!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full c-centered c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner1.jpg')}}); background-size:cover; background-position:center center">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">Book a car</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">Book a car</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            
        </div>
    </div>
</div>
@endsection