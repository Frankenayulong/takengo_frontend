@extends('layouts.master')

@section('content')
<div>
    <!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full c-centered c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner1.jpg')}}); background-size:cover; background-position:center center">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">@yield('section')</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">@yield('section')</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    
    <div class="c-content-box c-size-md c-bg-grey-1">
        <div class="container">
            <div class="c-layout-sidebar-menu c-theme ">
                <div class="c-sidebar-menu-toggler">
                    <h3 class="c-title c-font-uppercase c-font-bold">My Profile</h3>
                    <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                        <span class="c-line"></span> <span class="c-line"></span> <span class="c-line"></span>
                    </a>
                </div>

                <ul class="c-sidebar-menu collapse " id="sidebar-menu-1">
                    <li class="c-dropdown c-open">
                        <a href="javascript:;" class="c-toggler">My Profile<span class="c-arrow"></span></a>
                        <ul class="c-dropdown-menu">
                            <li class="{{Request::is('profile*') ? 'c-active' : ''}}">
                                <a href="{{url('/profile')}}">My Profile</a>
                            </li>
                            <li class="{{Request::is('history') ? 'c-active' : ''}}">
                                <a href="{{url('/history')}}">Booking History</a>
                            </li>
                        </ul>
                    </li>
                </ul>
			</div>
			<div class="c-layout-sidebar-content ">
                @yield('inner-content')               
			</div>
        </div>
    </div>
</div>
@endsection