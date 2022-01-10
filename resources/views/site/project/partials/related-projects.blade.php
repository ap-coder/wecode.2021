@if ($relatedProjects->count()>0)
<section class="case-studies page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <span>Our Projects</span>
                    <h3 class="text-center">Related Projects</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel" data-nav-dots="true" data-nav-arrow="true" data-items="3" data-md-items="3" data-sm-items="2" data-xs-items="2"  data-autoplay="false">

                    @foreach ($relatedProjects as $relatedProject)
                        <div class="item">
                            <div class="studies-entry">
                                <div class="entry-image clearfix">
                                    @if($env == 'local')
                                        <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $relatedProject->name }}">
                                    @elseif($relatedProject->solution_image)
                                        <img class="img-fluid" src="{{ $relatedProject->solution_image->getUrl() }}" alt="{{ $relatedProject->name }}">
                                    @else
                                        <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $relatedProject->name }}">
                                    @endif
                                    <div class="entry-overlay">
                                        <a href="{{ route('project.show', $relatedProject->slug ) }}"> <span class="ti-link"></span></a>
                                    </div>
                                </div>
                                <div class="entry-detail">
                                    <div class="entry-content mb-1">
                                        <a href="{{ route('project.show', $relatedProject->slug ) }}">{{ $relatedProject->name }}</a>
                                        <p class="mt-1">{{ \Illuminate\Support\Str::limit($relatedProject->intro, $limit = 150, $end = '...') }}</p>
                                    </div>
                                    <div class="entry-bottom mt-1 clearfix">
                                        <ul class="entry-tag list-style-none">
                                            <li><a href="{{ route('project.show', $relatedProject->slug ) }}">{{ $relatedProject->category->name ?? '' }}</a></li>
                                        </ul>
                                        {{--  <div class="entry-like float-right">
                                            <a href="#"> <span class="ti-heart"></span></a>
                                        </div>  --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endif