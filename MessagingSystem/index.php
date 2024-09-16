<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'message_web_app');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    if (!empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
        $stmt->bind_param('is', $user_id, $message);
        $stmt->execute();
    }
}

// Function to get chat messages
function getMessages($conn) {
    $result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<div>{$row['message']}</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web App: Chat & Video Meeting</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Web App: Chat & Video Meeting</h2>
        
        <div id="chat-section">
            <div id="messages"></div>
            <input type="text" id="message-input" placeholder="Type your message here...">
            <button id="send-button">Send</button>
        </div>

        <div id="video-section">
            <video id="localVideo" autoplay muted></video>
            <video id="remoteVideo" autoplay></video>
            <button id="start-call">Start Call</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
