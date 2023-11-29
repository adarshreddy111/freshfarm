<?php
// Process the submitted message
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    // Save the message to a file or database
    // (Replace this with your actual logic)

    // Optional: Perform any additional processing or validation here

    // Return a response to the client (e.g., success message)
    echo 'Message sent successfully.';
}
$messages = [
    ['sender' => 'John', 'timestamp' => '2023-07-10 12:05:00', 'content' => 'Hello!'],
    ['sender' => 'Mary', 'timestamp' => '2023-07-10 12:06:30', 'content' => 'Hi John, how can I help you?'],
    // Additional messages...
];

// Display the messages
foreach ($messages as $message) {
    $sender = $message['sender'];
    $timestamp = $message['timestamp'];
    $content = $message['content'];

    echo '<div class="message">';
    echo '<div class="sender">' . $sender . '</div>';
    echo '<div class="timestamp">' . $timestamp . '</div>';
    echo '<div class="content">' . $content . '</div>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Farmers Chat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <style>
        body {
    background-color: #f1f1f1;
    font-family: Arial, sans-serif;
}

.chat-container {
    max-width: 500px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

#chat-display {
    height: 300px;
    padding: 10px;
    overflow-y: scroll;
    background-color: #f9f9f9;
}

.chat-input {
    padding: 10px;
    border-top: 1px solid #ccc;
}

#message-input {
    width: 80%;
    padding: 5px;
    border: none;
    border-radius: 3px;
}

#send-btn {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

#send-btn:hover {
    background-color: #45a049;
}

/* Chat message styling */
.message {
    margin-bottom: 10px;
}

.message .sender {
    font-weight: bold;
    margin-bottom: 5px;
}

.message .timestamp {
    font-size: 0.8em;
    color: #888;
}

.message .content {
    margin-left: 20px;
}
</style>
    <div class="chat-container">{}
        <div id="chat-display">
            <!-- Chat messages will be displayed here -->
        </div>
        <div class="chat-input">
            <input type="text" name="message" id="message-input" placeholder="Type your message..." required autocomplete="off">
            <button type="button" id="send-btn">Send</button>
        </div>
    </div>

</body>
</html>

