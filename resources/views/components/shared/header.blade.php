<header ng-controller="headerController" class="c-layout-header c-layout-header-7 c-layout-header-dark-mobile c-header-transparent-dark" data-minimize-offset="80">
    <div class="c-navbar">
		<div class="container">
			<div class="c-navbar-wrapper clearfix">
				<div class="c-brand c-pull-left">
					<a href="index.html" class="c-logo">
						<img src="../../assets/base/img/layout/logos/takengo.png" alt="JANGO" class="c-desktop-logo">
						<img src="../../assets/base/img/layout/logos/takengo.png" alt="JANGO" class="c-desktop-logo-inverse">
						<img src="../../assets/base/img/layout/logos/takengo.png" alt="JANGO" class="c-mobile-logo">
					</a>
					<button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
					<span class="c-line"></span>
					<span class="c-line"></span>
					<span class="c-line"></span>
					</button>
					<button class="c-topbar-toggler" type="button">
						<i class="fa fa-ellipsis-v"></i>
					</button>
					<button class="c-cart-toggler" type="button">
						<i class="icon-handbag"></i> <span class="c-cart-number c-theme-bg">2</span>
					</button>
				</div>
                <nav class="c-mega-menu c-mega-menu-mobile c-fonts-uppercase c-fonts-sbold">
                    <ul class="nav navbar-nav c-theme-nav"> 
                        <li class="c-active">
                            <a href="javascript:;" class="c-link dropdown-toggle">Home</a>
                        </li>
                        <li class="c-menu-type-classic">
                            <a href="javascript:;" class="c-link dropdown-toggle">Our Cars<span class="c-arrow c-toggler"></span></a>
                            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                <li class="dropdown-submenu">
                                    <a href="javascript:;">Brands</a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#">Collections</a>
                                </li>           
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="c-link dropdown-toggle">How it Works</a>					
                        </li>
                        <li >
                            <a href="javascript:;" class="c-link dropdown-toggle">Contact Us</a>				
                        </li>
                        
                        <li class="c-cart-toggler-wrapper">
                            <a href="#" class="c-btn-icon c-cart-toggler"><i class="icon-notebook c-cart-icon"></i> <span class="c-cart-number c-theme-bg">1</span></a>
                        </li>

                        <li ng-if="metadata.signed_in" class="c-menu-type-classic">
                            <a href="javascript:;" class="c-link dropdown-toggle">
                            My Profile
                            <span class="c-arrow c-toggler"></span></a>
                            <ul class="dropdown-menu c-menu-type-classic c-pull-left">
                                <li class="dropdown-submenu">
                                    <a href="javascript:;">Dashboard</a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="javascript:;" ng-click="signout()">Logout</a>
                                </li>           
                            </ul>
                        </li>
                         <li ng-if="!metadata.signed_in">
                            <a href="javascript:;" data-toggle="modal" data-target="#login-form" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-white c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Sign In</a>
                        </li> 
                    </ul>
                </nav>	
            </div>			

            <!-- BEGIN CART -->
            @component('components.shared.cart')
            @endcomponent
            <!-- END CART -->

		</div>
	</div>
</header>
