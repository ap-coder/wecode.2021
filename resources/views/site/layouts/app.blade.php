<!DOCTYPE html>
<html lang="en">
    <head>
    @include('site.layouts.partials.head')
    </head>

<body>

        <!--================================= loading -->
  
@include('site.layouts.partials.loader')


        <!--=================================  loading -->

  
        <!--=================================  header -->
@include('site.layouts.partials.header')


                <!--================================= header -->

                @yield('content')


   

@include('site.layouts.partials.footer')


                <!--================================= footer -->


  


                <!--================================= back to top -->
     <div class="back-to-top">
         <span><img src="{{ asset('site/images/rocket.png') }}" data-src="{{ asset('site/images/rocket.png') }}" data-hover="{{ asset('site/images/rocket.gif') }}" alt=""></span>
     </div>


                <!--================================= back to top -->
    
@include('site.layouts.partials.javascript')


     
    
</body>

</html>