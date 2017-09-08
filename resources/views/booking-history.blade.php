@extends('layouts.user')
@section('section')
Booking History
@endsection
@section('inner-content')
<div ng-controller="bookingHistoryController">
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Order History</h3>
    </div>
    <div class="row c-margin-b-40 c-order-history-2">
        <div class="row c-cart-table-title">
            <div class="col-md-2 c-cart-image">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Image</h3>
            </div>
            <div class="col-md-1 c-cart-ref">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Order</h3>
            </div>
            <div class="col-md-2 c-cart-desc">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Description</h3>
            </div>
            <div class="col-md-2 c-cart-price">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Price</h3>
            </div>
            <div class="col-md-3 c-cart-total">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Payment Method</h3>
            </div>
            <div class="col-md-2 c-cart-qty">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Date</h3>
            </div>
        </div>
        <!-- BEGIN: ORDER HISTORY ITEM ROW -->
        <div class="row c-cart-table-row">
            <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">Item 1</h2>
            <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                <img src="../../assets/base/img/content/shop3/20.jpg"/>
            </div>
            <div class="col-md-1 col-sm-3 col-xs-6 c-cart-ref">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Order</p>
                <p>#1103</p>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-desc">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Description</p>
                <p><a href="shop-product-details-2.html" class="c-font-bold c-theme-link c-font-dark">Camera</a></p>
            </div>
            <div class="clearfix col-md-2 col-sm-3 col-xs-6 c-cart-price">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Price</p>
                <p class="c-cart-price c-font-bold">$147.00</p>
            </div>		
            <div class="col-md-3 col-sm-3 col-xs-6 c-cart-total">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Payment Method</p>
                <p class="c-cart-price c-font-bold">Credit Cart (MasterCard)</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-qty">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Date</p>
                <p>2 Sep 2015</p>
            </div>
        </div>
        <!-- END: ORDER HISTORY ITEM ROW -->
        <!-- BEGIN: ORDER HISTORY ITEM ROW -->
        <div class="row c-cart-table-row">
            <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title">Item 2</h2>
            <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                <img src="../../assets/base/img/content/shop3/10.jpg"/>
            </div>
            <div class="col-md-1 col-sm-3 col-xs-6 c-cart-ref">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Order</p>
                <p>#1106</p>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-desc">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Description</p>
                <p><a href="shop-product-details-2.html" class="c-font-bold c-theme-link c-font-dark">Winter Hood</a></p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-price">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Price</p>
                <p class="c-cart-price c-font-bold">$99.00</p>
            </div>		
            <div class="col-md-3 col-sm-3 col-xs-6 c-cart-total">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Payment Method</p>
                <p class="c-cart-price c-font-bold">PayPal</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-qty">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Date</p>
                <p>5 Sep 2015</p>
            </div>
        </div>
        <!-- END: ORDER HISTORY ITEM ROW -->
        <!-- BEGIN: ORDER HISTORY ITEM ROW -->
        <div class="row c-cart-table-row">
            <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">Item 3</h2>
            <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                <img src="../../assets/base/img/content/shop3/22.jpg"/>
            </div>
            <div class="col-md-1 col-sm-3 col-xs-6 c-cart-ref">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Order</p>
                <p>#1107</p>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-desc">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Description</p>
                <p><a href="shop-product-details-2.html" class="c-font-bold c-theme-link c-font-dark">Winter Coat</a></p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-price">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Price</p>
                <p class="c-cart-price c-font-bold">$82.00</p>
            </div>		
            <div class="col-md-3 col-sm-3 col-xs-6 c-cart-total">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Payment Method</p>
                <p class="c-cart-price c-font-bold">Credit Cart (MasterCard)</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-qty">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Date</p>
                <p>7 Sep 2015</p>
            </div>
        </div>
        <!-- END: ORDER HISTORY ITEM ROW -->
        <!-- BEGIN: ORDER HISTORY ITEM ROW -->
        <div class="row c-cart-table-row">
            <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">Item 4</h2>
            <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                <img src="../../assets/base/img/content/shop3/21.jpg"/>
            </div>
            <div class="col-md-1 col-sm-3 col-xs-6 c-cart-ref">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Order</p>
                <p>#1123</p>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-desc">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Description</p>
                <p><a href="shop-product-details-2.html" class="c-font-bold c-theme-link c-font-dark">Cotton Top</a></p>
            </div>
            <div class="clearfix col-md-2 col-sm-3 col-xs-6 c-cart-price">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Price</p>
                <p class="c-cart-price c-font-bold">$54.00</p>
            </div>		
            <div class="col-md-3 col-sm-3 col-xs-6 c-cart-total">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Payment Method</p>
                <p class="c-cart-price c-font-bold">PayPal</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-qty">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Date</p>
                <p>8 Sep 2015</p>
            </div>
        </div>
        <!-- END: ORDER HISTORY ITEM ROW -->
        <!-- BEGIN: ORDER HISTORY ITEM ROW -->
        <div class="row c-cart-table-row">
            <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">Item 5</h2>
            <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
                <img src="../../assets/base/img/content/shop3/23.jpg"/>
            </div>
            <div class="col-md-1 col-sm-3 col-xs-6 c-cart-ref">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Order</p>
                <p>#1136</p>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-desc">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Description</p>
                <p><a href="shop-product-details-2.html" class="c-font-bold c-theme-link c-font-dark">Winter Jacket</a></p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-price">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Price</p>
                <p class="c-cart-price c-font-bold">$135.00</p>
            </div>		
            <div class="col-md-3 col-sm-3 col-xs-6 c-cart-total">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Payment Method</p>
                <p class="c-cart-price c-font-bold">Credit Cart (Visa)</p>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6 c-cart-qty">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Date</p>
                <p>10 Sep 2015</p>
            </div>
        </div>
        
    </div>
</div>

@endsection