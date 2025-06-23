<?php
require_once 'connection.php';
$config = require 'config.php';
$db = Connection::make($config);

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([':id' => $id]);
$user = $stmt->fetch();

if (!$user) {
    die("User tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 92%;
            padding: 10px;
            margin-top: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        small {
            display: none;
            color: red;
            margin-bottom: 10px;
            font-size: 12px;
        }

        button {
            width: 100%;
            background: #28a745;
            color: white;
            border: none;
            padding: 10px;
            margin-top: 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <form action="update_user.php" method="POST">
        <h2>Edit User</h2>
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label>Username</label><br>
        <input type="text" name="username" value="<?php echo $user['username']; ?>"><br><br>
        <label>Email</label><br>
        <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>

</html>