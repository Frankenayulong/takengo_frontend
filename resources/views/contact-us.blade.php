@extends('layouts.master')

@section('content')

    <!-- START BREADCRUMBS -->
    <div class="c-layout-breadcrumbs-1 c-bgimage-full  c-centered  c-fonts-uppercase c-fonts-bold   c-bg-img-center" style="background-image: url({{asset('assets/base/img/content/banner3.jpg')}}); background-position:center 80%">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h2 class="c-font-uppercase c-font-bold c-font-white c-font-35 c-font-slim c-opacity-09">Contact Us</h2>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{url('/')}}" class="c-font-white">Home</a></li>
                <li class="c-font-white">/</li>
                <li class="c-state_active c-font-white">Contact Us</li>
            </ul>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

      <!-- BEGIN: CONTENT/CONTACT/FEEDBACK-1 -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="c-content-feedback-1 c-option-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="c-container c-bg-green c-bg-img-bottom-right" style="background-image:url(../../assets/base/img/content/misc/feedback_box_1.png)">
                            <div class="c-content-title-1 c-inverse">
                                <h3 class="c-font-uppercase c-font-bold">Need to know more?</h3>
                                <div class="c-line-left"></div>
                                <p class="c-font-lowercase">Try visiting our FAQ page to learn more about our greatest ever expanding theme, Take N Go.</p>
                                <a href="{{url('/faq')}}" class="btn btn-md c-btn-border-2x c-btn-white c-btn-uppercase c-btn-square c-btn-bold">Learn More</a>
                            </div>
                        </div>
                        <div class="c-container c-bg-grey-1 c-bg-img-bottom-right" style="background-image:url(../../assets/base/img/content/misc/feedback_box_2.png)">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">Subscribe to our newsletter</h3>
                                <div class="c-line-left"></div>
                                @if(Session::has('status-nl') && Session::has('success-nl'))
                                <div class="alert {{session('success-nl') ? 'alert-success' : 'alert-danger'}}" role="alert">{{session('status-nl')}}</div>
                                @endif
                                <form action="/register-newsletter" method="POST">
                                    <div class="input-group input-group-lg c-square">
                                        <input id="newsletter-email" name="email" type="email" class="form-control c-square" placeholder="Enter your email"/>
                                        <span class="input-group-btn">
							        	<button id="newsletter-submit-btn" class="btn c-theme-btn c-btn-square c-btn-uppercase c-font-bold" type="submit">Go!</button>
							      	</span>
                                    </div>
                                </form>
                                <p>Ask your questions away and let our dedicated customer service help you look through our FAQs to get your questions answered!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-contact">
                            <div class="c-content-title-1">
                                <h3  class="c-font-uppercase c-font-bold">Keep in touch</h3>
                                <div class="c-line-left"></div>
                                @if(Session::has('status') && Session::has('success'))
                                <div class="alert {{session('success') ? 'alert-success' : 'alert-danger'}}" role="alert">{{session('status')}}</div>
                                @endif
                                <p class="c-font-lowercase">Our helpline is always open to receive any inquiry or feedback.
                                    Please feel free to drop us an email from the form below and we will get back to you as soon as we can.</p>
                            </div>
                            
                            <form action="{{url('/contact-us')}}" method="POST">
                                <div class="form-group">
                                    <input id="contact-name" name="name" type="text" placeholder="Your Name" class="form-control c-square c-theme input-lg">
                                </div>
                                <div class="form-group">
                                    <input id="contact-email" name="email" type="text" placeholder="Your Email" class="form-control c-square c-theme input-lg">
                                </div>
                                <div class="form-group">
                                    <input id="contact-phone" name="phone" type="text" placeholder="Contact Phone" class="form-control c-square c-theme input-lg">
                                </div>
                                <div class="form-group">
                                    <textarea id="contact-content" name="content" rows="8" name="message" placeholder="Write comment here ..." class="form-control c-theme c-square input-lg"></textarea>
                                </div>
                                <button type="submit" id="contact-submit-btn" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-bold c-btn-square">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: CONTENT/CONTACT/FEEDBACK-1 -->










@endsection