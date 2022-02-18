<!--=================================
intro-title -->
<section class="intro-title black-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="intro-content">
                    <div class="intro-name">
                        <h3 class="text-white">The Consultation Desk</h3>
                        <ul class="breadcrumb mt-1 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            @if (@$thread)
                                <li class="breadcrumb-item"><a href="{{ url('discuss', [@$thread->topic->slug, $thread->slug ]) }}">Duscussions</a></li>
                            @endif
                                <li class="breadcrumb-item active">{{ @$thread->title ? $thread->title : 'Duscussions' }}</li>
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