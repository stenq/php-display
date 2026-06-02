<!DOCTYPE html>
<html>
<head>
    <title>Modern Mini Chat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin:0;
            font-family: Arial;
            background: linear-gradient(135deg,#0f0f0f,#1a1a2e);
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            color:white;
        }

        .chat {
            width:400px;
            background:rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            padding:20px;
            border-radius:20px;
        }

        .messages {
            height:300px;
            overflow-y:auto;
            margin-bottom:15px;
        }

        .message {
            background:#111;
            padding:10px;
            border-radius:10px;
            margin-bottom:10px;
            position:relative;
        }

        .meta {
            font-size:12px;
            color:#aaa;
        }

        .delete {
            position:absolute;
            right:10px;
            top:10px;
            cursor:pointer;
            color:red;
            font-size:12px;
        }

        input, button {
            padding:10px;
            border:none;
            border-radius:10px;
            margin-bottom:10px;
            width:100%;
        }

        button {
            background:#6c5ce7;
            color:white;
            cursor:pointer;
        }

        button:hover {
            background:#4834d4;
        }
    </style>
</head>
<body>

<div class="chat">
    <h3>Mini Chat</h3>

    <div class="messages" id="messages"></div>

    <input type="text" id="username" placeholder="Your name">
    <input type="text" id="message" placeholder="Your message">
    <button onclick="sendMessage()">Send</button>
</div>

<script>
function fetchMessages() {
    fetch("fetch.php")
        .then(res => res.text())
        .then(data => {
            document.getElementById("messages").innerHTML = data;
        });
}

function sendMessage() {
    let username = document.getElementById("username").value;
    let message = document.getElementById("message").value;

    fetch("send.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "username=" + username + "&message=" + message
    }).then(() => {
        document.getElementById("message").value = "";
        fetchMessages();
    });
}

function deleteMessage(id) {
    fetch("delete.php?id=" + id)
        .then(() => fetchMessages());
}

setInterval(fetchMessages, 2000);
fetchMessages();
</script>

</body>
</html>