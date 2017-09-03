@extends('layouts.master')

@section('content')

<!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner5.jpg')}}); background-size:cover; background-position:center 70%">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">Car Details</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li><a href="{{url('/cars')}}" class="c-font-white">Our Cars</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state-active c-font-white">{{$car->name}}</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
<div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
    <div class="container">
        <div class="c-shop-product-details-2">
            <div class="row">
                <div class="col-lg-6">
                @if(count($car->pictures) <= 0)
                    <div class="c-product-gallery">
                        <div class="c-product-gallery-content" style="height:500px;">
                            <img src="{{config('api.api_url') . 'img/cars/'.$car->cid.'/noimage.png'}}"/>
                        </div>
                    </div>
                @else
                <div class="c-product-gallery">
                    <div class="c-product-gallery-content" style="height:500px;">
                        <div class="c-zoom">
                            <img style="background:#FFFFFF" src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                        <div class="c-zoom">
                            <img src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                        <div class="c-zoom">
                            <img src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                        <div class="c-zoom">
                            <img src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                    </div>
                    <div class="row c-product-gallery-thumbnail">
                        <div class="col-xs-3 c-product-thumb" style="width:120px">
                            <img src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                        <div class="col-xs-3 c-product-thumb" style="width:120px">
                            <img src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                        <div class="col-xs-3 c-product-thumb" style="width:120px">
                            <img src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                        <div class="col-xs-3 c-product-thumb c-product-thumb-last" style="width:120px">
                            <img src="{{asset('assets/base/img/content/testCar.png')}}">
                        </div>
                    </div>
                </div>
                @endif
                
                    
                </div>
                <div class="col-lg-6">
                    <div class="c-product-meta">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">{{$car->name}}</h3>
                            <div class="c-line-left"></div>
                        </div>
                        <div class="c-product-badge">
                            <div class="c-product-sale">{{$car->transition_mode == 'AUTO' ? 'A/T' : 'M/T'}}</div>
                            @if(property_exists($car, 'distance'))
                            <div class="c-product-new">{{number_format($car->distance / 1000, 2)}} km away</div>
                            @endif
                        </div>
                        <br/><br/><br/><br/>
                        <div class="c-product-price">${{$car->price}} / day</div>
                        <div class="row c-product-variant">
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Car Type</p>
                                <p style="margin:0">{{$car->car_types}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Release Year</p>
                                <p style="margin:0">{{$car->release_year}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Transition Mode</p>
                                <p style="margin:0">{{$car->transition_mode == 'AUTO' ? 'Automatic' : 'Manual'}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Capacity</p>
                                <p style="margin:0">{{$car->capacity}} person{{$car->capacity > 1 ? 's' : ''}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Doors</p>
                                <p style="margin:0">{{$car->doors}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Large Bags</p>
                                <p style="margin:0">{{$car->large_bags}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Small Bags</p>
                                <p style="margin:0">{{$car->small_bags}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Air Conditioned</p>
                                <p style="margin:0">{{$car->air_conditioned ? 'YES' : 'NO'}}</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Mileage</p>
                                <p style="margin:0">{{$car->limit_mileage}} km</p>
                            </div>
                            <div class="col-md-6 col-xs-12" style="margin-bottom:8px;">
                                <p style="margin:0" class="c-font-uppercase c-font-bold">Fuel Policy</p>
                                <p style="margin:0">{{$car->fuel_policy}}</p>
                            </div>
                        </div>
                        <div class="c-product-add-cart c-margin-t-20">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                    <button class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- END: CONTENT/SHOPS/SHOP-PRODUCT-DETAILS-2 -->
@endsection