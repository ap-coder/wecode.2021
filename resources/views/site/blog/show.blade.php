@extends('site.layouts.app')

@section('content')

@include('site.blog.partials.post-intro')

 <!--=================================
page-section -->
<section class="blog-single page-section-ptb">
    <div class="container">
        <div class="row">

            @include('site.blog.partials.sidebar')

            <div class="col-md-9">
                <div class="blog-entry mb-3">
                    <div class="entry-image clearfix">

                        @if($env == 'local')                            
                                <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $post->title }}">
                            @elseif($post->featured_image)
                                <img class="img-fluid" src="{{ $post->featured_image->getUrl() }}" alt="{{ $post->title }}">
                            @else
                                <img class="img-fluid" src="{{ asset('site/images/blog/01.jpg') }}" alt="{{ $post->title }}">
                            @endif

                    </div>
                    <div class="blog-detail mt-3">
                        <div class="entry-title mb-1">
                            <a href="{{ route('blog.show', $post->slug ) }}">{{ $post->title }}</a>
                        </div>
                        <div class="entry-meta mb-1">
                            <ul>
                                @if (isset($post->category->name))
                                 <li><a href="javascript:void(0);"><i class="ti-folder"></i> {{ $post->category->name ?? '' }}</a></li>
                                @endif
                                
                                {{-- <li><a href="javascript:void(0);"><i class="ti-comments"></i> 5</a></li> --}}
                                <li><a href="javascript:void(0);"><i class="ti-calendar"></i> {{ date('d M Y',strtotime($post->created_at)) }}</a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            {!! $post->body_text !!}
                        </div>
                        <div class="entry-share clearfix">
                            <div class="social list-style-none float-right">
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
                <div class="blog-navigation mb-4">
                    <div class="row">
                        <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="navigation-next">
                                <a href="#">
                                    <img class="img-fluid" src="images/blog/01.jpg" alt="">
                                    <div class="port-arrow">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                    <span>BLOGPOST WITH IMAGE</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="navigation-previous float-right text-right">
                                <a href="#">
                                    <img class="img-fluid" src="images/blog/01.jpg" alt="">
                                    <div class="port-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </div>
                                    <span>BLOGPOST WITH IMAGE</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-comments mt-4">
                    <div class="comments-1">
                        <div class="comments-photo">
                            <img src="images/team/08.jpg" alt="">
                        </div>
                        <div class="comments-info">
                            <h6> Michael Bean <span>Sep 15, 2017</span></h6>
                            <div class="port-post-social float-right">
                                <a href="#">Reply</a>
                            </div>
                            <p class="mt-1">Imagine you are 10 years into the future but this time it’s different. Why? Because starting today you actually begin making changes in your life. Specific intentional changes are not easy. They are intentional because these changes are changes that you are choosing and they are the changes that will cause you to live the life you want to live and dream.</p>
                        </div>
                    </div>
                    <div class="comments-1 comments-2">
                        <div class="comments-photo">
                            <img src="images/team/08.jpg" alt="">
                        </div>
                        <div class="comments-info">
                            <h6> Paul Flavius <span>Oct 21, 2017</span></h6>
                            <div class="port-post-social float-right">
                                <a href="#">Reply</a>
                            </div>
                            <p class="mt-1"> They often mean leaving the perception of security in order to discover your personal freedom. These are the changes that will bring happiness and satisfaction into your life. Just go there now. 10 years out… having made a decade of changes.</p>
                        </div>
                    </div>
                    <div class="comments-1 comments-2">
                        <div class="comments-photo">
                            <img src="images/team/08.jpg" alt="">
                        </div>
                        <div class="comments-info">
                            <h6> Michael Bean <span>Oct 20, 2017</span></h6>
                            <div class="port-post-social float-right">
                                <a href="#">Reply</a>
                            </div>
                            <p class="mt-1">Imagine living the life you want to live. How does that feel inside? Do you feel that you have lived life? See the people of your life and how they feel about you and how they react to you. </p>
                        </div>
                    </div>
                    <div class="comments-1">
                        <div class="comments-photo">
                            <img src="images/team/08.jpg" alt="">
                        </div>
                        <div class="comments-info">
                            <h6> Joana Williams <span>Oct 02, 2017</span></h6>
                            <div class="port-post-social float-right">
                                <a href="#">Reply</a>
                            </div>
                            <p class="mt-1">This is the path of a different choice, a different decision. You have the freedom to be how you want to be. Absorb all you need from this moment in your future and the positive things that you can learn consciously and unconsciously and then drift and float back to the place where the path splits. Step Six: Now that you know and have experienced the two contrasting futures. Now that you know what your future holds as a result of what you do this very day.</p>
                        </div>
                    </div>
                </div>
                <div class="blog-form mt-6">
                    <h4 class="mb-3">Post a Comment</h4>
                    <div class="gray-form row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputphone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="7" placeholder="Comment"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a class="button red" href="#">SUBMIT</a>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
page-section -->


@endsection