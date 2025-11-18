<?php
    include 'db.php';

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM students WHERE id=$id");
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    
</body>
</html>
<h2>Students List</h2>
<a href="create.php">Add Student</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Year</th>
        <th>Action</th>
    </tr>
<?php 
$result = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_assoc($result)):
?>
    <tr>
        <td><?= $row['ID'] ?></td>
        <td><?= $row['NAME'] ?></td>
        <td><?= $row['COURSE'] ?></td>
        <td><?= $row['YEAR'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['ID'] ?>">Edit</a>
            <a href="index.php?delete=<?= $row['ID'] ?>" onclick="return confirm('Delete?');">Delete</a>
        </td>
    </tr>
<?php endwhile; ?>
</table>