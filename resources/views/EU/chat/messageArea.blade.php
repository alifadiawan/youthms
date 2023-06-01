<ul>
    <div id="message-container">
        @foreach ($messages as $message)
            @if ($message->user_id == auth()->user()->id)
                <div class="row justify-content-end mb-4">
                    <span class="text-end">{{ auth()->user()->username }}</span>
                    <div class="col-4 mt-2">
                        <div class="p-3 border" style="border-radius: 10px; background-color: #406cab;">
                            <p class=" mb-0 text-white text-end">{{ $message->message }}</p>
                        </div>
                        <span class="time text-end text-muted">{{ $message->created_at->format('h:i A') }}</span>
                    </div>
                </div>
            @else
            <div class="row justify-content-start mb-4">
                <span class="text-start">{{ $message->user->username }}</span>
                <div class="col-4">
                    <div class="p-3 border" style="border-radius: 10px; background-color: #e4e4e4;">
                        <p class=" mb-0">{{ $message->message }}</p>
                    </div>
                    <span class="time text-start text-muted">{{ $message->created_at->format('h:i A') }}</span>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <!-- <li class="sender">
        <p> Hey, Are you there? </p>
        <span class="time">10:26 am</span>
    </li>
    <li class="sender">
        <p> Hey, Are you there? </p>
        <span class="time">10:32 am</span>
    </li>
    <li class="repaly">
        <p>How are you?</p>
        <span class="time">10:35 am</span>
    </li>
    <li>
        <div class="divider">
            <h6>Today</h6>
        </div>
    </li>

    <li class="repaly">
        <p> yes, tell me</p>
        <span class="time">10:36 am</span>
    </li>
    <li class="repaly">
        <p>yes... on it</p>
        <span class="time">junt now</span>
    </li> -->

</ul>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Fungsi untuk memuat pesan baru
    function loadNewMessages() {
        $.ajax({
            url: "{{ route('gc.load', ['group' => $group->id]) }}",
            type: "GET",
            dataType: "html",
            success: function(response) {
                // Ganti konten div atau elemen lain yang menampilkan pesan
                $("#message-container").html(response);
                console.log("Pesan Diperbarui !");
            }
        });
    }

    // Fungsi untuk memperbarui secara berkala setiap beberapa detik
    function startPolling() {
        setInterval(function() {
            loadNewMessages();
        }, 20000); // Ubah angka ini menjadi waktu refresh dalam milidetik (misalnya, 5000 untuk refresh setiap 5 detik)
    }

    // Panggil fungsi startPolling saat halaman selesai dimuat
    $(document).ready(function() {
        startPolling();
    });
</script>