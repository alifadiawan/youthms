<div class="send-box">
    <form action="{{route('gc.send')}}" method="post" id="message-form">
        @csrf
        <input type="text" class="form-control" name="message" id="message-input" aria-label="message…"
            placeholder="Write message…">
        <input type="hidden" name="group_id" value="{{$group->id}}">
        <button type="button" id="send-button"><i class="fa fa-paper-plane" aria-hidden="true"></i>
            Send</button>
    </form>
{{-- 
    <div class="send-btns">
        <div class="attach">
            <div class="button-wrapper">
                <span class="label">
                    <img class="img-fluid"
                        src="https://mehedihtml.com/chatbox/assets/img/upload.svg"
                        alt="image title"> attached file
                </span><input type="file" name="upload" id="upload"
                    class="upload-box" placeholder="Upload File"
                    aria-label="Upload File">
            </div>

        </div>
    </div> --}}

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#send-button').click(function() {
        var message = $('#message-input').val();
        var groupId = $('input[name="group_id"]').val();
        var csrfToken = $('input[name="_token"]').val();

        $.ajax({
            url: '/group-chat/send-message', // Ubah URL sesuai dengan rute di backend Anda
            type: 'POST',
            data: {
                _token: csrfToken,
                message: message,
                group_id: groupId
            },
            dataType:"json",
            success: function(response) {
                // Berhasil mengirim pesan, lakukan tindakan yang diperlukan (misalnya hapus isi input)
                $('#message-input').val('');
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
                console.log("Pesan Terkirim !");
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>