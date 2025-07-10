<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    include 'db.php';

    $sql = "SELECT * FROM students ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f7;
            padding: 30px;
        }
        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 12px;
        }
        td {
            padding: 10px;
            text-align: center;
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
    <h2>All Students</h2>
    <a href="dashboard.php" class="button">⬅ Back to Dashboard</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll Number</th>
                <th>Department</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['roll_number']) ?></td>
                        <td><?= htmlspecialchars($row['department']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= $row['created_at'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7">No students found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>