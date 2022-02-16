   <footer id="footer-fixed" class="footer-dark page-section-pt" style="background: #353535 url({{ asset('site/images/bg-element/06.png') }}) no-repeat; background-position: center; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo">
                        <img id="logo_footer_light" class="img-fluid pb-2" src="images/logo-light.png" alt="">
                        <p class="text-gray pb-2"> SEOhub helps you to quickly and easily build incredible websites. SEOhub is a Hand Crafted Pixel Perfect, Responsive, Multi-Purpose, Retina Ready, HTML5, Revolution slider & outstanding template with Many Features that You Need.<a href="" class="text-white"> BUY IT NOW!</a></p>
                    </div>
                    <div class="addresss mb-1">
                        <div class="addresss-icon">
                            <i class="fa fa-map-marker text-white mt-1"></i>
                        </div>
                        <div class="addresss-info">
                            <h6 class="text-white">Address</h6>
                            <p>Midvale, UT 84047</p>
                        </div>
                    </div>
                    <div class="addresss mb-1">
                        <div class="addresss-icon">
                            <i class="fa fa-phone text-white mt-1"></i>
                        </div>
                        <div class="addresss-info">
                            <h6 class="text-white">Phone number</h6>
                            <p>Coming Soon</p>
                        </div>
                    </div>
                    <div class="addresss mb-1">
                        <div class="addresss-icon">
                            <i class="fa fa-envelope-o text-white mt-1"></i>
                        </div>
                        <div class="addresss-info">
                            <h6 class="text-white">Email address</h6>
                            <p>wecodelaravel@gmail.com</p>
                        </div>
                    </div>
                </div>

                @if(isset($footer_widget_menu))

                @foreach($footer_widget_menu as $menu)
                <div class="col-lg-2 col-md-3">
                    
                        @if ($menu['link']=='')
                            <h6 class="text-white pt-1 pb-3">{{ $menu['label'] }}</h6>
						@else
							<a href="{{ preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(strpos($menu['link'], "http") === 0 ? $menu['link'] : url('', $menu['link']))) }}" title="{{ $menu['label'] }}">
								<h6 class="text-white pt-1 pb-3">{{ $menu['label'] }}</h6>
							</a>
						@endif

                        @if( $menu['child'] )
                            <div class="footer-nav ">
                                <ul>
                                    @foreach( $menu['child'] as $child )
                                    <li>
                                        <a href="{{  preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(strpos($child['link'], "http") === 0 ? $child['link'] : url('',$child['link']))) }}" title="{{ $child['label'] }}"> <i class="fa fa-angle-right"></i> {{ $child['label'] }} </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                   
                </div>
                @endforeach
                @endif
                
                <div class="col-lg-4 col-md-12">
                    <h6 class="text-white pt-1 pb-3">Recent Posts</h6>
                    <p class="text-gray pb-2"> SEOhub helps you to quickly and easily build incredible websites.</p>
                    <form class="form white">
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <a href="#" class="button">Subscribe now</a>
                    </form>
                </div>
            </div>
        </div>

        @include('site.layouts.partials.copyright-menu', ['copyright_menu' => $copyright_menu]) 

       
    </footer>