<?php
session_start();

require_once 'connection.php';
$config = require 'config.php';
$db     = Connection::make($config);

$targetDir = "file/";
$originalName = basename($_FILES["fileToUpload"]["name"]);
$targetFile = $targetDir . uniqid() . '_' . $originalName;

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    try {
        $stmt = $db->prepare("INSERT INTO files (file_path) VALUES (:file_path)");
        $stmt->execute(['file_path' => $targetFile]);

        echo "✅ File berhasil diupload dan path disimpan ke database.<br>";
        echo "🗂 Path disimpan: <code>" . htmlspecialchars($targetFile) . "</code>";
    } catch (PDOException $e) {
        echo "❌ Gagal menyimpan ke database: " . $e->getMessage();
    }
} else {
    echo "❌ Maaf, terjadi kesalahan saat mengupload file.";
}
?>
