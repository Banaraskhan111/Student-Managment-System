<?php
include 'db.php';

// Handle update form submission
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $roll = $_POST['roll_number'];
    $dept = $_POST['department'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET 
            name='$name', 
            roll_number='$roll', 
            department='$dept', 
            email='$email', 
            phone='$phone' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: edit_student.php");
        exit();
    } else {
        echo "Error updating student: " . $conn->error;
    }
}

// If editing
$edit = false;
if (isset($_GET['edit_id'])) {
    $edit = true;
    $id = $_GET['edit_id'];
    $res = $conn->query("SELECT * FROM students WHERE id = $id");
    $data = $res->fetch_assoc();
}

// Fetch all students
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Students</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            padding: 30px;
        }

        .container {
            max-width: 950px;
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
            margin-top: 30px;
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

        a.edit-btn {
            background: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
        }

        a.edit-btn:hover {
            background: #218838;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .form-box {
            background: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
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
    <h2>Edit Students</h2>
        <a href="dashboard.php" class="button">⬅ Back to Dashboard</a>
    <?php if ($edit): ?>
    <div class="form-box">
        <form method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label>Name:</label>
            <input type="text" name="name" value="<?= $data['name'] ?>" required>

            <label>Roll Number:</label>
            <input type="text" name="roll_number" value="<?= $data['roll_number'] ?>" required>

            <label>Department:</label>
            <input type="text" name="department" value="<?= $data['department'] ?>">

            <label>Email:</label>
            <input type="email" name="email" value="<?= $data['email'] ?>">

            <label>Phone:</label>
            <input type="text" name="phone" value="<?= $data['phone'] ?>">

            <button type="submit" name="update">Update Student</button>
        </form>
    </div>
    <?php endif; ?>

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
            <td><a href="?edit_id=<?= $row['id']; ?>" class="edit-btn">Edit</a></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>