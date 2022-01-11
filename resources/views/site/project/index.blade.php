@extends('site.layouts.app')

@section('content')

@include('site.project.partials.project-intro')

<!--=================================
case-studies  -->
<section class="case-studies page-section-ptb">
    <div class="container">
        <div class="row">
             <div class="col-md-12 text-center">
            <div class="case-studies-filters">
                <div class="isotope-filters">
                    <button data-filter="" class="active">All</button>
                    @foreach ($categories as $category)
                        <button data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                    @endforeach
                   
                </div>
                <div class="isotope popup-gallery column-3">
 
             
                    @if ($projects->count()>0)
                        @foreach ($projects as $project)
                        <div class="grid-item {{ $project->category->slug ?? '' }}">
                            <div class="studies-entry">
                                <div class="entry-image clearfix">

                                    
                                       
                                    @if($project->featured_image)
                                        <img class="img-fluid" src="{{ $project->featured_image->getUrl('featured') }}" alt="{{ $project->name }}">
                                    @elseif($env == 'local')
                                        <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $project->name }}">
                                    @endif

                                    <div class="entry-overlay">
                                        @if($project->featured_image)
                                            <a class="popup-img" href="{{ $project->featured_image->getUrl() }}"> <span class="ti-zoom-in"></span></a>
                                        @elseif($env == 'local')
                                            <a class="popup-img" href="{{ asset('site/images/case-studies/01.jpg') }}"> <span class="ti-zoom-in"></span></a>
                                        @endif
                                    </div>
                                    
                                </div>
                                <div class="entry-detail text-left">
                                    <div class="entry-content mb-1">
                                        <a href="{{ route('project.show', $project->slug ) }}">{{ \Illuminate\Support\Str::limit($project->name, $limit = 40, $end = '...') }}</a>
                                        <p class="mt-1">{{ \Illuminate\Support\Str::limit($project->intro, $limit = 150, $end = '...') }}</p>
                                    </div>
                                    <div class="entry-bottom mt-1 clearfix">
                                        <ul class="entry-tag list-style-none">
                                            <li><a href="{{ route('project.show', $project->slug ) }}">{{ $project->category->name ?? '' }}</a></li>
                                        </ul>
                                        {{-- <div class="entry-like float-right">
                                            <a href="#"> <span class="ti-heart"></span></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h2>No record found!</h2>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
case-studies  -->


@endsection