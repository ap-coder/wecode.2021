<script type="text/javascript">
    var tpj = jQuery;
    var revapi19;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_19_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_19_1");
        } else {
            revapi19 = tpj("#rev_slider_19_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/revslider-standalone/revslider/public/assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 50,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 600,
                        style: "hermes",
                        hide_onleave: false,
                        direction: "vertical",
                        h_align: "right",
                        v_align: "center",
                        h_offset: 30,
                        v_offset: 0,
                        space: 10,
                        tmp: ''
                    }
                },
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: 1270,
                gridheight: 960,
                lazyType: "smart",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 6, 5, 4, 3, 2, 55],
                    type: "mouse",
                },
                shadow: 0,
                spinner: "spinner3",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "on",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    }); /*ready*/
</script>