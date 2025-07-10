<?php
    $host = "127.0.0.1";
    $user = "root";
    $password = "987654321";
    $dbname = "student_management_system";

    // Connect to MySQL
    $conn = new mysqli($host, $user, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS `$dbname`";
    if ($conn->query($sql) !== TRUE) {
        die("Error creating database: " . $conn->error);
    }

    // Select database
    $conn->close();
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed after selecting DB: " . $conn->connect_error);
    }

    // Create 'user' table
    $sql_users = "CREATE TABLE IF NOT EXISTS user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($sql_users);

    // Create 'students' table
    $sql_students = "CREATE TABLE IF NOT EXISTS students (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        roll_number VARCHAR(100) NOT NULL UNIQUE,
        department VARCHAR(100),
        email VARCHAR(100),
        phone VARCHAR(20),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->query($sql_students);
?>
