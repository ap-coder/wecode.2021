<!--=================================
intro-title -->
<section class="intro-title black-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="intro-content">
                    <div class="intro-name">
                        <h3 class="text-white">Blog</h3>
                        <ul class="breadcrumb mt-1">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            @if (@$post)
                                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
                            @endif
                            <li class="breadcrumb-item active">{{ @$post->title ? $post->title : 'Blog' }}</li>
                        </ul>
                    </div>
                    <div class="intro-img">
                        <img class="img-fluid" src="{{ asset('site/images/breadcrumb/02.png') }}" alt="Blog banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
intro-title -->