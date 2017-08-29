@extends('layouts.master')

@section('content')

<div ng-controller="carsCollectionController as vm">
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
            @component('components.pages.car-collections.query')
            @endcomponent
            
            @component('components.pages.car-collections.map')
            @endcomponent
            <div class="row c-center" style="margin-top:30px" ng-show="carsCollectionCtrl.loading.retrieve">
                @component('components.shared.spinner')
                    big
                @endcomponent
            </div>
            <div class="row c-center" style="margin-top:30px" ng-if="!carsCollectionCtrl.loading.retrieve && (carsCollectionCtrl.error.retrieve || cars.length == 0)">
                <img src="{{asset('assets/system_images/empty_collection.png')}}"/>
            </div>
            <!-- Car collections -->
            @component('components.pages.car-collections.list')
            @endcomponent
            <!-- Pagination -->
            @component('components.pages.car-collections.pagination')
            @endcomponent

        </div>
    </div><!-- END: CONTENT/SHOPS/SHOP-2-1 -->
</div>
@endsection
