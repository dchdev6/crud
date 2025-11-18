<?php 
    include 'db.php';

    $id = $_GET['id'];
    
    // Get Existing Data
    $result = mysqli_query($conn, "SELECT * FROM students WHERE ID=$id");
    $student = mysqli_fetch_assoc($result);

    // UPDATE
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $year = $_POST['year'];

        mysqli_query($conn, "UPDATE students SET NAME='$name', COURSE='$course', YEAR='$year' WHERE ID=$id");

        header('location: index.php');
    }
?>

<h2>Edit Student</h2>

<form action="" method="POST">
    Name: <br>
    <input type="text" name="name" value="<?= $student['NAME'] ?>" required> <br><br>

    Course: <br>
    <input type="text" name="course" value="<?= $student['COURSE'] ?>" required> <br><br>

    Year: <br>
    <input type="number" name="year" value="<?= $student['YEAR'] ?>" required> <br><br>

    <button type="submit" name="update">Update</button>
</form>

<br>
<a href="index.php"></a>