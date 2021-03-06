    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

{!! SEO::generate() !!}

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('site/images/favicon.ico') }}" />
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/bootstrap.min.css') }}" />
    <!-- mega menu -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/mega-menu/mega_menu.css') }}" />
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/font-awesome.min.css') }}" />
    <!-- Themify icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/themify-icons.css') }}" />
    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/owl-carousel/owl.carousel.css') }}" />
     <!-- magnific-popup -->
     <link rel="stylesheet" type="text/css" href="{{ asset('site/css/magnific-popup/magnific-popup.css') }}" />
   
     @if ($landingPageData && $landingPageData->use_rev_slider==true)
        @include('site.layouts.partials.revolution-css')
    @endif

    <!-- main style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/style.css') }}" />
    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/responsive.css') }}" />

    @yield('page_styles')

    @yield('top_scripts')

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
   (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7673167166774792",
        enable_page_level_ads: true
   });
</script>
