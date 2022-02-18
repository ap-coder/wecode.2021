@extends('site.layouts.app')

@section('content')


@include('site.discussions.partials.discuss-intro')

 <!--=================================
discussions-block -->
<section class="feature white-bg page-section-ptb">
  <div class="container">
      <div class="row">
        <div class="col-md-9">

          @foreach ($threads as $thread)
            <div class="col-md-12 mb-5 mb-sm-4">
              <div class="d-flex">
                <div class="icon-rounded border-0 mr-3">
                  <div class="icon">
                    @if(App::environment('local'))
                    <img class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" src="https://dummyimage.com/50x50/ooo/fff.jpg">
                    @elseif(@$thread->author->photo)
                      <img class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" src="{{ $thread->author->photo->getUrl('thumb') }}">
                    @else
                      <img class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" src="https://dummyimage.com/50x50/ooo/fff.jpg">
                    @endif
                    </div>
                </div>
                <div class="">
                  <h5 class="mb-2"><a href="{{ url('discuss', [@$thread->topic->slug, $thread->slug ]) }}">{{ $thread->title }}</a></h5>
                  <p class="mb-0">{{ Str::limit(strip_tags(htmlspecialchars_decode($thread->body)), 160) }}</p>
                </div>
              </div>
            </div>
          @endforeach
         
      </div>
      @include('site.discussions.partials.sidebar')
     
      </div>
  </div>
</section>
<!--=================================
discussions-block -->

@endsection