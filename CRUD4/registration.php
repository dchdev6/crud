<?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $school = $_POST['school'];

        $stmt = $conn->prepare("INSERT INTO attendees (name, email, school) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $school);
        $stmt->execute();
        $stmt->close();

        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="w3-container w3-center">
        <h2>Attendee Registration</h2>
        <form action="" method="POST" class="w3-card w3-padding">
            Name: <input type="text" name="name" class="w3-input" required><br><br>
            Email: <input type="email" name="email" class="w3-input" required><br><br>
            School: <input type="text" name="school" class="w3-input" required><br><br>
            <input type="submit" value="Register" class="w3-button w3-blue">
        </form>
        <br>
        <a href="index.php" class="w3-button w3-grey">Back to Menu</a>
    </div>
</body>
</html>