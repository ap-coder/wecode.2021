@extends('site.layouts.app')

@section('page_styles') @endsection

@section('custom_page_scripts') @endsection

@section('content')

@include('site.services.partials.service-intro')


@if(isset($service->servicesContentSections))
@foreach($service->servicesContentSections as $ts)
    @if ($ts->location=='content_top')
        {!! $ts->section !!}
    @endif
@endforeach
@endif

 <!--=================================
welcome -->
<section class="page-section-ptb sec-relative">
    <div class="side-content-image">
        <img class="img-fluid center-block" src="{{ url('site/images/bg-element/04.png') }}" alt="bg-element">
    </div>
    <div class="container">
        <div class="row">           

            <div class="col-lg-4 col-sm-12">
                <h2 class="mb-3">{{ $service->sub_title ?? '' }}</h2>
                <p class="mb-2">{!! $service->service_text !!}</p>
            </div>
            <div class="col-lg-8 col-sm-6">
               <div class="row">
                @foreach ($service->content_images as $content_image)
                    <img class="img-fluid mt-3 col-lg-6" src="{{ get_attachment_url($content_image) }}">
                    @endforeach
                {{-- @if($env == 'local')                            
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/01.jpg') }}" alt="#">
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/02.jpg') }}" alt="#">
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/03.jpg') }}" alt="#">
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/04.jpg') }}" alt="#">
                @elseif($service->content_images->count()>0)
                    @foreach ($service->content_images as $content_image)
                    <img class="img-fluid mt-3 col-lg-6" src="{{ $content_image->getUrl() }}" alt="#">
                    @endforeach
                @else
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/01.jpg') }}" alt="#">
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/02.jpg') }}" alt="#">
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/03.jpg') }}" alt="#">
                    <img class="img-fluid mt-3 col-lg-6" src="{{ url('site/images/case-studies/04.jpg') }}" alt="#">
                @endif --}}
               
               </div>
            </div>
            
            <div class="mt-3">
                {!! $service->service_text_2 !!}
            </div>
        </div>
    </div>
</section>
<!--=================================
welcome -->

    @if(isset($service->servicesContentSections))
    @foreach($service->servicesContentSections as $ts)
        @if ($ts->location=='content_bottom')
            {!! $ts->section !!}
        @endif
    @endforeach
  @endif
@endsection

