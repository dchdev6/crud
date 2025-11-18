<?php include "db.php"; ?>

<?php
// Fetch existing data
$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT name, email, course FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    die("Record not found.");
}

// Handle update
if ($_POST) {
    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->bind_param("sssi", $_POST['name'], $_POST['email'], $_POST['course'], $id);
    $stmt->execute();

    header("Location: index.php?page=list");
}
?>

<h2>Edit Student</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $data['email'] ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $data['course'] ?>"><br><br>
    <button>Update</button>
</form>
