<div class="text-center">
    @if(count($bannerProducts) == 0)
        <div class="baner baner-1">
            Add baner
        </div>
        <div class="baner baner-2">
            Add baner
        </div>
        <div class="baner baner-3">
            Add baner
        </div>
    @else
        @foreach($bannerProducts as $k=>$banner)
            @if($k < 3)
                <div class="baner baner-{{$k}}">
                    <img src="{{ asset('storage/'.$banner->image) }}">
                </div>
            @endif
        @endforeach
    @endif
</div>