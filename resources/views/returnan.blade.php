anda adalah benar


@if (session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif


@foreach ($populer as $p)
    <div class="d-flex gap-0">
        <button class="btn btn-sm yms-blue rounded-5 px-3 me-2"
            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
            <i class="fas fa-minus"></i>
        </button>

        <div class="form-outline">
            <input id="form1" min="1" name="quantity" value="{{ $p }}" type="number"
                class="form-control" readonly />
        </div>

        <button class="btn btn-sm yms-blue rounded-5 px-3 ms-2"
            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
            <i class="fas fa-plus"></i>
        </button>
@endforeach

