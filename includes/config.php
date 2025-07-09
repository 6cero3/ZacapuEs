<?php
$DB_HOST = 'localhost';
$DB_USER = 'username';
$DB_PASS = 'password';
$DB_NAME = 'zacapu';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_error);
}
?>
