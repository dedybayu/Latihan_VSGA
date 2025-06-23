<?php
require_once 'connection.php';
$config = require 'config.php';
$db = Connection::make($config);

$users = $db->query("SELECT * FROM users ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
    <style>
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            /* background-color: #007bff; */
            color: white;
            border-radius: 4px;
            margin-right: 5px;
        }

        /* a.edit {
            background-color: #ffc107;
        }

        a.edit:hover {
            background-color: #d39e00;
        } */

        a:hover {
            background-color: #0056b3;
        }

        a.delete {
            background-color: #dc3545;
        }

        a.delete:hover {
            background-color:rgb(145, 27, 39);
        }

        a.tambahUser, a.edit {
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
        }

        a.tambahUser:hover, a.edit:hover {
            background: #1e7e34;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Daftar User</h2>

    <div style="text-align: right; margin: 20px 10%; font-size: 16px;">
        <a href="index.php" class="tambahUser">+
            Tambah User Baru</a>
    </div>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $user['id']; ?>" class="edit">Edit</a>
                        <a href="delete_user.php?id=<?= $user['id']; ?>" class="delete"
                            onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>