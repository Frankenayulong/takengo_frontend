<header ng-controller="headerController" class="c-layout-header c-layout-header-7 c-layout-header-dark-mobile c-header-transparent-dark" data-minimize-offset="80">
    <div class="c-navbar">
		<div class="container">
			<div class="c-navbar-wrapper clearfix">
				<div class="c-brand c-pull-left">
					<a href="{{url('/')}}" class="c-logo">
						<img src="{{asset('assets/base/img/layout/logos/logo.png')}}" alt="Take N Go Logo" class="c-desktop-logo" style="height:40px; width:90px; margin-top:-10px">
						<img src="{{asset('assets/base/img/layout/logos/logo.png')}}" alt="Take N Go Logo" class="c-desktop-logo-inverse" style="height:40px; width:90px; margin-top:-10px">
						<img src="{{asset('assets/base/img/layout/logos/logo.png')}}" alt="Take N Go Logo" class="c-mobile-logo" style="height:40px; width:90px; margin-top:-10px">
					</a>
					<button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
					<span class="c-line"></span>
					<span class="c-line"></span>
					<span class="c-line"></span>
					</button>
					<button class="c-topbar-toggler" type="button">
						<i class="fa fa-ellipsis-v"></i>
					</button>
					<!-- <button class="c-cart-toggler" type="button" ng-if="metadata.signed_in && !metadata.signing">
						<i class="icon-handbag"></i> <span class="c-cart-number c-theme-bg">2</span>
					</button> -->
				</div>
                <nav class="c-mega-menu c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-sbold">
                    <ul class="nav navbar-nav c-theme-nav"> 
                        <li class="c-active">
                            <a href="{{url('/')}}" class="c-link">Home</a>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="{{url('/cars')}}" class="c-link">Our Cars</a>
                        </li>
                        <li>
                            <a href="{{url('/how-it-works')}}" class="c-link">How it Works</a>
                        </li>
                        <li >
                            <a href="{{url('/contact-us')}}" class="c-link">Contact Us</a>
                        </li>
                        
                        <!-- <li class="c-cart-toggler-wrapper" ng-if="metadata.signed_in && !metadata.signing">
                            <a href="#" class="c-btn-icon c-cart-toggler"><i class="icon-notebook c-cart-icon"></i> <span class="c-cart-number c-theme-bg">1</span></a>
                        </li> -->

                        <li ng-if="metadata.signed_in && !metadata.signing" class="c-menu-type-classic">
                            <a href="javascript:;" class="c-link dropdown-toggle">
                            @{{metadata.auth.first_name || 'My Profile'}}
                            <span class="c-arrow c-toggler"></span></a>
                            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                <li class="dropdown-submenu">
                                    <a href="{{url('/profile')}}">My Profile</a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="{{url('/history')}}">Booking History</a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="javascript:;" ng-click="authenticate.sign_out()">Logout</a>
                                </li>           
                            </ul>
                        </li>
                         <li ng-if="!metadata.signed_in && !metadata.signing">
                            <a href="javascript:;" data-toggle="modal" data-target="#login-form" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-white c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Sign In</a>
                        </li> 
                        <li ng-if="metadata.signing">
                            <a class="c-link">
                            Please Wait...
                            </a>
                        </li>
                    </ul>
                </nav>	
            </div>			

            <!-- BEGIN CART -->
            <!-- @component('components.shared.cart')
            @endcomponent -->
            <!-- END CART -->

		</div>
	</div>
</header>
