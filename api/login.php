<?php
require '../includes/config.php';
session_start();

$user = $_POST['user'] ?? '';
$pass = $_POST['pass'] ?? '';

// dummy credentials
if ($user === 'admin' && $pass === 'secret') {
    $_SESSION['user_id'] = 1;
    header('Location: /admin/index.html');
} else {
    echo 'Invalid';
}
?>
