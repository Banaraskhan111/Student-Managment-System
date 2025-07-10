<?php
    // session_start();
    include 'db.php';

    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $conn->real_escape_string($_POST["email"]);
        $password = $_POST["password"];

        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["user"] = $row["username"];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid Password!";
            }
        } else {
            $error = "User not found!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | Student Management</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            width: 300px;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 7px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background: #007bff;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <?php if ($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>