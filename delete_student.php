<?php
    include 'db.php';

    // Delete student if 'delete_id' is set
    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $conn->query("DELETE FROM students WHERE id = $id");
        header("Location: delete_student.php"); // Redirect to avoid resubmission
        exit();
    }

    // Fetch all students
    $result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Students</title>
    <style>
        body {   
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            padding: 30px;
        }
        

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007BFF;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }

        a.delete-btn {
            background: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
        }

        a.delete-btn:hover {
            background: #c82333;
        }
        a.button {
            display: inline-block;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        a.button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Delete Students</h2>
         <a href="dashboard.php" class="button">⬅ Back to Dashboard</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Roll #</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['roll_number']; ?></td>
            <td><?= $row['department']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['phone']; ?></td>
            <td><a href="?delete_id=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a></td>
        </tr>
        <?php 
        } 
        ?>
    </table>
</div>

</body>
</html>