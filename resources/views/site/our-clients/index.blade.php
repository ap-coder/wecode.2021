@extends('site.layouts.app')

@section('content')


@include('site.our-clients.partials.client-intro')


    <!--=================================
    Our Client Title -->

    <section class="page-section-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <span>OUR HAPPY CLIENTS</span>
                        <h3 class="text-center">our Client</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
Our Client Title -->


<section class="clients-dolor page-section-pb">
        <div class="container">
            <div class="row">
                @foreach ($clients as $client)
                    <div class="col-md-6">
                        <div class="clients-box mb-3 clearfix">
                            <div class="clients-photo">
                                @if($env == 'local')                            
                                <img  src="{{ asset('site/images/clients/01.png') }}" alt="{{ $client->name }}">
                                @elseif($client->featured_image)
                                    <img  src="{{ $client->featured_image->getUrl() }}" alt="{{ $client->name }}">
                                @else
                                    <img  src="{{ asset('site/images/clients/01.png') }}" alt="{{ $client->name }}">
                                @endif
                            </div>
                            <div class="clients-info">
                                <h6 class="text-white mt-1 mb-1">{{ $client->name }}</h6>
                                <p class="text-white mb-3">{{ $client->intro }}</p>
                                <a class="button arrow" target="_blank" href="{{ $client->website }}">VISIT SITE<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection