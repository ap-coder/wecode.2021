
   <header id="header" class="default">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="topbar-left text-center text-md-left">
                            <ul class="list-inline">
                                <li> <i class="ti-location-pin"> </i>Midvale, Utah</li>
                                <li> <i class="ti-headphone-alt"></i>wecodelaravel@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="topbar-right text-center text-md-right">
                            <ul class="list-inline">
                                <!-- <li><a href="#"> Check your rankings anytime anywhere </a> </li> -->
                                <li><a href="#"> Register for FREE!</a></li>
                                <li><a href="#"> Support & FAQ</a></li>
                                <li><a href="#">Login </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--================================= mega menu -->
       
        <div class="menu">
            <!-- menu start -->
            <nav id="menu" class="mega-menu">
                <!-- menu list items container -->
                <section class="menu-list-items">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- menu logo -->
                                <ul class="menu-logo">
                                    <li>
                                        <a href="{{ url('') }}"><img id="logo_img" src="{{ asset('site/images/logo-dark.png') }}" alt="logo"> </a>
                                    </li>
                                </ul>
                                <!-- menu links -->
                                <ul class="menu-links">
                                    <!-- active class -->
                                    <li class="active"><a href="javascript:void(0)"> Home </a>
                                    </li>
                                    <!-- active class -->
                                    {{-- <li><a href="javascript:void(0)"> services <i class="fa fa-angle-down fa-indicator"></i></a>
                                        <!-- drop down multilevel  -->
                                        <ul class="drop-down-multilevel">
                                            <li><a href="service-list-01.html">Service list 01 </a></li>
                                            <li><a href="service-list-02.html">Service list 02</a></li>
                                            <li><a href="analytics-services.html">Analytics Services</a></li>
                                            <li><a href="off-page-optimization.html">Off Page Optimization</a></li>
                                            <li><a href="boost-your-conversion-rate.html">Boost Your Conversion Rate</a></li>
                                            <li><a href="search-engine-optimize.html">Search Engine Optimize</a></li>
                                            <li><a href="social-media-marketing.html">Social Media Marketing</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="{{ route('blog.index') }}">blog</a>
                                    </li>
                                    <li><a href="{{ route('project.index') }}">Portfolio</a>
                                    </li>
                                   
                                    <li><a href="javascript:void(0)"> Contact us </a>
                                    </li>
                                    <li>
                                        <div class="search-button">
                                            <a class="search-trigger" href="#search"> <span></span></a>
                                        </div>
                                    </li>
                                    <li class="side-menu-main">
                                        <div class="side-menu">
                                            <div class="mobile-nav-button">
                                                <div class="mobile-nav-button-line"></div>
                                                <div class="mobile-nav-button-line"></div>
                                                <div class="mobile-nav-button-line"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </nav>
            <!-- menu end -->
        </div>
    </header>

                <!--================================= search and side menu content -->

<div class="search-overlay"></div>
  <div class="menu-overlay"></div>
    <div id="search" class="search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <input type="search" placeholder="Type and hit enter...">
                </div>
            </div>
        </div>
    </div>
    <div class="side-content" id="scrollbar">
        <div class="side-content-info">
            <div class="menu-toggle-hamburger menu-close"><span class="ti-close"> </span></div>
            <div class="side-logo">
                <img class="img-fluid mb-3" src="{{ asset('site/images/logo-dark.png') }}" alt="">
                <p>Culpa molestias mollitia natus labore perspiciatis ipsa lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit aut explicabo mollitia, sed, eos, magni quos laborum dolores ab distinctio voluptates quae ipsam.</p>
                <hr class="mt-2 mb-3" />
            </div>
            <div class="contact-address">
                <div class="address-title mb-3">
                    <h4 class="mb-1">Office 01</h4>
                    <p>mollitia omnis fuga, nihil suscipit lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti sit quos.</p>
                </div>
                <div class="contact-box mb-2">
                    <div class="contact-icon">
                        <i class="ti-direction-alt text-blue"></i>
                    </div>
                    <div class="contact-info">
                        <div class="text-left">
                            <h6>25, King St. 20170</h6>
                            <span>Melbourne Australia</span>
                        </div>
                    </div>
                </div>
                <div class="contact-box mb-2">
                    <div class="contact-icon">
                        <i class="ti-headphone-alt text-blue"></i>
                    </div>
                    <div class="contact-info">
                        <div class="text-left">
                            <h6>0011 234 56789</h6>
                            <span>Mon-Fri 8:30am-6:30pm</span>
                        </div>
                    </div>
                </div>
                <div class="contact-box mb-2">
                    <div class="contact-icon">
                        <i class="ti-email text-blue"></i>
                    </div>
                    <div class="contact-info">
                        <div class="text-left">
                            <h6>info@yoursite.com</h6>
                            <span>24 X 7 online support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side-content-image">
            <img class="img-fluid" src="{{ asset('site/images/bg-element/04.png') }}" alt="">
        </div>
    </div>

                <!--================================= search and side menu content -->