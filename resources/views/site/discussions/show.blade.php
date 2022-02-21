@extends('site.layouts.app')

@section('content')

@include('site.discussions.partials.discuss-intro')

 <!--=================================
page-section -->
<section class="blog-single page-section-ptb">
    <div class="container">
        <div class="row">

            @include('site.discussions.partials.sidebar')

            <div class="col-md-9">
                <div class="blog-entry mb-3">
                    <div class="entry-image clearfix">

                        <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $thread->title }}">

                    </div>
                    <div class="blog-detail mt-3">
                        <div class="entry-title mb-1">
                            <a href="{{ url('discuss', [@$thread->topic->slug, $thread->slug ]) }}">{{ $thread->title }}</a>
                        </div>
                        <div class="entry-meta mb-1">
                            <ul class="p-0">
                                @if (isset($thread->author->name))
                                <li><a href="javascript:void(0);"><i class="ti-user"></i> {{ $thread->author->name ?? '' }}</a></li>
                                @endif
                                @if (isset($thread->topic->name))
                                 <li><a href="javascript:void(0);"><i class="ti-folder"></i> {{ $thread->topic->name ?? '' }}</a></li>
                                @endif
                                
                                {{-- <li><a href="javascript:void(0);"><i class="ti-comments"></i> 5</a></li> --}}
                                <li><a href="javascript:void(0);"><i class="ti-calendar"></i> {{ date('d M Y',strtotime($thread->created_at)) }}</a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            {!! $thread->body !!}
                        </div>
                        
                    </div>
                </div>
            
               

                @includeIf('site.discussions.partials.replies', ['replies' => @$thread->replies])

                

            </div>
        </div>
    </div>
</section>
<!--=================================
page-section -->

@endsection


@section('scripts')
    @parent

@endsection
