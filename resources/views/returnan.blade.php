anda adalah benar


@if (session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
