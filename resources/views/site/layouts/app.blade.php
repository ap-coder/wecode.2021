<!DOCTYPE html>
<html lang="en" class="@hasSection('htmlClasses')@yield('htmlClasses') @endif"  itemscope @hasSection('htmlschema')itemtype="https://schema.org/@yield('htmlschema')"@endif @hasSection('htmlschema2')itemtype="https://schema.org/@yield('htmlschema2')" @endif @hasSection('htmlschema3')itemtype="https://schema.org/@yield('htmlschema3')" @endif>
    <head>
    @include('site.layouts.partials.head')
    </head>
<body @hasSection('bodyClasses') class="@yield('bodyClasses')" @endif @hasSection('bodyschema') itemscope="" itemtype="http://schema.org/@yield('bodyschema')" @endif>
        <!--================================= loading -->
@include('site.layouts.partials.loader')
        <!--=================================  loading -->
        <!--=================================  header -->
@include('site.layouts.partials.header')
                <!--================================= header -->
@include('site.layouts.partials.top_sections')
                @yield('content')
@include('site.layouts.partials.bottom_sections')
{{-- @include('site.layouts.partials.blue_footer') --}}
@include('site.layouts.partials.dark_footer')
                <!--================================= footer -->
                <!--================================= back to top -->
     <div class="back-to-top">
         <span><img src="{{ asset('site/images/rocket.png') }}" data-src="{{ asset('site/images/rocket.png') }}" data-hover="{{ asset('site/images/rocket.gif') }}" alt=""></span>
     </div>
                <!--================================= back to top -->
@include('site.layouts.partials.javascript')
</body>
</html>
