<div class="row" style="margin-top:30px" ng-show="!carsCollectionCtrl.loading.retrieve && !carsCollectionCtrl.error.retrieve && cars.length > 0">
    <div class="col-md-3 col-sm-6 c-margin-b-20" ng-repeat="item in cars">
        <div class="c-content-product-2 c-bg-white">
            <div class="c-content-overlay">
                <div class="c-label c-label-left c-font-uppercase c-font-white c-font-13 c-font-bold" ng-class="item.transition_mode == 'AUTO' ? 'c-bg-green' : 'c-bg-red'">@{{item.transition_mode == 'AUTO' ? 'A/T' : 'M/T'}}</div>
                <div class="c-label c-label-right c-bg-blue c-font-uppercase c-font-white c-font-13 c-font-bold" ng-if="item.distance === 0 || item.distance">@{{(item.distance || 0) / 1000 | number : 2}} km away</div>
                <div class="c-bg-img-center c-overlay-object" data-height="height" style="height: 270px; background-image: url(@{{carsCollectionCtrl.api_url + 'img/cars/' + item.cid}});"></div>
            </div>
            <div class="c-info">
                <p class="c-title c-font-18 c-font-slim">@{{item.name}}</p>
                <p class="c-price c-font-16 c-font-slim"><span class="c-font-bold">$@{{item.price}}</span> / day
                </p>
            </div>
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group c-border-right c-border-top" role="group">
                    <a href="javascript:;" ng-click="book('{{url('/cars/book')}}/' + item.cid + '?lat=' + ((metadata.current_location || {}).latitude) + '&amp;long=' + ((metadata.current_location || {}).longitude) )" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Book Now</a>
                </div>
                <div class="btn-group c-border-left c-border-top" role="group">
                    <a href="{{url('/cars')}}/@{{item.cid}}?lat=@{{(metadata.current_location || {}).latitude}}&amp;long=@{{(metadata.current_location || {}).longitude}}" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-green-2-hover c-btn-product">Details</a>
                </div>
            </div>
        </div>
    </div>
</div>