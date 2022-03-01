@extends('site.layouts.app')

@section('content')


@include('site.faqs.partials.faqs-intro')

<!--================================= faq-->
<section class="faq page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <span>Have a question? </span>
                    <h1 class="text-center">Frequently Asked Questions(FAQ)</h1>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li role="presentation"><a class="active" href="#all-faqs" aria-controls="all-faqs" role="tab" data-toggle="tab">All FAQs</a></li>

                    @foreach ($faqCategories as $faqCategory)
                        <li role="presentation"><a href="#{{ Str::replace(' ', '-', $faqCategory->category) }}" aria-controls="{{ $faqCategory->category }}" role="tab" data-toggle="tab">{{ $faqCategory->category }}</a></li>
                    @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="all-faqs">
                        <div class="accordion">

                            @foreach ($faqQuestions as $key => $faqQuestion)
                                <div class="acd-group @if($key==0) acd-active @endif" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <a href="#" class="acd-heading" itemprop="name">
                                        <i class="fa fa-question" aria-hidden="true"></i>{{ $faqQuestion->question }}</a>
                                    <div class="acd-des text-gray" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                       <div itemprop="text"> {{ $faqQuestion->answer }}</div>
                                    </div>
                                </div>
                            @endforeach
                            
                            
                        </div>
                    </div>

                    @foreach ($faqCategories as $faqCategory)
                        <div role="tabpanel" class="tab-pane" id="{{ Str::replace(' ', '-', $faqCategory->category) }}">
                            <div class="accordion">
                                @foreach ($faqQuestions as $key => $faqQuestion)
                                    @if ($faqQuestion->category->category==$faqCategory->category)
                                        <div class="acd-group text-black">
                                            <a href="#" class="acd-heading">
                                                <i class="fa fa-question" aria-hidden="true"></i>{{ $faqQuestion->question }}</a>
                                            <div class="acd-des text-gray">{{ $faqQuestion->answer }}</div>
                                        </div>
                                    @endif
                                    
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                   
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!--================================= faq -->


@endsection


{{-- SEO MICRODATA STUFF  --}}
{{-- @section('htmlClasses','') --}}
@section('htmlschema', 'FAQPage')
{{-- @section('htmlschema2','') --}}
{{-- @section('htmlschema3','') --}}
{{-- @section('bodyClasses', '') --}}
@section('bodyschema', "WebPage")
{{-- @section('jsonld') @endsection --}}