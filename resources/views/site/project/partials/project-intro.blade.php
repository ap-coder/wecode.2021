
 <!--=================================
intro-title -->
<section class="intro-title blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left">
                <div class="intro-content">
                    <div class="intro-name">
                        <h3 class="text-white">Portfolio</h3>
                        <ul class="breadcrumb mt-1">
                                <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            @if (@$project)
                                <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                            @endif
                                <li class="breadcrumb-item active">{{ @$project->name ? $project->name : 'Portfolio' }}</li>
                        </ul>
                    </div>
                    <div class="intro-img">
                        
                       
                        @if(@$project && @$project->header_image)
                            <img class="img-fluid" src="{{ get_attachment_url($project->header_image,'full') }}" alt="Banner Image">
                        @elseif($env == 'local')
                            <img class="img-fluid" src="{{ asset('site/images/breadcrumb/01.png') }}" alt="Banner Image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================= intro-title -->
