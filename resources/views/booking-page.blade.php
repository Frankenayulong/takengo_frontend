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
            <div class="row" style="margin-left:0;margin-right:0;">
                <div class="col-md-12">	
                    <form ng-controller="profileEditController" class="c-shop-form-1" ng-submit="save_profile()">
                        <div class="row">
                            <div class="row">
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="caleran-header">Booking for @{{book_form.book_start_date}} - @{{book_form.book_end_date}}</label>
                                    <br/>
                                    {!! Form::text('book_date', null,
                                        ['class'=>'form-control c-square c-theme',
                                            'placeholder'=>'Booking Date',
                                            'id' => 'caleran-header']) !!}
                                    <span ng-if="book_error.book_date" class="help-block c-font-red">
                                        <strong ng-repeat="item in book_error.message.book_date | limitTo:1">@{{item}}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row c-right">
                                <div class="form-group c-margin-t-40">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Reset</button>
                                        {!! Form::submit('Submit', ['class' => 'btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		
        </div>
    </div>
</div>
@endsection