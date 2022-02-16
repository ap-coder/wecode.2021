<!-- jquery  -->
<script type="text/javascript" src="{{ asset('site/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/popper.min.js') }}"></script>

<!-- bootstrap -->
<script type="text/javascript" src="{{ asset('site/js/bootstrap.min.js') }}"></script>

<!-- mega-menu -->
<script type="text/javascript" src="{{ asset('site/js/mega-menu/mega_menu.js') }}"></script>

<!-- owl-carousel -->
<script type="text/javascript" src="{{ asset('site/js/owl-carousel/owl.carousel.min.js') }}"></script>


<!-- isotope -->
<script type="text/javascript" src="{{ asset('site/js/isotope/isotope.pkgd.min.js') }}"></script>

<!-- magnific -->
<script type="text/javascript" src="{{ asset('site/js/magnific-popup/jquery.magnific-popup.min.js') }}"></script>


    @if ($landingPageData && $landingPageData->use_rev_slider==true)
        @include('site.layouts.partials.revolution-js')
    @endif
    

    <!-- appear -->
    <script type="text/javascript" src="{{ asset('site/js/jquery.appear.js') }}"></script>
   
    <!-- counter -->
    <script type="text/javascript" src="{{ asset('site/js/counter/jquery.countTo.js') }}"></script>

    <!-- custom -->
    <script type="text/javascript" src="{{ asset('site/js/custom.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('site/js/full_with_sections.js') }}"></script> --}}

    @yield('scripts')

    <script type="text/javascript">
        $(function() {
            $("img.lazy").lazyload({
                event: "sporty"
            });
        });
        $(window).bind("load", function() {
            var timeout = setTimeout(function() {
                $("img.lazy").trigger("sporty")
            }, 100);
        });
    </script>

    <script>
        // $(".feature-item").hover3d({
        //     selector: ".feature-box-01 ",
        //     sensitivity: 10,
        //     perspective: 1000,
        //     shine: true
        // });
    </script>
