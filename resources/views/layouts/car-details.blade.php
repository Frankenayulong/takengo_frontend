@extends('layouts.master')

@section('content')

<!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner6.jpg')}}); background-size:cover; background-position:center 70%">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">Our Partners</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">Our Cars</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->


<div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
    <div class="container">
        <div class="c-shop-product-details-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="c-product-gallery">
                        <div class="c-product-gallery-content">
                            <div class="c-zoom">
                                <img src="../../assets/base/img/content/shop8/34.jpg">
                            </div>
                            <div class="c-zoom">
                                <img src="../../assets/base/img/content/shop8/35.jpg">
                            </div>
                            <div class="c-zoom">
                                <img src="../../assets/base/img/content/shop8/37.jpg">
                            </div>
                            <div class="c-zoom">
                                <img src="../../assets/base/img/content/shop8/29.jpg">
                            </div>
                        </div>
                        <div class="row c-product-gallery-thumbnail">
                            <div class="col-xs-3 c-product-thumb">
                                <img src="../../assets/base/img/content/shop/91.jpg">
                            </div>
                            <div class="col-xs-3 c-product-thumb">
                                <img src="../../assets/base/img/content/shop/92.jpg">
                            </div>
                            <div class="col-xs-3 c-product-thumb">
                                <img src="../../assets/base/img/content/shop/02.jpg">
                            </div>
                            <div class="col-xs-3 c-product-thumb c-product-thumb-last">
                                <img src="../../assets/base/img/content/shop/80.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="c-product-meta">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">Warm Winter Jacket</h3>
                            <div class="c-line-left"></div>
                        </div>
                        <div class="c-product-badge">
                            <div class="c-product-sale">Sale</div>
                            <div class="c-product-new">New</div>
                        </div>
                        <div class="c-product-review">
                            <div class="c-product-rating">
                                <i class="fa fa-star c-font-red"></i>
                                <i class="fa fa-star c-font-red"></i>
                                <i class="fa fa-star c-font-red"></i>
                                <i class="fa fa-star c-font-red"></i>
                                <i class="fa fa-star-half-o c-font-red"></i>
                            </div>
                            <div class="c-product-write-review">
                                <a class="c-font-red" href="#">Write a review</a>
                            </div>
                        </div>
                        <div class="c-product-price">$99.00</div>
                        <div class="c-product-short-desc">
                            Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.
                        </div>
                        <div class="row c-product-variant">
                            <div class="col-sm-12 col-xs-12">
                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Size:</p>
                                <div class="c-product-size">
                                    <select>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                <div class="c-product-color">
                                    <p class="c-product-meta-label c-font-uppercase c-font-bold">Color:</p>
                                    <select>
                                        <option value="Red">Red</option>
                                        <option value="Black">Black</option>
                                        <option value="Beige">Beige</option>
                                        <option value="White">White</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="c-product-add-cart c-margin-t-20">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12">
                                    <div class="c-input-group c-spinner">
                                        <p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">QTY:</p>
                                        <input type="text" class="form-control c-item-1" value="1">
                                        <div class="c-input-group-btn-vertical">
                                            <button class="btn btn-default" type="button" data_input="c-item-1"><i class="fa fa-caret-up"></i></button>
                                            <button class="btn btn-default" type="button" data_input="c-item-1"><i class="fa fa-caret-down"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                    <button class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">Add to Cart</button>
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