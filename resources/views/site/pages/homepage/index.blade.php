@extends('site.layouts.app')

@section('page_styles')
    @include('site.layouts.partials.revolution-css')
@endsection

@section('custom_page_scripts')
    @include('site.layouts.partials.revolution-js')
@endsection


@section('content')
<!--================================= banner -->

@include('site.pages.homepage.partials.slider')

<!--================================= banner -->


<!--=================================
wecomel -->

<section class="education page-section-ptb" style="background:url({{ asset('site/images/bg-element/01.png') }}) no-repeat 150px 70px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/03.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">Urgent Website Repair</h5>
                        <p>At some point in time, most websites break. Maybe your host makes changes that cause trouble. Maybe a hacker breaks in and adds code you are not aware of. Maybe it never worked the way you wanted it to and now are just wanting it the right way.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/05.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">Extremely Affordable</h5>
                        <p>Development and Design are actually our passion, your success is actually our goal, and these qualities combined with marketing standards are precisely what set you apart within the industry.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/06.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">On Demand Support</h5>
                        <p>There is no charge until we assess your issues and determine that we can help. Once we've established we can resolve your issue we bill On Demand Support at a flat-rate. We will also tell you what the cost will be rough estimate before we start.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/04.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">Responsive & Mobile</h5>
                        <p>Dominate desktops, tablets & smartphones with a responsive website. Hire We Code Laravel our company to design a mobile friendly site at best price for better reach and impact.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
wecomel -->


<!--=================================
our-service -->

<section class="our-service no-gutter container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-12  blue-bg">
            <div class="services-info h-100">
                <h3 class="text-white mb-3">We provide high quality services</h3>
                <p class="text-white mb-2">Search Engine Optimisation for Small to Medium Sized Businesses. Blow by your competitors on Google and enjoy. Off-site SEO involves earning additional kudos for your site in the areas that Google’s complex and secretive algorithm values most, namely links from other websites.</p>
                <p class="text-white mb-4">Blow by your competitors on Google and enjoy. Off-site SEO involves earning additional kudos. search Engine Optimisation for Small to Medium Sized Businesses. </p>
                <a class="button border-white" href="#">Read more</a>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <div class="row no-gutter">
                <div class="col-md-4 service-block mb-2 mb-md-0 ">
                    <div class="feature-box-01 text-center gray-bg h-100">
                        <div class="feature-box-img mb-2">
                            <img class="img-fluid" src="{{ asset('site/images/icon/04.png') }}" alt="">
                        </div>
                        <div class="feature-box-info mt-2">
                            <h4 class="mb-2 mt-4">Seo Optimization</h4>
                            <p>Rerum ea dolores lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa omnis ad vero aperiam, atque unde, assumenda illum.</p>
                        </div>
                        <div class="feature-box-button">
                            <a class="button arrow" href="#">Read More<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 service-block mb-2 mb-md-0">
                    <div class="feature-box-01 text-center gray-bg h-100">
                        <div class="feature-box-img mb-2">
                            <img class="img-fluid" src="{{ asset('site/images/icon/05.png') }}" alt="">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="mb-2 mt-4">Content Submission</h4>
                            <p>Atque unde, assumenda illum rerum ea dolores lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa omnis ad vero aperiam.</p>
                        </div>
                        <div class="feature-box-button">
                            <a class="button arrow" href="#">Read More<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 service-block mb-2 mb-md-0">
                    <div class="feature-box-01 text-center gray-bg h-100 mr-1">
                        <div class="feature-box-img mb-2">
                            <img class="img-fluid" src="{{ asset('site/images/icon/12.png') }}" alt="">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="mb-2 mt-4">Real-Time Analytics</h4>
                            <p>Culpa omnis ad vero aperiam atque unde, assumenda illum rerum ea dolores lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="feature-box-button">
                            <a class="button arrow" href="#">Read More<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                 </div>
                </div>
                <div class="row no-gutter bottom-service">
                 <div class="col-md-4 service-block mb-2 mb-md-0">
                    <div class="feature-box-01 text-center mt-2 gray-bg h-100">
                        <div class="feature-box-img mb-2">
                            <img class="img-fluid" src="{{ asset('site/images/icon/07.png') }}" alt="">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="mb-2 mt-4">Reputation Management</h4>
                            <p>Consectetur adipisicing elit culpa omnis ad vero aperiam atque unde, assumenda illum rerum ea dolores lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="feature-box-button">
                            <a class="button arrow" href="#">Read More<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 service-block mb-2 mb-md-0">
                    <div class="feature-box-01 text-center mt-2 gray-bg h-100">
                        <div class="feature-box-img mb-2">
                            <img class="img-fluid" src="{{ asset('site/images/icon/08.png') }}" alt="">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="mb-2 mt-4">Boost Your Conversion</h4>
                            <p>Cxtremely Affordablextremely elit ipsum dolor sit amet culpa omnis ad vero aperiam atque unde, assumenda illum rerum ea dolores lorem.</p>
                        </div>
                        <div class="feature-box-button">
                            <a class="button arrow" href="#">Read More<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 service-block mb-2 mb-md-0">
                    <div class="feature-box-01 text-center mt-2 gray-bg h-100 mr-1">
                        <div class="feature-box-img mb-2">
                            <img class="img-fluid" src="{{ asset('site/images/icon/09.png') }}" alt="">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="mb-2 mt-4">USA Based SEO Company</h4>
                            <p>Rerum ea dolores lorem ipsum dolor sit amet consectetur adipisicing elit culpa omnis ad vero aperiam atque unde, assumenda illum.</p>
                        </div>
                        <div class="feature-box-button">
                            <a class="button arrow" href="#">Read More<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
our-service -->


<!--=================================
map-location -->

<section class="map-location page-section-pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <span>We provide high quality services</span>
                    <h3 class="text-center mb-3">We are SEOhub and</h3>
                    <p>Repellat ut assumenda eveniet totam lorem ipsum dolor sit amet, consectetur adipisicing elit. quo accusamus, natus impedit ea quaerat vel voluptatibus veritatis ipsum quae, officiis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa maxime quisquam veritatis iusto reprehenderit saepe hic odit consectetu!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="map-location-image">
                    <img class="img-fluid" src="{{ asset('site/images/device/01.jpg') }}" alt="">
                </div>
                <div class="map-location-tooltip">
                    <div class="tooltip tooltip-west">
                        <span class="tooltip-item"></span>
                        <span class="tooltip-content">Did you know that you can travel from A to B?</span>
                    </div>
                    <div class="tooltip tooltip-west">
                        <span class="tooltip-item"></span>
                        <span class="tooltip-content">There are train stations in almost every city!</span>
                    </div>
                    <div class="tooltip tooltip-east">
                        <span class="tooltip-item"></span>
                        <span class="tooltip-content">Staying home for the again? Seriously?</span>
                    </div>
                    <div class="tooltip tooltip-east">
                        <span class="tooltip-item"></span>
                        <span class="tooltip-content">Life is really short, you know? Get out there!</span>
                    </div>
                    <div class="tooltip tooltip-east">
                        <span class="tooltip-item"></span>
                        <span class="tooltip-content">Life is really short, you know? Get out there!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
map-location -->


<!--=================================
newsletter -->

<section class="newsletter page-section-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <div class="newsletter-info">
                    <h4 class="text-white mb-3">Subscribe to our Newsletter</h4>
                    <p class="mb-4 text-white">Sign up for new Seosignt content, updates, surveys & offers. Fusce commodo tincidunt convallis.Nunc at purus vitae nisl sagittis gravida ut sit amet diam. </p>
                </div>
                <form class="form-inline d-inline">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputPassword2" placeholder="Enter your email address...">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 text-left">
                            <a class="button" href="#">Subscribe now</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!--=================================
newsletter -->


<!--=================================
accordion-main -->

<section class="accordion-main page-section-ptb sec-relative">
    <div class="side-content-image">
        <img class="img-fluid" src="{{ asset('site/images/icon/04.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <div class="owl-carousel mt-3" data-nav-dots="true" data-nav-arrow="false" data-items="1" data-sm-items="1" data-lg-items="1" data-md-items="1" data-autoplay="false" data-loop="true">
                    <div class="item">
                        <img class="img-fluid" alt="#" src="{{ asset('site/images/icon/02.png') }}" />
                    </div>
                    <div class="item">
                        <img class="img-fluid" src="{{ asset('site/images/icon/16.png') }}"  alt="" />
                    </div>
                    <div class="item">
                        <img class="img-fluid" src="{{ asset('site/images/icon/03.png') }}"  alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="mb-2">GROW YOUR BUSINESS WITH US</h3>
                <p class="mb-2">We are on a mission to build, grow and maintain loyal communities at every touchpoint. This means you can accomplish your business goals hrough digital marketing</p>
                <div class="accordion">
                    <div class="acd-group acd-active">
                        <a href="#" class="acd-heading"><span class="ti-bar-chart-alt text-blue"></span>We always Support within one business day.</a>
                        <div class="acd-des">
                            <p>We always provide Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="acd-group">
                        <a href="#" class="acd-heading text-black"><span class="ti-pulse text-blue"></span> We deliver Top Rankings.</a>
                        <div class="acd-des">
                            <p> We always provide Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="acd-group">
                        <a href="#" class="acd-heading text-black"><span class="ti-shield text-blue"></span> High customer retention rate.</a>
                        <div class="acd-des">
                            <p> We always provide Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
accordion-main -->


<!--=================================
welcome-01 -->

<section class="page-section-ptb welcome-01 bg fixed" style="background: url({{ asset('site/images/bg/01.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="mb-2">FOR ALL YOUR SEO AND ONLINE MARKETING NEEDS</h3>
                <p class="mb-2">We always provide Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
                <ul class="list-style-right">
                    <li> <i class="fa fa-check"></i> Burning Desire Golden Key Or Red Herring</li>
                    <li> <i class="fa fa-check"></i> How I Lost The Secret Of Dazzling Success For 20 Years</li>
                    <li> <i class="fa fa-check"></i> Burning Desire Golden Key Or Red Herring</li>
                    <li> <i class="fa fa-check"></i> Hypnotherapy For Motivation Getting The Drive Back</li>
                </ul>
                <a class="button mt-3" href="#">View More</a>
            </div>
        </div>
    </div>
</section>

<!--=================================
welcome-01 -->


<!--=================================
pricing-packages -->

<section class="pricing-packages page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <span>Choose your plan</span>
                    <h3 class="text-center">Our Pricing Packages</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 m-m3">
                <div class="pricing pricing-01 text-center">
                    <div class="pricing-title">
                        <div class="section-title text-center">
                            <h5 class="text-center">STANDARD PLAN</h5>
                            <span>The best to start</span>
                        </div>
                        <div class="pricing-img">
                            <img src="{{ asset('site/images/icon/06.png') }}" alt="">
                        </div>
                        <div class="pricing-prize">
                            <h2 class="text-black"><span>$ </span>20.99 <span>/PER MONTH</span></h2>
                        </div>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li>25 Analytics Compaign</li>
                            <li>Branded Reports</li>
                            <li>1,900 Keywords</li>
                            <li>4 Social Account</li>
                        </ul>
                    </div>
                    <div class="pricing-order mt-3">
                        <a class="button black" href="#">Purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-m3">
                <div class="pricing pricing-01 active text-center">
                    <div class="pricing-title">
                        <div class="section-title text-center">
                            <h5 class="text-center">STANDARD PLAN</h5>
                            <span>The best to start</span>
                        </div>
                        <div class="pricing-img">
                            <img src="{{ asset('site/images/icon/05.png') }}" alt="">
                        </div>
                        <div class="pricing-prize">
                            <h2 class="text-black"><span>$ </span>20.99 <span>/PER MONTH</span></h2>
                        </div>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li>25 Analytics Compaign</li>
                            <li>Branded Reports</li>
                            <li>1,900 Keywords</li>
                            <li>4 Social Account</li>
                        </ul>
                    </div>
                    <div class="pricing-order mt-3">
                        <a class="button black active" href="#">Purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pricing pricing-01 text-center">
                    <div class="pricing-title">
                        <div class="section-title text-center">
                            <h5 class="text-center">STANDARD PLAN</h5>
                            <span>The best to start</span>
                        </div>
                        <div class="pricing-img">
                            <img src="{{ asset('site/images/icon/09.png') }}" alt="">
                        </div>
                        <div class="pricing-prize">
                            <h2 class="text-black"><span>$ </span>20.99 <span>/PER MONTH</span></h2>
                        </div>
                    </div>
                    <div class="pricing-list">
                        <ul>
                            <li>25 Analytics Compaign</li>
                            <li>Branded Reports</li>
                            <li>1,900 Keywords</li>
                            <li>4 Social Account</li>
                        </ul>
                    </div>
                    <div class="pricing-order mt-3">
                        <a class="button black" href="#">Purchase</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
pricing-packages -->


<!--=================================
fancy-team -->

<section class="fancy-team pt-5">
    <div class="container-fluid">
        <div class="row">
                <div class="team-block">
                    <div class="team-image">
                        <img class="img-fluid" src="{{ asset('site/images/icon/01.png') }}" alt="">
                    </div>
                    <div class="fancy-team-tooltip">
                        <div class="tooltip tooltip-west">
                            <span class="tooltip-item"></span>
                            <div class="tooltip-content">
                            <a href="#">Jone dio</a>
                            <p>seo marketing </p>
                            <ul class="social">
                                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="tooltip tooltip-west">
                            <span class="tooltip-item"></span>
                            <div class="tooltip-content">
                            <a href="#">Jone dio</a>
                            <p>seo marketing </p>
                            <ul class="social">
                                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="tooltip tooltip-west">
                            <span class="tooltip-item"></span>
                            <div class="tooltip-content">
                            <a href="#">Jone dio</a>
                            <p>seo marketing </p>
                            <ul class="social">
                                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="tooltip tooltip-east">
                            <span class="tooltip-item"></span>
                            <div class="tooltip-content">
                            <a href="#">Jone dio</a>
                            <p>seo marketing </p>
                            <ul class="social">
                                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="tooltip tooltip-east">
                            <span class="tooltip-item"></span>
                            <div class="tooltip-content">
                            <a href="#">Jone dio</a>
                            <p>seo marketing </p>
                            <ul class="social">
                                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="tooltip tooltip-east">
                            <span class="tooltip-item"></span>
                            <div class="tooltip-content">
                            <a href="#">Jone dio</a>
                            <p>seo marketing </p>
                            <ul class="social">
                                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-pinterest-p"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-dribbble"></i> </a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<!--=================================
fancy-team -->

@endsection



{{-- SEO MICRODATA STUFF  --}}
{{-- @section('htmlClasses','') --}}
@section('htmlschema', 'Website')
{{-- @section('htmlschema2','') --}}
{{-- @section('htmlschema3','') --}}
{{-- @section('bodyClasses', '') --}}
@section('bodyschema', "WebPage")
{{-- @section('jsonld') @endsection --}}