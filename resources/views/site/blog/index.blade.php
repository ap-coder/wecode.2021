@extends('site.layouts.app')

@section('page_styles') @endsection

@section('custom_page_scripts') @endsection

@section('content')


@include('site.blog.partials.post-intro')

 <!--=================================
page-section -->
<section class="blog-page page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                @if ($posts->count()>0)
                    @foreach ($posts as $post)
                    <div class="blog-entry mb-5">
                        <div class="entry-image clearfix">

                            @if($env == 'local')                            
                                <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $post->title }}">
                            @elseif($post->featured_image)
                                <img class="img-fluid" src="{{ $post->featured_image->getUrl() }}" alt="{{ $post->title }}">
                            @else
                                <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $post->title }}">
                            @endif

                        </div>
                        <div class="blog-detail">
                            <div class="entry-title mb-1">
                                <a href="{{ route('blog.show', $post->slug ) }}">{{ $post->title }}</a>
                            </div>
                            <div class="entry-meta mb-1">
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="ti-folder"></i> {{ $post->category->name ?? '' }}</a></li>
                                    {{-- <li><a href="javascript:void(0);"><i class="ti-comments"></i> 5</a></li> --}}
                                    <li><a href="javascript:void(0);"><i class="ti-calendar"></i> {{ date('d M Y',strtotime($post->created_at)) }}</a></li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>{{ $post->excerpt }}</p>
                            </div>
                            <div class="entry-share clearfix">
                                <div class="entry-button">
                                    <a class="button arrow" href="{{ route('blog.show', $post->slug ) }}">Read More<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="social list-style-none">
                                    <strong>Share : </strong>
                                    <ul>
                                        <li>
                                            <a href="#"> <i class="fa fa-facebook"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa fa-twitter"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa fa-pinterest-p"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <i class="fa fa-dribbble"></i> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h2>No blog found!</h2>
                @endif
               
            </div>

            @include('site.blog.partials.sidebar')
            
        </div>
    </div>
</section>
<!--=================================
page-section -->


@endsection