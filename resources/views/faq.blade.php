@extends('layouts.master')

@section('content')

<!-- START BREADCRUMBS -->
<div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/backgrounds/bg-12.jpg')}}); background-position:center 70%">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">FAQ</h2>
            <h4 class="c-font-white c-font-thin c-opacity-09">Frequently Asked Questions</h4>
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
            <li class="c-font-white">/</li>
            <li class="c-state_active c-font-white">FAQ</li>
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->

    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box c-size-md ">
        <div class="container">
            <div class="cbp-panel">
                <div id="filters-container" class="cbp-l-filters-underline">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                        All
                    </div>
                    <div data-filter=".buying" class="cbp-filter-item">
                        Cars
                    </div>
                    <div data-filter=".author" class="cbp-filter-item">
                        Booking
                    </div>
                    <div data-filter=".account" class="cbp-filter-item">
                        Account
                    </div>
                    <div data-filter=".copyright" class="cbp-filter-item">
                        Copyright
                    </div>
                    <div data-filter=".community" class="cbp-filter-item">
                        Community
                    </div>
                </div>

                <div id="grid-container" class="cbp cbp-l-grid-faq">
                    <div class="cbp-item buying">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-check-circle-o"></i> Where can I find TAKE N GO?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    We're located at 119 Swanston St in Melbourne CBD<br/>Come by to see our work life. Anyone is welcome!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item community">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-life-ring"></i> Take N Go Feedback
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    You can email us about your feedback and we'll might have something sweet for you!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item buying">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-question"></i> What if I get a faulty car?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Just contact us! We'll make sure the car is fixed later on and we'll give your money back!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item author">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-credit-card"></i> How do I book a car?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Just book by selecting your preferred car.<br/>Provide a starting time and a termination time.
                                    You can extend your renting period in your dashboard.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item copyright">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-copyright"></i> Can I use Take N Go for my work?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    We are happy if you mention us!<br/>Just make sure you refer us, not anybody else!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item author">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-history"></i> Price Rates
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    We provide the cheapest rates available. If you found a cheaper one, tell us and we update our price!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item account">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-user"></i> How Do I Change My Email?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    You can change your email in your profile page
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item author">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-columns"></i> Business Collaboration
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    If you're a business and want to make a deal with us, just give us a call! We are working with thousands of businesses to create immensely great service!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item account">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-unlock-alt"></i> How Do I Change My Password?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                You can change your password in your profile page
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
@endsection

@section('script')
    <!-- BEGIN: PAGE SCRIPTS -->
    <script src="{{asset('js/faq.js')}}" type="text/javascript"></script>
    <!-- END: PAGE SCRIPTS -->
@endsection