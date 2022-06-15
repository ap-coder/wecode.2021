@extends('site.layouts.app')

@section('page_styles') @endsection

@section('custom_page_scripts') @endsection

@section('content')

@include('site.project.partials.project-intro')

 <!--================================= prject single -->
<section class="case-studies single page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-image">
                     
                    @if($project->featured_image)
                        <img class="img-fluid" src="{{ get_attachment_url($project->featured_image,'full') }}" alt="{{ $project->name }}">
                    @elseif($env == 'local')
                        <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $project->name }}">
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-detail">
                    <h4 class="mb-2">{{ $project->name }}</h4>
                    {!! $project->body_content !!}
                    <div class="single-info mt-2">
                        <h6>Client:</h6>
                        <p class="mb-2">{{ $project->client->name ?? '' }}</p>
                        <h6>Date:</h6>
                        <p class="mb-2">{{ date('d M Y',strtotime($project->start_date)) }}</p>
                        <h6>Project Type:</h6>
                        <p class="mb-2">{{ App\Models\Project::PROJECT_TYPE_SELECT[$project->project_type] ?? '' }} </p>
                        @if ($project->website)
                            <a class="button border" href="{{ $project->website }}" target="_blank">lauch site </a> 
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if ($project->challenges)
           <hr class="my-5">
            <div class="single-banner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-block">
                            <div class="banner-image">
                                <div class="banner-info">
                                    <h4 class="mb-3">CHALLENGES</h4>
                                    {!! $project->challenges ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
 
                        @if($project->challenge_image)
                            <img class="img-fluid" src="{{ get_attachment_url($project->challenge_image,'full') }}" alt="{{ $project->name }}">
                        @elseif($env == 'local')
                            <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $project->name }}">
                        @endif
                    </div>
                </div>
            </div> 
        @endif
        
        @if($project->solutions)
            <hr class="my-5">
            <div class="single-banner">
                <div class="row">
                    <div class="col-md-6">
     
                        @if($project->solution_image)
                            <img class="img-fluid" src="{{ get_attachment_url($project->solution_image,'full') }}" alt="{{ $project->name }}">
                        @elseif($env == 'local')
                            <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $project->name }}">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="banner-block">
                            <div class="banner-image">
                                <div class="banner-info">
                                    <h4 class="mb-3">SOLUTIONS</h4>
                                    {!! $project->solutions ?? '' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        @endif
        
        
    </div>
</section>
<!--================================= prject  -->

<!--================================= counter -->
    @include('site.project.partials.counter')
<!--================================= counter -->

<!--================================= related-projects -->
    @include('site.project.partials.related-projects')

<!--================================= related-projects -->


@endsection



{{-- SEO MICRODATA STUFF  --}}
{{-- @section('htmlClasses','') --}}
@section('htmlschema', 'Website')
{{-- @section('htmlschema2','') --}}
{{-- @section('htmlschema3','') --}}
{{-- @section('bodyClasses', '') --}}
@section('bodyschema', "WebPage")
{{-- @section('jsonld') @endsection --}}