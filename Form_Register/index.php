<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Register</title>
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
    <form id="registerForm" action="process_register.php" method="POST" novalidate>
        <h2>Register</h2>
        <input type="text" name="username" id="username" placeholder="Username"
            value="<?php echo $_SESSION['old_username'] ?? '' ?>">
        <?php unset($_SESSION['old_username']); ?>

        <small id="usernameError"></small>

        <?php if (isset($_SESSION['error'])): ?>
            <div style="color: red; font-size: 13px; margin-bottom: 10px;">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div style="color: green; font-size: 13px; margin-bottom: 10px;">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <input type="email" name="email" id="email" placeholder="Email"
            value="<?php echo $_SESSION['old_email'] ?? '' ?>">
        <?php unset($_SESSION['old_email']); ?>
        <small id="emailError"></small>


        <input type="password" name="password" id="password" placeholder="Password">
        <small id="passwordError"></small>

        <button type="submit" name="register">Daftar</button>
    </form>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function (e) {
            let isValid = true;

            const username = document.getElementById('username');
            const email = document.getElementById('email');
            const password = document.getElementById('password');

            const usernameError = document.getElementById('usernameError');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');

            // Reset error display
            usernameError.style.display = 'none';
            emailError.style.display = 'none';
            passwordError.style.display = 'none';

            // Username validation
            if (username.value.trim() === '') {
                usernameError.textContent = 'Username Harus Diisi';
                usernameError.style.display = 'block';
                isValid = false;
            }

            // Email validation
            if (email.value.trim() === '') {
                emailError.textContent = 'Email Harus Diisi';
                emailError.style.display = 'block';
                isValid = false;
            }

            // Email harus valid
            if (!email.value.includes('@')) {
                emailError.textContent = 'Email Harus Valid';
                emailError.style.display = 'block';
                isValid = false;
            }

            // Password validation
            if (password.value.trim() === '') {
                passwordError.textContent = 'Password Harus Diisi';
                passwordError.style.display = 'block';
                isValid = false;
            }

            // Password minimal 8 karakter
            if (password.value.length < 8) {
                passwordError.textContent = 'Password Minimal 8 Karakter';
                passwordError.style.display = 'block';
                isValid = false;
            }

            // Prevent form submission if any input is invalid
            if (!isValid) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>