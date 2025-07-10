<?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $conn->real_escape_string($_POST["username"]);
        $email = $conn->real_escape_string($_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, email, password) 
                VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert(' Registration Successful!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }
        .container {
            width: 400px;
            margin: 80px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 15px;
            margin-top: 3%;
            margin-left: 30%;
        }
        a.button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Registration</h2>
    <form action="" method="post">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Register</button>
        <a href="dashboard.php" class="button">⬅ Back to Dashboard</a>
    </form>
</div>

</body>
</html>