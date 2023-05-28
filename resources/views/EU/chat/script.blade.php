<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const pusher = new Pusher('your_app_key', {
        cluster: 'your_app_cluster',
        useTLS: true
    });

    const channel = pusher.subscribe('group-chat.1'); // Replace '1' with actual group ID

    channel.bind('message-sent', function(data) {
        const message = data.message;
        const chatMessages = document.getElementById('chat-messages');
        const messageElement = document.createElement('p');
        messageElement.textContent = message.message;
        chatMessages.appendChild(messageElement);
    });

    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const messageInput = document.getElementById('message-input');
        const message = messageInput.value.trim();
        messageInput.value = '';

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/group-chat/send-message');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('group_id=1&user_id=1&message=' + encodeURIComponent(message)); // Replace '1' with actual group ID and user ID
    });
</script>