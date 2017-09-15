@extends('layouts.master')

@section('content')
<div ng-controller="carsDetailController">
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
                            @foreach($car->pictures as $picture)
                                <div class="c-zoom">
                                    <div style="background-image:url('{{config('api.api_url') . 'img/cars/'.$car->cid.'/'.$picture->pic_name}}');width:100%;height:100%;background-size:contain;background-position: center center;background-repeat:no-repeat;"></div>
                                 
                                </div>
                            @endforeach
                        </div>
                        <div class="row c-product-gallery-thumbnail">
                            @foreach($car->pictures as $picture)
                            <div class="col-xs-3 c-product-thumb" style="width:120px">
                                <img src="{{config('api.api_url') . 'img/cars/'.$car->cid.'/'.$picture->pic_name}}">
                            </div>
                            @endforeach
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
                                        <button id="book-now" ng-click="book('{{url('/cars/book')}}/' + {{$car->cid}} + '?lat=' + ((metadata.current_location || {}).latitude) + '&amp;long=' + ((metadata.current_location || {}).longitude) )" class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- END: CONTENT/SHOPS/SHOP-PRODUCT-DETAILS-2 -->

    <div class="c-content-box c-size-lg c-overflow-hide c-bg-grey" style="padding:0">
        <div class="row" ng-if="metadata.current_location != null">
            <ng-map
            pan-control="false"
            map-type-control="false"
            zoom-control="false"
            scale-control="false"
            street-view-control="false"
            id="cars-collection-map" center="@{{metadata.current_location.latitude}}, @{{metadata.current_location.longitude}}" zoom="13" min-zoom="13" max-zoom="13" scrollwheel="false">
                <marker position="[@{{metadata.current_location.latitude}}, @{{metadata.current_location.longitude}}]"
                    animation="Animation.BOUNCE" centered="true" title="You Are Here">
                </marker>
                @if(count($car->last_location) > 0)
                <marker 
                    position="[{{$car->last_location[0]->lat}}, {{$car->last_location[0]->long}}]" 
                    title="{{$car->name}}"
                    animation="Animation.DROP"
                    icon="{
                        path: 'M45.961,18.702c-0.033-0.038-0.061-0.075-0.1-0.112l-1.717-1.657c1.424-0.323,2.957-1.516,2.957-2.74c0-1.426-1.979-1.932-3.668-1.932c-1.766,0-1.971,1.21-1.992,2.065l-4.43-4.271c-0.9-0.891-2.607-1.592-3.883-1.592H24.5h-0.002h-8.63c-1.275,0-2.981,0.701-3.882,1.592l-4.429,4.271c-0.023-0.855-0.228-2.065-1.992-2.065c-1.691,0-3.669,0.506-3.669,1.932c0,1.224,1.534,2.417,2.958,2.74l-1.717,1.657c-0.039,0.037-0.066,0.074-0.1,0.112C1.2,20.272,0,23.184,0,25.297v6.279c0,1.524,0.601,2.907,1.572,3.938v2.435c0,1.424,1.192,2.585,2.658,2.585h3.214c1.466,0,2.657-1.159,2.657-2.585v-0.623h14.397H24.5h14.396v0.623c0,1.426,1.19,2.585,2.658,2.585h3.213c1.467,0,2.657-1.161,2.657-2.585v-2.435c0.972-1.031,1.572-2.414,1.572-3.938v-6.279C48.998,23.184,47.798,20.272,45.961,18.702z M13.613,11.953c0.623-0.519,1.712-0.913,2.255-0.913h8.63H24.5h8.63c0.543,0,1.632,0.394,2.255,0.913l5.809,5.63H24.5h-0.002H7.805L13.613,11.953z M1.993,24.347c0-1.546,1.21-2.801,2.704-2.801c1.493,0,6.372,2.864,6.372,4.41s-4.879,1.188-6.372,1.188C3.203,27.144,1.993,25.894,1.993,24.347z M10.102,34.573H9.587H9.072l-3.055,0.005c-0.848-0.264-1.446-0.572-1.869-0.903c-0.214-0.167-0.378-0.341-0.506-0.514c-0.129-0.175-0.223-0.347-0.284-0.519c-0.38-1.074,0.405-2.061,0.405-2.061h5.214l3.476,3.99L10.102,34.573L10.102,34.573z M31.996,34.575H24.5h-0.002h-7.496c-1.563,0-2.832-1.269-2.832-2.831h10.328H24.5h10.328C34.828,33.308,33.559,34.575,31.996,34.575z M32.654,29.812H24.5h-0.002h-8.154c-1.7,0-3.08-2.096-3.08-4.681h11.234H24.5h11.234C35.734,27.717,34.354,29.812,32.654,29.812z M45.641,32.644c-0.062,0.172-0.156,0.344-0.285,0.518c-0.127,0.173-0.291,0.347-0.506,0.514c-0.422,0.331-1.021,0.641-1.869,0.903l-3.055-0.005h-0.515h-0.515h-2.353l3.478-3.99h5.213C45.234,30.583,46.02,31.568,45.641,32.644z M44.301,27.144c-1.492,0-6.371,0.356-6.371-1.188s4.879-4.41,6.371-4.41c1.494,0,2.704,1.255,2.704,2.801C47.005,25.892,45.795,27.144,44.301,27.144z',
                        fillColor: 'black',
                        fillOpacity: 0.8,
                        scale: 1,
                        strokeColor: 'black',
                        strokeWeight: 1
                    }">
                </marker>
                @endif
            </ng-map>
        </div>
    </div>
</div>
@endsection