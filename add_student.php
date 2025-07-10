<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $roll_number = $conn->real_escape_string($_POST['roll_number']);
    $department = $conn->real_escape_string($_POST['department']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $sql = "INSERT INTO students (name, roll_number, department, email, phone)
            VALUES ('$name', '$roll_number', '$department', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
        }
        .form-container {
            width: 500px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New Student</h2>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Roll Number:</label>
        <input type="text" name="roll_number" required>

        <label>Department:</label>
        <input type="text" name="department">

        <label>Email:</label>
        <input type="email" name="email">

        <label>Phone:</label>
        <input type="text" name="phone">

        <button type="submit">Add Student</button>
    </form>

    <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>