@extends('site.layouts.app')

@section('page_styles') @endsection

@section('custom_page_scripts') @endsection

@section('content')

@include('site.services.partials.service-intro')

 <!--=================================
counter -->
<section class="counter light page-section-ptb gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 text-center">
                <div class="counter-block">
                    <img class="img-fluid center-block" src="{{ url('site/images/icon/04.png') }}" alt="">
                    <h6 class="text-black mt-3 mb-3">Vehicles In Stock  </h6>
                    <b class="timer" data-to="3968" data-speed="10000"></b>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <div class="counter-block">
                    <img class="img-fluid center-block" src="{{ url('site/images/icon/05.png') }}" alt="">
                    <h6 class="text-black mt-3 mb-3">Dealer Reviews</h6>
                    <b class="timer" data-to="5568" data-speed="10000"></b>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <div class="counter-block">
                    <img class="img-fluid center-block" src="{{ url('site/images/icon/06.png') }}" alt="">
                    <h6 class="text-black mt-3 mb-3">Happy Customer</h6>
                    <b class="timer" data-to="8908" data-speed="10000"></b>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <div class="counter-block">
                    <img class="img-fluid center-block" src="{{ url('site/images/icon/07.png') }}" alt="">
                    <h6 class="text-black mt-3 mb-3">Awards</h6>
                    <b class="timer" data-to="9968" data-speed="10000"></b>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
counter -->

@if ($services->count()>0)
    @foreach ($services as $key => $service)
        <!--=================================
        service-block -->
        <section class="service-block @if($loop->iteration % 2 == 0) page-section-pb @else page-section-ptb @endif">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 align-self-center @if($loop->iteration % 2 == 0) order-md-2 @endif" data-valign-overlay="middle">
                        @if($env == 'local')                            
                                <img class="img-fluid center-block" src="{{ asset('site/images/device/12.png') }}" alt="{{ $service->title }}">
                                @elseif($service->featured_image)
                                    <img class="img-fluid center-block" src="{{ $service->featured_image->getUrl() }}" alt="{{ $service->title }}">
                                @else
                                    <img class="img-fluid center-block" src="{{ asset('site/images/device/12.png') }}" alt="{{ $service->title }}">
                                @endif
                    </div>
                    <div class="col-md-6">
                        <h3 class="mt-3 mb-2">{{ $service->title }}</h3>
                        <p class="mb-2">{{ $service->excerpt }}</p>
                        <a class="button mt-3" href="{{ route('services.show',$service->slug) }}">Read more</a>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        service-block -->
    @endforeach
@endif

@endsection