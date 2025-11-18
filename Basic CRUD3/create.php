<?php 
    include 'db.php'; 

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $course = $_POST['course'];
        $year = $_POST['year'];

        mysqli_query($conn, "INSERT INTO students (NAME, COURSE, YEAR) VALUES ('$name', '$course', '$year')");

        header('location: index.php');
    }
?>

<h2>Add Student</h2>

<form action="" method="POST">
    Name: <br>
    <input type="text" name="name" required> <br><br>

    Course: <br>
    <input type="text" name="course" required> <br><br>

    Year: <br>
    <input type="number" name="year" required> <br><br>

    <button type="submit" name="save">Save</button>
</form>

<br>
<a href="index.php"></a>