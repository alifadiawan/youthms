@foreach ($blog as $b)
        <div class="trand-right-single d-flex">
            <div class="trand-right-img">
                <img src="{{ asset('blog/'.$b->foto) }}" alt=""
                    width="100px" height="100px">
            </div>
            <div class="trand-right-cap">
                <span class="color1">{{$type}}</span>
                <h4><a href="{{route('blogs.detail', $b->id)}}">{{$b->judul}}</a>
                </h4>
            </div>
        </div>
@endforeach