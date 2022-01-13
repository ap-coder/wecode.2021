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

<!-- revolution -->
<script type="text/javascript" src="{{ asset('site/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
 
    <!-- appear -->
    <script type="text/javascript" src="{{ asset('site/js/jquery.appear.js') }}"></script>
   
    <!-- counter -->
    <script type="text/javascript" src="{{ asset('site/js/counter/jquery.countTo.js') }}"></script>

    <!-- custom -->
    <script type="text/javascript" src="{{ asset('site/js/custom.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('site/js/full_with_sections.js') }}"></script> --}}

    <script type="text/javascript">
        var tpj=jQuery;
        var revapi12;
        tpj(document).ready(function() {
            if(tpj("#rev_slider_12_1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider_12_1");
            }else{
                revapi12 = tpj("#rev_slider_12_1").show().revolution({
                    sliderType:"standard",
                    jsFileLocation:"assets/revolution/js",
                    sliderLayout:"fullwidth",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                        onHoverStop:"off",
                    },
                    visibilityLevels:[1240,1024,778,480],
                    gridwidth:1600,
                    gridheight:900,
                    lazyType:"none",
                    parallax: {
                        type:"mouse",
                        origo:"enterpoint",
                        speed:400,
                        levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
                        type:"mouse",
                    },
                    shadow:0,
                    spinner:"spinner0",
                    stopLoop:"off",
                    stopAfterLoops:-1,
                    stopAtSlide:-1,
                    shuffle:"off",
                    autoHeight:"off",
                    disableProgressBar:"on",
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
            }
        }); /*ready*/
    </script>

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
        $(".feature-item").hover3d({
            selector: ".feature-box-01 ",
            sensitivity: 10,
            perspective: 1000,
            shine: true
        });
    </script>
