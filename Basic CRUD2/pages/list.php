<?php include "db.php"; ?>

<h2>Student List</h2>
<a href="index.php?page=create">Add Student</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>

<?php
$stmt = $conn->prepare("SELECT id, name, email, course FROM students");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()):
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['course'] ?></td>
    <td>
        <a href="index.php?page=edit&id=<?= $row['id'] ?>">Edit</a> |
        <a href="index.php?page=delete&id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
