@extends('layouts.master')

@section('content')

<div ng-controller="carsCollectionController">
    <!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner2.jpg')}}); background-size:cover; background-position:center center">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">Our Cars</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">Our Cars</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="c-shop-filter-search-1 list-unstyled">
                        <li>
                            <label class="control-label c-font-uppercase c-font-bold">Car Types</label>
                            <select class="form-control c-square c-theme">
                                <option value="0">All Car Types</option>
                                <option value="1">Sedan</option>
                                <option value="2">Hatchback</option>
                                <option value="3">SUV</option>
                                <option value="4">Coach</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="c-shop-filter-search-1 list-unstyled">
                        <li>
                            <label class="control-label c-font-uppercase c-font-bold">Price Range</label>
                            <select class="form-control c-square c-theme">
                                <option value="0">All Price</option>
                                <option value="1">< AUD 50</option>
                                <option value="2">AUD 51 - 100</option>
                                <option value="3">AUD 101 - 300</option>
                                <option value="4">> AUD 300</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="c-shop-filter-search-1 list-unstyled">
                        <li>
                            <label class="control-label c-font-uppercase c-font-bold">Sort By</label>
                            <select class="form-control c-square c-theme">
                                <option value="0">Default</option>
                                <option value="1">Name (A - Z)</option>
                                <option value="2">Name (Z - A)</option>
                                <option value="3">Price (Low > High)</option>
                                <option value="4">Price (High > Low)</option>
                                <option value="5">Model (A - Z)</option>
                                <option value="6">Model (Z - A)</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" role="group">
                        <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"><i class="fa fa-search"></i>Search</button>
                        <button type="submit" class="btn btn-lg btn-default c-btn-square c-btn-uppercase c-btn-bold">Clear</button>
                    </div>
                </div>
            </div>
            <div class="row c-center" style="margin-top:30px" ng-show="carsCollectionCtrl.loading.retrieve">
                @component('components.shared.spinner')
                    big
                @endcomponent
            </div>
            <div class="row c-center" style="margin-top:30px" ng-if="!carsCollectionCtrl.loading.retrieve && (carsCollectionCtrl.error.retrieve || cars.length == 0)">
                <img src="{{asset('assets/system_images/empty_collection.png')}}"/>
            </div>
            <!-- Car collections -->
            <div class="row" style="margin-top:30px" ng-show="!carsCollectionCtrl.loading.retrieve && !carsCollectionCtrl.error.retrieve && cars.length > 0">
                <div class="col-md-3 col-sm-6 c-margin-b-20" ng-repeat="item in cars">
                    <div class="c-content-product-2 c-bg-white">
                        <div class="c-content-overlay">
                            <div class="c-label c-label-left c-font-uppercase c-font-white c-font-13 c-font-bold" ng-class="item.transition_mode == 'AUTO' ? 'c-bg-green' : 'c-bg-red'">@{{item.transition_mode == 'AUTO' ? 'A/T' : 'M/T'}}</div>
                            <div class="c-label c-label-right c-bg-blue c-font-uppercase c-font-white c-font-13 c-font-bold" ng-if="item.distance">@{{(item.distance || 0) / 1000 | number : 2}} km away</div>
                            <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(@{{carsCollectionCtrl.api_url + 'img/cars/' + item.cid}});"></div>
                        </div>
                        <div class="c-info">
                            <p class="c-title c-font-18 c-font-slim">@{{item.name}}</p>
                            <p class="c-price c-font-16 c-font-slim">$@{{item.price}}
                            </p>
                        </div>
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group c-border-top" role="group">
                                <a href="shop-product-wishlist.html" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="row">
                <ul class="c-content-pagination c-square c-theme pull-right">
                    <li class="c-prev" ng-show="carsCollectionCtrl.pagination.prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li ng-class="carsCollectionCtrl.current_page == ($index + 1) ? 'c-active' : ''"><a href="javascript:;" ng-click="changePage($index+1)" ng-repeat="item in range(carsCollectionCtrl.last_page) track by $index">@{{$index + 1}}</a></li>
                    <li class="c-next" ng-show="carsCollectionCtrl.pagination.next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div><!-- END: CONTENT/SHOPS/SHOP-2-1 -->
</div>
@endsection