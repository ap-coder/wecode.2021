@if($page->use_svg_header == true)   

<div>
  {!! $page->svg_masthead ?? '' !!}
</div>


@elseif($page->use_featured_image_header == true)               

{{-- THIS IS FEATURED IMAGE HEADER PLACEMENT --}}
<section class="page-header page-header-modern page-header-background page-header-background-md @if($page->show_title || $page->show_tagline || $page->show_featured_content) overlay overlay-color-dark overlay-show overlay-op-5 @endif" style="width: 100%; min-height: 500px; background-image: url({{ $page->featured_image->getUrl('masthead') }});">
  <div class="container">
    <div class="row">
      <div class="col-md-10 order-2 order-md-1 align-self-center p-static">
          @if ($page->show_title && $page->title)
            <h1 class="text-capitalize font-weight-bold text-8 mb-1 {{ $page->title_style ?? 'text-primary bg-light' }}  p-2">{{ $page->title ?? '' }}</h1>
          @endif
          @if ($page->show_tagline && $page->sub_heading)
            <span style="display: table;" class="h4 text-uppercase text-capitalize font-weight-bold sub-title mb-1 {{ $page->tagline_style ?? 'text-secondary  bg-dark' }} p-2 ">{{ $page->sub_heading ?? '' }}</span>
          @endif
          @if ($page->show_featured_content && $page->featured_image_content)
            <p style="display: table;" class="text-4 mt-1 {{ $page->fi_content_style ?? 'text-light' }}  p-2">{{ $page->featured_image_content ?? '' }}</p>
          @endif
      </div>

    </div>
  </div>
</section>

@elseif($page->use_textonly_header == true)

{{-- DEFAULT IF NOT FEATURED IMAGE --}}
<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
  <div class="container">
    <div class="row">
      <div class="col-md-12 align-self-center p-static order-2 text-center">

        @if ($page->show_title_box)
          @if ($page->show_title && $page->title)
            <h1 class="font-weight-bold text-8 {{ $page->title_color ?? 'text-primary' }}">{{ $page->title ?? '' }}</h1>
          @endif
          @if ($page->show_tagline && $page->sub_heading)
            <span style="display: table;" class="sub-title {{ $page->tagline_color ?? 'text-secondary' }}">{{ $page->sub_heading ?? '' }}</span>
          @endif
          @if ($page->show_featured_content && $page->featured_image_content)
            <p style="display: table;" class="text-4 mt-2 {{ $page->fi_content_color ?? 'text-light' }}">{{ $page->featured_image_content ?? '' }}</p>
          @endif
        @endif
        
      </div>
      <div class="col-md-12 align-self-center order-1">
        {{-- <ul class="breadcrumb d-block text-center">
          <li><a href="#">Home</a></li>
          <li class="active">Blog</li>
        </ul> --}}
      </div>
    </div>
  </div>
</section>
 @endif