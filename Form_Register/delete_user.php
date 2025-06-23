<?php
require_once 'connection.php';
$config = require 'config.php';
$db = Connection::make($config);

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute([':id' => $id]);
}

header("Location: users.php");
exit;
