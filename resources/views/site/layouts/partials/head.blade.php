    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

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