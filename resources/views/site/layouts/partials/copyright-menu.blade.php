<div class="copyright mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <ul class="list-inline text-left">
                    @if(isset($copyright_menu))
                        @foreach($copyright_menu as $menu)
                            <li><a href="{{ preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(strpos($menu['link'], "http") === 0 ? $menu['link'] : url('', $menu['link']))) }}" title="{{ $menu['label'] }}">{{ $menu['label'] }} </a></li>
                        @endforeach
                   @endif
                </ul>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="text-right">
                    <p>Copyright © 2022 We Code Laravel. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>