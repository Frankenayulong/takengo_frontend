@extends('layouts.master')

@section('content')

    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(../../assets/base/img/content/banner2.png); background-position:center 90%; background-size:cover;">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">FAQ</h3>
                <h4 class="c-font-dark c-font-slim">
                    Page Sub Title Goes Here			</h4>
            </div>
    </div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    </div>
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box c-size-md ">
        <div class="container">
            <div class="cbp-panel">
                <div id="filters-container" class="cbp-l-filters-underline">
                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
                        All
                    </div>
                    <div data-filter=".buying" class="cbp-filter-item">
                        Buying
                    </div>
                    <div data-filter=".author" class="cbp-filter-item">
                        Author
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
                                <i class="fa fa-check-circle-o"></i> Where can I find JANGO?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Aenean justo velit, vulputate a posuere ac, laoreet sed urna. Suspendisse posuere blandit diam condimentum vestibulum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item community">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-life-ring"></i> JANGO Feedback
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Praesent at maximus massa. Vivamus aliquet tincidunt erat et tempus. Sed venenatis ut tortor malesuada condimentum. <br/>Donec rhoncus, dolor id luctus feugiat, justo tortor blandit orci, non ullamcorper velit lectus porta mauris. Mauris imperdiet in mauris cursus pretium. Proin nisi libero, commodo vitae lob.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item buying">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-question"></i> How Do I Get Support From JANGO?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Sed venenatis ut tortor malesuada condimentum. Donec rhoncus, dolor id luctus feugiat, justo tortor blandit orci, non ullamcorper velit lectus porta mauris.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item author">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-credit-card"></i> Which Payment Option Do I Choose?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Aenean justo velit, vulputate a posuere ac, laoreet sed urna. Suspendisse posuere blandit diam condimentum vestibulum.
                                    Aenean justo velit, vulputate a posuere ac, laoreet sed urna. Suspendisse posuere blandit diam condimentum vestibulum.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item copyright">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-copyright"></i> Can I use trademarked names in my items?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Aenean justo velit, vulputate a posuere ac, laoreet sed urna. Suspendisse posuere blandit diam condimentum vestibulum.
                                    Sed venenatis ut tortor malesuada condimentum. Donec rhoncus, dolor id luctus feugiat, justo tortor blandit orci, non ullamcorper velit lectus porta mauris.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item author">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-history"></i> Historical Payment Rates
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Sed venenatis ut tortor malesuada condimentum. Donec rhoncus, dolor id luctus feugiat, justo tortor blandit orci, non ullamcorper velit lectus porta mauris. Sed venenatis ut tortor malesuada condimentum. Donec rhoncus, dolor id luctus feugiat, justo tortor blandit orci, non ullamcorper velit lectus porta mauris.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item account">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-user"></i> How Do I Change My Username?
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Nulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibusNulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibus
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item author">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-columns"></i> Author Collaboration
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Donec blandit, felis eu lobortis accumsan, felis justo hendrerit turpis, at dapibus arcu quam pellentesque quam. Donec ullamcorper nibh eu nunc sagittis fringilla. Integer tortor dui, vulputate eu fermentum congue, egestas id risus. Maecenas congue augue non lectus consequat lacinia.
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
                                    Donec blandit, felis eu lobortis accumsan, felis justo hendrerit turpis, at dapibus arcu quam pellentesque quam. Donec ullamcorper nibh eu nunc sagittis fringilla. Integer tortor dui, vulputate eu fermentum congue, egestas id risus. <br/>Maecenas congue augue non lectus consequat lacinia.
                                    Nulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibusNulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibus
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item author">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-map-marker"></i> An Author’s Introduction to JANGO
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br/>Aenean justo velit, vulputate a posuere ac, laoreet sed urna. Suspendisse posuere blandit diam condimentum vestibulum.
                                    Sed venenatis ut tortor malesuada condimentum. Donec rhoncus, dolor id luctus feugiat, justo tortor blandit orci, non ullamcorper velit lectus porta mauris.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item copyright">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-keyboard-o"></i> How to use the Whois Lookup Tool
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Praesent at maximus massa. Vivamus aliquet tincidunt erat et tempus. Sed venenatis ut tortor malesuada condimentum. <br/>Donec rhoncus, dolor id luctus feugiat, justo tortor blandit orci, non ullamcorper velit lectus porta mauris. Mauris imperdiet in mauris cursus pretium. Proin nisi libero, commodo vitae lob.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item copyright">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-file-excel-o"></i> Illegal Distribution Of Files
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Nulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibusNulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibus. Nulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibusNulla condimentum nunc a euismod sodales.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item copyright">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-exclamation-circle"></i> Protecting Your Copyright
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibusNulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies. Proin porttitor, arcu eu eleifend faucibus, odio nisi faucibus. Nulla condimentum nunc a euismod sodales. Aenean congue risus sed finibus ultricies.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item buying">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-bookmark-o"></i> Guide to YouTube Content ID & Copyright Notices
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Suspendisse venenatis cursus elit quis vestibulum. Duis convallis, eros eleifend fermentum luctus, enim dolor ornare metus, eget iaculis eros nibh. Suspendisse venenatis cursus elit quis vestibulum. Duis convallis, eros eleifend fermentum luctus, enim dolor ornare metus, eget iaculis eros nibh
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbp-item community">
                        <div class="cbp-caption">
                            <div class="cbp-caption-defaultWrap">
                                <i class="fa fa-comments-o"></i> Forum and Community Rules
                            </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-body">
                                    Curabitur posuere accumsan elementum. Duis id porttitor augue. Nulla sagittis ultricies mi, ut rhoncus tellus egestas sit amet. Quisque felis mauris, porta nec mauris sagittis, tincidunt tincidunt elit. Aliquam pharetra faucibus orci, quis sollicitudin lacus fringilla a. Nulla ipsum nibh, eleifend sed condimentum quis, blandit nec mauris.
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
    <script src="{{asset('js/faq-min.js')}}" type="text/javascript"></script>
    <!-- END: PAGE SCRIPTS -->
    @endsection