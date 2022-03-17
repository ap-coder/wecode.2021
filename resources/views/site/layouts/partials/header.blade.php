
   <header id="header" class="default">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="topbar-left text-center text-md-left">
                            <ul class="list-inline" style="padding-left:0!important;">
                                <li> <i class="ti-location-pin"> </i>United States</li>
                                <li> <i class="ti-headphone-alt spamprotection"></i>
                                    <a href="mailto:&#099;&#111;&#110;&#116;&#097;&#099;&#116;&#064;&#119;&#101;&#099;&#111;&#100;&#101;&#108;&#097;&#114;&#097;&#118;&#101;&#108;&#046;&#099;&#111;&#109;">&#099;&#111;&#110;&#116;&#097;&#099;&#116;&#064;&#119;&#101;&#099;&#111;&#100;&#101;&#108;&#097;&#114;&#097;&#118;&#101;&#108;&#046;&#099;&#111;&#109;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="topbar-right text-center text-md-right">
                            <ul class="list-inline">
                                <!-- <li><a href="#"> Check your rankings anytime anywhere </a> </li> -->
                                <li><a href="{{ route('register') }}"> Register for FREE!</a></li>
                                <li><a href="{{ route('faqs.index') }}"> Support & FAQ</a></li>
                                <li><a href="{{ route('login') }}">Login </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--================================= mega menu -->
       
        <div class="menu">
            <!-- menu start -->

            @include('site.layouts.partials.generated-nav')
            
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