<!-- resources/views/chat.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Chat Customer Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        .chat-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .chat-message {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container chat-container">
        <h1>Chat Customer Service</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Pesan</div>
                    <div class="card-body" id="message-container">
                        <!-- Pesan-pesan akan ditampilkan di sini -->
                    </div>
                    <div class="card-footer">
                        <form id="chat-form">
                            <div class="form-group">
                                <textarea class="form-control" id="message" rows="3" placeholder="Ketik pesan..."></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>
    <script>
        $(document).ready(function() {
            var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
                cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
                encrypted: true
            });

            var channel = pusher.subscribe('chat-channel');

            channel.bind('new-message', function(data) {
                var senderId = data.sender_id;
                var receiverId = data.receiver_id;
                var message = data.message;

                // Cek jika pesan ditampilkan di halaman yang sesuai dengan pengirim atau penerima
                if (senderId == {{ Auth::id() }} || receiverId == {{ Auth::id() }}) {
                    var messageClass = (senderId == {{ Auth::id() }}) ? 'text-right' : 'text-left';
                    var messageHtml = '<div class="chat-message ' + messageClass + '">' + message + '</div>';

                    $('#message-container').append(messageHtml);
                }
            });

            // Kirim pesan saat form dikirim
            $('#chat-form').submit(function(e) {
                e.preventDefault();

                var message = $('#message').val();

                $.ajax({
                    url: '{{ route("chat.send") }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        receiver_id: RECEIVER_ID, // Ganti dengan id penerima
                        message: message
                    },
                    success: function(response) {
                        $('#message').val('');
                    }
                });
            });
        });
    </script>
</body>
</html>
