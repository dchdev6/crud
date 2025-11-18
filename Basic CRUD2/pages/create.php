<?php include "db.php"; ?>

<h2>Add Student</h2>

<?php
if ($_POST) {
    if (!$_POST['name'] || !$_POST['email'] || !$_POST['course']) {
        echo "All fields are required.<br><br>";
    } else {
        $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $_POST['name'], $_POST['email'], $_POST['course']);
        $stmt->execute();

        header("Location: index.php?page=list");
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Course: <input type="text" name="course"><br><br>
    <button>Save</button>
</form>
