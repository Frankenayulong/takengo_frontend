@extends('layouts.master')

@section('content')

@component('components.pages.home.banner')
@endcomponent

<!-- BEGIN: CONTENT/FEATURES/FEATURES-8 -->
<div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<div class="c-content-feature-10">
			<!-- Begin: Title 1 component -->
			<div class="c-content-title-1">
				<h3 class="c-font-uppercase c-center c-font-bold">Main Features</h3>
				<div class="c-line-center c-theme-bg"></div>
				<p class="c-font-center">Get a car in your pocket</p>
			</div>
			<!-- End-->
			<ul class="c-list">
				<li>
					<div class="c-card c-font-right wow animate fadeInLeft">
						<i class="icon-trophy c-font-27 c-theme-font c-float-right c-border c-border-opacity"></i>
						<div class="c-content c-content-right">
							<h3 class="c-font-uppercase c-font-bold">Fast Booking</h3>
							<p>
								Just book for a car and that's it! No hassle dazzle!
							</p>
						</div>
					</div>	
					<div class="c-border-bottom c-bg-opacity-2"></div>
				</li>
				<div class="c-border-middle c-bg-opacity-2"></div>
				<li>
					<div class="c-card wow animate fadeInRight">
						<i class="icon-rocket c-font-27 c-theme-font c-float-left c-border c-border-opacity"></i>
						<div class="c-content c-content-left">
							<h3 class="c-font-uppercase c-font-bold">Competitive Price</h3>					
							<p>
								We research for the lowest price everyday and go lower than that
							</p>
						</div>
					</div>	
					<div class="c-border-bottom c-bg-opacity-2"></div>
				</li>
			</ul>
			<ul class="c-list">
				<li>
					<div class="c-card c-font-right wow animate fadeInLeft">
						<i class="icon-layers c-font-27 c-theme-font c-float-right c-border c-border-opacity"></i>
						<div class="c-content c-content-right">
							<h3 class="c-font-uppercase c-font-bold">Quality is our Interest</h3>
							<p>
								We make sure that our car is comfortable enough for you
							</p>
						</div>
					</div>	
					<div class="c-border-bottom c-bg-opacity-2"></div>
				</li>
				<div class="c-border-middle c-bg-opacity-2"></div>
				<li class="c-border-grey-1-5">
					<div class="c-card wow animate fadeInRight">
						<i class="icon-present c-font-27 c-theme-font c-float-left c-border c-border-opacity"></i>
						<div class="c-content c-content-left">
							<h3 class="c-font-uppercase c-font-bold">Best Dealership across the world</h3>					
							<p>
								We are a global service running across the world. Be a part of us!
							</p>
						</div>
					</div>	
					<div class="c-border-bottom c-bg-opacity-2"></div>
				</li>
			</ul>
			<ul class="c-list">
				<li>
					<div class="c-card c-font-right wow animate fadeInLeft">
						<i class="icon-book-open c-font-27 c-theme-font c-float-right c-border c-border-opacity"></i>
						<div class="c-content c-content-right">
							<h3 class="c-font-uppercase c-font-bold">Unique Cars</h3>
							<p>
								If you want something out of the shelf, just contact us and get the best deal in an instance!
							</p>
						</div>
					</div>	
					<div class="c-border-bottom c-bg-opacity-2 c-mobile"></div>
				</li>
				<div class="c-border-middle c-bg-opacity-2"></div>
				<li>
					<div class="c-card wow animate fadeInRight">
						<i class="icon-support c-font-27 c-theme-font c-float-left c-border c-border-opacity"></i>
						<div class="c-content c-content-left">
							<h3 class="c-font-uppercase c-font-bold">Stunning Customer Support</h3>					
							<p>
								We are here for you. Any time. Any place
							</p>
						</div>
					</div>	
				</li>
			</ul>
	
		</div>
	</div> 
</div>
<!-- END: CONTENT/FEATURES/FEATURES-8 -->

<!-- BEGIN: CONTENT/FEATURES/FEATURES-15-2 -->
<div id="feature-15-2" class="c-content-feature-15 c-bg-img-center" style="background-image: url(../../assets/base/img/content/backgrounds/bg-11.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-8 col-xs-12">
				<div class="c-feature-15-container c-bg-dark">
					<h2 class="c-feature-15-title c-font-bold c-font-uppercase c-theme-border c-font-white">TAKE N GO is here for you</h2>
					<div class="row">
						<div class="col-md-4 col-xs-12">
							<img src="../../assets/base/img/content/shop8/02.jpg" class="c-feature-15-img"/>
						</div>
						<div class="col-md-8 col-xs-12">
							<p class="c-feature-15-desc c-font-grey">
								We are the best car market around and we provide the best deals everyday. Tell us what we lack of and we'll fix it in a second. Grab a car, grab a life, and have fun!
							</p>
							<a class="c-feature-15-btn btn c-btn btn-lg c-theme-btn c-font-uppercase c-btn-circle c-font-bold c-btn-square" href="{{url('/cars')}}" alt="Purchase JANGO">Explore</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END: CONTENT/FEATURES/FEATURES-15-2 -->

<!-- BEGIN: CONTENT/MISC/SERVICES-1 -->
<div class="c-content-box c-size-md c-bg-grey-1  ">
	<div class="container">
		<div class="c-content-feature-2-grid" data-auto-height="true" data-mode="base-height">
						<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="c-content-feature-2" data-height="height">
						<div class="c-icon-wrapper">
							<div class="c-content-line-icon c-theme c-icon-screen-chart"></div>
						</div>
						<h3 class="c-font-uppercase c-font-bold c-title">Development</h3>
						<p>We are improving our services to make you more comfortable</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="c-content-feature-2" data-height="height">
						<div class="c-icon-wrapper">
							<div class="c-content-line-icon c-theme c-icon-support"></div>
						</div>
						<h3 class="c-font-uppercase c-font-bold c-title">Comfort</h3>
						<p>We are here for YOU. Please give us feedback to serve you better!</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="c-content-feature-2" data-height="height">
						<div class="c-icon-wrapper">
							<div class="c-content-line-icon c-theme c-icon-comment"></div>
						</div>
						<h3 class="c-font-uppercase c-font-bold c-title">Consulting</h3>
						<p>Ask us about anything! Yes, ANYTHING!</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="c-content-feature-2" data-wow-delay1="2s" data-height="height">
						<div class="c-icon-wrapper">
							<div class="c-content-line-icon c-theme c-icon-bulb"></div>
						</div>
						<h3 class="c-font-uppercase c-font-bold c-title">Be the BEST</h3>
						<p>We are aiming to be the number one car rental company in the world</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="c-content-v-center c-theme-bg wow bounceInUp" data-wow-delay1="2s" data-height="height">
						<div class="c-wrapper">
							<div class="c-body c-padding-20 c-center">  
								<h3 class="c-font-19 c-line-height-28 c-font-uppercase c-font-white c-font-bold">
								Providing the best possible
								service to our customers
								without a breaking a sweat
								</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="c-content-feature-2" data-wow-delay1="2s" data-height="height">
						<div class="c-icon-wrapper">
							<div class="c-content-line-icon c-theme c-icon-globe"></div>
						</div>
						<h3 class="c-font-uppercase c-font-bold c-title">Hosting</h3>
						<p>We host your car! Just contact us!</p>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div><!-- END: CONTENT/MISC/SERVICES-1 -->

@endsection

@section('script')
<script>
	$(document).ready(function() {
		var slider = $('.c-layout-revo-slider .tp-banner');

		var cont = $('.c-layout-revo-slider .tp-banner-container');

		var api = slider.show().revolution({
			sliderType:"standard",
			sliderLayout:"fullscreen",
			dottedOverlay:"none",
			delay:15000,
			navigation: {
				keyboardNavigation:"off",
				mouseScrollNavigation:"off",
				onHoverStop:"off",
				touch:{
					touchenabled:"off",
					drag_block_vertical: false
				}
				,
				arrows: {
					enable:false,
				}
				,
				bullets: {
					enable:false,
				}
			},
			viewPort: {
				enable:true,
				outof:"pause",
				visible_area:"80%"
			},
			responsiveLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[800,800,500,400],
			lazyType:"none",
			parallax: {
				type:"mouse",
				origo:"slidercenter",
				speed:2000,
				levels:[0,2,3,4,5,6,7,12,16,10,50],
			},
			shadow:0,
			spinner:"spinner2",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
	});
</script>
@endsection