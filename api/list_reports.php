<?php
require '../includes/config.php';
header('Content-Type: application/json');

$result = $mysqli->query('SELECT folio, type, status FROM reports ORDER BY id DESC');
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows);
?>
