<?php
    include 'db.php';

    $winner = null;
    if (isset($_POST['draw'])) {
        $result = $conn->query("SELECT * FROM attendees WHERE attended = 1 ORDER BY RAND() LIMIT 1");
        if ($result->num_rows > 0) {
            $winner = $result->fetch_assoc();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="w3-container w3-center">
        <h2>Raffle Draw</h2>
        <form action="" method="POST">
            <input type="submit" name="draw" value="Draw Winner" class="w3-button w3-red w3-large">
        </form>
        <br>
        <?php if ($winner): ?>
            <div class="w3-card w3-padding w3-yellow">
                <h3>Winner!</h3>
                <p>Name: <?php echo $winner['name']; ?></p>
                <p>Email: <?php echo $winner['email']; ?></p>
                <p>School: <?php echo $winner['school']; ?></p>
            </div>
        <?php endif; ?>
        <br>
        <a href="index.php" class="w3-button w3-grey">Back to Menu</a>
    </div>
</body>
</html>