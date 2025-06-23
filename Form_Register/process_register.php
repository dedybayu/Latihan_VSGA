<?php
session_start();
require_once 'connection.php';
$config = require 'config.php';
$db     = Connection::make($config);

if (isset($_POST['register'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $email    = htmlspecialchars(trim($_POST['email']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql  = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $db->prepare($sql);

    try {
        $result = $stmt->execute([
            ':username' => $username,
            ':email'    => $email,
            ':password' => $password,
        ]);

        $_SESSION['success'] = 'Registrasi berhasil!';
        $_SESSION['is_login'] = true;
        header('Location: index.php');
        exit;

    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) { // Duplicate entry
            $_SESSION['error'] = 'Username atau Email sudah digunakan.';
        } else {
            $_SESSION['error'] = 'Terjadi kesalahan: ' . $e->getMessage();
        }

        $_SESSION['old_username'] = $username;
        $_SESSION['old_email']    = $email;

        header('Location: index.php');
        exit;
    }
}
