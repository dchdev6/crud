<?php
    include 'db.php';

    $total_registered = $conn->query("SELECT COUNT(*) as count FROM attendees")->fetch_assoc()['count'];
    $total_attended = $conn->query("SELECT COUNT(*) as count FROM attendees WHERE attended = 1")->fetch_assoc()['count'];
    $total_schools = $conn->query("SELECT COUNT(DISTINCT school) as count FROM attendees")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Summary</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="w3-container w3-center">
        <h2>Report Summary</h2>
        <div class="w3-card w3-padding">
            <p>Total Registered: <?php echo $total_registered; ?></p>
            <p>Total Attended: <?php echo $total_attended; ?></p>
            <p>Total Schools: <?php echo $total_schools; ?></p>
        </div>
        <br>
        <a href="index.php" class="w3-button w3-grey">Back to Menu</a>
    </div>
</body>
</html>