
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

                        @if(isset($main_menu))
                            @foreach($main_menu as $menu)
                                @if ($menu[$env]==1 || ($menu['local']==0 && $menu['development']==0 && $menu['stage']==0 && $menu['production']==0))
                                    <li><a href="{{ preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(strpos($menu['link'], "http") === 0 ? $menu['link'] : url('', $menu['link'])))  }}" title="{{ $menu['label'] }}"> {{ $menu['label'] }} @if( $menu['child'] ) <i class="fa fa-angle-down fa-indicator"></i> @endif </a>

                                        @if( $menu['child'] )
                                        <ul class="drop-down-multilevel">
                                            @foreach( $menu['child'] as $child )
                                                @if ($child[$env]==1 || ($child['local']==0 && $child['development']==0 && $child['stage']==0 && $child['production']==0))
                                                 <li><a href="{{  preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(strpos($child['link'], "http") === 0 ? $child['link'] : url('',$child['link']))) }}" title="{{ $child['label'] }}" itemprop="url">{{ $child['label'] }} </a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        
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
                    
                    {{-- <ul class="menu-links">
                        <!-- active class -->
                        <li class="active"><a href="javascript:void(0)"> Home </a>
                        </li>
                        <!-- active class -->
                        <li><a href="javascript:void(0)"> services <i class="fa fa-angle-down fa-indicator"></i></a>
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
                        </li>
                        <li><a href="{{ route('blog.index') }}">blog</a>
                        </li>
                        <li><a href="{{ route('portfolio.index') }}">Portfolio</a>
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
                    </ul> --}}
                </div>
            </div>
        </div>
    </section>
</nav>