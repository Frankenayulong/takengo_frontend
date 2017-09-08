@extends('layouts.user')
@section('section')
Booking History
@endsection
@section('inner-content')
<div ng-controller="bookingHistoryController">
    <div class="row c-margin-b-40 c-order-history-2">
        <div class="row c-cart-table-title">
            <div class="col-md-2 c-cart-image">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Image</h3>
            </div>
            <div class="col-md-2 c-cart-ref">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Car Name</h3>
            </div>
            <div class="col-md-2 c-cart-desc">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Price</h3>
            </div>
            <div class="col-md-2 c-cart-price">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Start Date</h3>
            </div>
            <div class="col-md-2 c-cart-total">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">End Date</h3>
            </div>
            <div class="col-md-2 c-cart-qty c-center">
                <h3 class="c-font-uppercase c-font-bold c-font-16 c-font-grey-2">Status</h3>
            </div>
        </div>
        <!-- BEGIN: ORDER HISTORY ITEM ROW -->
        @if(count($history) <= 0)
        <div class="row">
            <h3>You haven't booked anything!</h3>
        </div>
        @endif
        @foreach($history as $item)
        <div class="row c-cart-table-row">
            <h2 class="c-font-uppercase c-font-bold c-theme-bg c-font-white c-cart-item-title c-cart-item-first">#1</h2>
            <div class="col-md-2 col-sm-6 col-xs-5 c-cart-image">
                <img src="{{config('api.api_url') . 'img/cars/'.$item->car->cid}}"/>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-ref">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Car Name</p>
                <p>{{$item->car->name}}</p>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-desc">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Price</p>
                <p class="c-cart-price c-font-bold">${{$item->days * $item->car->price}}</p>
            </div>
            <div class="clearfix col-md-2 col-sm-3 col-xs-6 c-cart-price">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Start Date</p>
                <p>{{\Carbon\Carbon::parse($item->start_date)->format('d M Y')}}</p>
            </div>		
            <div class="col-md-2 col-sm-6 col-xs-6 c-cart-total">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">End Date</p>
                <p>{{\Carbon\Carbon::parse($item->end_date)->format('d M Y')}}</p>
            </div>
            <div class="col-md-2 col-sm-12 col-xs-6 c-cart-qty c-center">
                <p class="c-cart-sub-title c-theme-font c-font-uppercase c-font-bold">Status</p>
                @if($item->transactions_count > 0)
                <p class="c-font-green c-font-sbold">Completed</p>
                @else
                <a href="javascript:;" class="btn c-btn-blue c-btn-square">Pay</a>
                <br/>
                <a href="javascript:;" class="btn c-font-red btn-link">Cancel</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ul class="c-content-pagination c-square c-theme pull-right">
                @if($prev_page !== null)
                <li class="c-prev"><a href="{{Request::url()}}?page={{$prev_page}}"><i class="fa fa-angle-left"></i></a></li>
                @endif
                @for($i = 1; $i <= $last_page; $i++)
                <li class="{{$i == $current_page ? 'c-active' : ''}}"><a href="{{Request::url()}}?page={{$i}}">{{$i}}</a></li>
                @endfor
                @if($next_page !== null)
                <li class="c-next"><a href="{{Request::url()}}?page={{$next_page}}"><i class="fa fa-angle-right"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection