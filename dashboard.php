<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .header {
            background: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            display: flex;
        }
        .sidebar {
            width: 220px;
            background: #212529;
            color: white;
            height: 100vh;
            padding: 30px 20px;
        }
        .sidebar h3 {
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 15px 0;
            padding: 10px;
            background: #343a40;
            border-radius: 5px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: #007bff;
        }
        .main {
            flex: 1;
            padding: 40px;
        }
        .logout {
            float: right;
            color: white;
            text-decoration: none;
            background: red;
            padding: 8px 14px;
            border-radius: 5px;
            margin-top: -50px;
        }
        img {
            width: 100%;
            max-height: 50%;
            object-fit: cover;
            margin-top: 5%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Well Come <?php echo $_SESSION["username"]; ?></h1>
    <a href="logout.php" class="logout">Logout</a>
</div>

<div class="container">
    <div class="sidebar" >
        <h3>Dashboard</h3>
        <a href="register.php">➕ Add User</a>
        <a href="add_student.php">➕ Add Student</a>
        <a href="view_students.php">📋 View Students</a>
        <a href="edit_student.php">✏️ Edit Student</a>
        <a href="delete_student.php">❌ Delete Student</a>
    </div>
    <div class="main">
        <h2>Student Management System</h2>
        <img src="img/dashimg (2).jpg" alt="Student Image">
    </div>
</div>

</body>
</html>