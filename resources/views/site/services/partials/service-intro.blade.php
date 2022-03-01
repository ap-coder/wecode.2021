<!--=================================
intro-title -->
<section class="intro-title black-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="intro-content">
                    <div class="intro-name">
                        <h1 class="text-white">{{ @$service->title ? $service->title : 'Services' }}</h1>
                        <ul class="breadcrumb mt-1 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            @if (@$service)
                                <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
                            @endif
                            <li class="breadcrumb-item active">{{ @$service->title ? $service->title : 'Services' }}</li>
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