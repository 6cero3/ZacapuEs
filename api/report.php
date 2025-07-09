<?php
require '../includes/config.php';

header('Content-Type: application/json');

$type = $_POST['type'] ?? '';
$anonymous = isset($_POST['anonymous']);
$name = $anonymous ? '' : $_POST['name'] ?? '';
$contact = $anonymous ? '' : $_POST['contact'] ?? '';
$description = $_POST['description'] ?? '';

if (!$type || !$description) {
    echo json_encode(['success' => false, 'error' => 'Missing fields']);
    exit;
}

$folio = 'ZC-' . str_pad(random_int(1, 999999), 6, '0', STR_PAD_LEFT);

$mysqli->prepare('CREATE TABLE IF NOT EXISTS reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    folio VARCHAR(20),
    type VARCHAR(50),
    name VARCHAR(100),
    contact VARCHAR(100),
    description TEXT,
    status VARCHAR(20) DEFAULT "Pending",
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)')->execute();

$stmt = $mysqli->prepare('INSERT INTO reports (folio, type, name, contact, description) VALUES (?, ?, ?, ?, ?)');
$stmt->bind_param('sssss', $folio, $type, $name, $contact, $description);
$stmt->execute();

echo json_encode(['success' => true, 'folio' => $folio]);
?>
