<div class="row">
    <ul class="c-content-pagination c-square c-theme pull-right">
        <li class="c-prev" ng-show="carsCollectionCtrl.pagination.prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
        <li ng-class="carsCollectionCtrl.current_page == ($index + 1) ? 'c-active' : ''"><a href="javascript:;" ng-click="changePage($index+1)" ng-repeat="item in range(carsCollectionCtrl.last_page) track by $index">@{{$index + 1}}</a></li>
        <li class="c-next" ng-show="carsCollectionCtrl.pagination.next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
    </ul>
</div>