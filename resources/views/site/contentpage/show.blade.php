@extends('site.layouts.landing_page')

@section('page_styles') @endsection

@section('custom_page_scripts') @endsection

 
{{-- added this part for custom css for this page only. --}}
@section('page_styles')
    <style>
        {!! $page->custom_css ?? '' !!}
    </style>
@endsection


@section('masthead')
    @includeIf('site.contentpage.partials.masthead', ['featured_image' => @$page->featured_image])  
@endsection

@section('above-content')

                @if(isset($page->pagesContentSections))
                    @foreach($page->pagesContentSections as $ts)
                        @if ($ts->location=='content_top')
                            {!! $ts->section !!}
                        @endif
                    @endforeach
                @endif
 
@endsection
          
@section('content')

<div id="pageSectionDiv">
    @if ($page)
    @foreach($page->pagesPagesections as $ps)
    {!! $ps->section !!}
    @endforeach
@endif
</div>

@endsection

@section('below-content')
  
          {{-- THIS IS FOR BELOW CONTENT > CONTENT SECTION FOR PAGES CRUD --}}            
 
          @if(isset($page->pagesContentSections))
            @foreach($page->pagesContentSections as $ts)
                @if ($ts->location=='content_bottom')
                    {!! $ts->section !!}
                @endif
            @endforeach
          @endif
 
@endsection

@section('scripts')
    @parent
    <script>
        $( document ).ready(function() {
            $('#pageSectionDiv').find("img").each(function(k, el) {
                var src=$(el).attr("src");
                var result = src.split('/');
                var lastEl = result[result.length-1];
                
                var newSrc = $(el).attr("src").replace(src, "{{ asset('site/img/landing-pages') }}/"+lastEl);
                $(el).attr("src", newSrc);                  

            });
        });
    </script>
@endsection
