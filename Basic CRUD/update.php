<?php 
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $stmt = $conn->prepare("UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $course, $id);
        $stmt->execute();
        $stmt->close();

        header("Location: index.php");
        exit();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $student = $result->fetch_assoc();
        $stmt->close();
    } else {
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>
<body>
    <h2>Update Student</h2>

    <form action="" method="POST">
        Name: <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required><br><br>
        Course: <input type="text" name="course" value="<?php echo htmlspecialchars($student['COURSE']); ?>" required><br><br>
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        <input type="submit" value="Update Student">
    </form>
</body>
</html>