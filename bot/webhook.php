<?php
require '../includes/config.php';
$content = file_get_contents('php://input');
$update = json_decode($content, true);

if (!isset($update['message'])) {
    exit;
}

$message = $update['message'];
$text = $message['text'] ?? '';
$chat_id = $message['chat']['id'];

if (stripos($text, 'Attended') === 0) {
    // parse folio from message
    $parts = explode(' ', $text);
    $folio = $parts[1] ?? '';
    if ($folio) {
        $stmt = $mysqli->prepare('UPDATE reports SET status="Attended" WHERE folio=?');
        $stmt->bind_param('s', $folio);
        $stmt->execute();
    }
}
?>
