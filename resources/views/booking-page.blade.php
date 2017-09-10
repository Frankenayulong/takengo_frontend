@extends('layouts.master')

@section('content')
<div ng-controller="carsBookingController" ng-init="book_other.price_per_day = {{$car->price}};book_other.disabled = {{json_encode($bookings)}}">
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
        <div class="container c-shop-product-details-2">
            <div class="row" style="margin-left:0;margin-right:0;">
                <div class="col-lg-5 c-margin-b-40" style="margin-right:10px;">	
                    <form ng-hide="book_metadata.loading.booking" class="c-shop-form-1" ng-submit="save_booking()">
                        <div class="row">
                            <div class="row">
                                <input type="hidden" value="{{$car->cid}}" ng-init="book_form.cid = {{$car->cid}}" ng-model="book_form.cid"/>
                                <input type="hidden" value="{{$user->uid}}" ng-init="book_form.uid = {{$user->uid}}" ng-model="book_form.uid"/>
                                <div class="form-group col-sm-12 col-lg-12">
                                    <label ng-if="book_form.book_start_date != null && book_form.book_end_date != null" for="caleran-header">Booking for @{{book_form.book_start_date.format('DD MMMM YYYY')}} - @{{book_form.book_end_date.format('DD MMMM YYYY')}}</label>
                                    <label ng-if="book_form.book_start_date == null || book_form.book_end_date == null" for="caleran-header">Select a booking date</label>
                                    <br/>
                                    {!! Form::text('book_date', null,
                                        ['class'=>'form-control c-square c-theme',
                                            'placeholder'=>'Start Date',
                                            'id' => 'caleran-header']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-lg-12">
                                    {!! Form::text('end_date', null,
                                        ['class'=>'form-control c-square c-theme',
                                            'placeholder'=>'End Date',
                                            'id' => 'caleran-end']) !!}
                                    <span ng-if="book_error.book_date" class="help-block c-font-red">
                                        <strong ng-repeat="item in book_error.message.book_date | limitTo:1">@{{item}}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                  <div class="form-group">
                                        <div class="col-sm-12">
                                            <table>
                                                <tr>
                                                    <td class="c-font-sbold">Total Days</td>
                                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                    <td>&nbsp;&nbsp;@{{book_other.totalDays}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="c-font-sbold">Total Price</td>
                                                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                                                    <td>&nbsp;&nbsp;$@{{ book_other.price_per_day * book_other.totalDays | number:2 }}</td>
                                                </tr>
                                            </table>  
                                        </div>
                                  </div>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="row c-left">
                                <div class="form-group c-margin-t-40">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Reset</button>
                                        {!! Form::submit('Submit', ['class' => 'btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold', 'ng-disabled' => '!book_error.valid || !book_form.book_start_date || !book_form.book_end_date']) !!}
                                        <p ng-if="book_metadata.error" class="c-font-red c-font-10">Whoops! Something went wrong</p>
                                        <p ng-if="!book_error.valid" class="c-font-red c-font-10">Someone has booked for that date</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row c-center" style="margin-top:30px" ng-show="book_metadata.loading.booking">
                        @component('components.shared.spinner')
                            big
                        @endcomponent
                    </div>
                </div>

                <div class="col-lg-6" style="padding-left:0">
                    <div class="c-product-meta">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">{{$car->name}}</h3>
                            <div class="c-line-left"></div>
                        </div>
                        <div class="c-product-badge">
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
                    </div>
            </div>
		
        </div>
    </div>
</div>
@endsection