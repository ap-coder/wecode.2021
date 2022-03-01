@extends('site.layouts.app')

@section('page_styles')
    @include('site.layouts.partials.revolution-css')
@endsection




@section('content')
<!--================================= banner -->
@include('site.pages.homepage.partials.slider')
<!--================================= banner -->


<!--================================= wecome -->
<section class="education page-section-ptb" style="background:url({{ asset('site/images/bg-element/01.png') }}) no-repeat 150px 70px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/03.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">Urgent Website Repair</h5>
                        <p>At some point in time, most websites break. Maybe your host makes changes that cause trouble. Maybe a hacker breaks in and adds code you are not aware of. Maybe it never worked the way you wanted it to and now are just wanting it the right way.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/05.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">Extremely Affordable</h5>
                        <p>Development and Design are actually our passion, your success is actually our goal, and these qualities combined with with SEO and marketing standards are precisely what set us apart within the industry and we would love to pass it on to you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/06.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">On Demand Support</h5>
                        <p>There is no charge until we assess your issues and determine that we can help. Once we've established we can resolve your issue we bill On Demand Support at a flat-rate. We will also tell you what the cost will be rough estimate before we start.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-box-01 round text-center">
                    <div class="feature-box-img mb-2">
                        <img class="img-fluid" src="{{ asset('site/images/icon/04.png') }}" alt="">
                    </div>
                    <div class="feature-box-info mt-2">
                        <h5 class="text-blue mb-2">Responsive & Mobile</h5>
                        <p>Dominate desktops, tablets & smartphones with a responsive website. Hire We Code Laravel to design a mobile friendly, optimized and SEO compliant right out door. We have the best price around for obtaining better reach and impact.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= wecomel -->


@include('site.pages.homepage.partials.our-services')



{{-- @include('site.pages.homepage.partials.map-location') --}}



@include('site.pages.homepage.partials.newsletter')



@include('site.pages.homepage.partials.accordion-main')



{{-- @include('site.pages.homepage.partials.welcome-01') --}}

 
{{-- @include('site.pages.homepage.partials.pricing') --}}
 
 
{{-- @include('site.pages.homepage.partials.team') --}}
 

@endsection



{{-- SEO MICRODATA STUFF  --}}
{{-- @section('htmlClasses','') --}}
@section('htmlschema', 'Website')
{{-- @section('htmlschema2','') --}}
{{-- @section('htmlschema3','') --}}
{{-- @section('bodyClasses', '') --}}
@section('bodyschema', "WebPage")
{{-- @section('jsonld') @endsection --}}

@section('custom_page_scripts')
    @include('site.layouts.partials.revolution-js')
@endsection

@section('custom_revslider_script')
    {{-- @include('site.pages.homepage.partials.slider1-script') --}}
    @include('site.pages.homepage.partials.slider2-script')
    {{-- @include('site.pages.homepage.partials.slider3-script') --}}
    {{-- @include('site.pages.homepage.partials.slider4-script') --}}
    {{-- @include('site.pages.homepage.partials.slider5-script') --}}

@endsection