
 <div class="blog-comments mt-4">
    @if ($thread->threadReplies->count()>0)
            @foreach($thread->threadReplies as $reply)
                <div class="comments-1">
                    <div class="comments-photo">
                        
                        @if(App::environment('local'))
                            <img src="https://dummyimage.com/100x100/000/fff.jpg" alt="{{ $reply->author->name }}">
                        @elseif(@$reply->author->photo)
                            <img src="{{ $reply->author->photo->getUrl('thumb') }}" alt="{{ $reply->author->name }}">
                        @else
                         <img src="https://dummyimage.com/100x100/000/fff.jpg" alt="{{ $reply->author->name }}">
                        @endif
                    </div>
                    <div class="comments-info" style="display: flow-root;">
                        <h6> {{ $reply->author->name ?? '' }}  <span>{{ $reply->created_at->diffForHumans() ?? '' }}</span></h6>
                        <div class="port-post-social float-right">
                            <a href="#">Reply</a>
                        </div>
                        <p class="mt-1">{!! $reply->content_area ?? '' !!}</p>
                    </div>
                </div>                
            @endforeach
    @endif
                    
                </div>

@include('site.discussions.partials.form',['threadID'=>$thread->id])