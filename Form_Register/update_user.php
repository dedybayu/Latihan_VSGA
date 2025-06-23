<?php
require_once 'connection.php';
$config = require 'config.php';
$db = Connection::make($config);

if (isset($_POST['update'])) {
    $id       = $_POST['id'];
    $username = $_POST['username'];
    $email    = $_POST['email'];

    $stmt = $db->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id");
    $stmt->execute([
        ':username' => $username,
        ':email'    => $email,
        ':id'       => $id
    ]);

    header("Location: users.php");
    exit;
}
