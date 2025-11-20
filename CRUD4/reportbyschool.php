<?php
    include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report by School</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="w3-container">
        <h2 class="w3-center">Report by School</h2>
        <table class="w3-table w3-bordered">
            <tr>
                <th>School</th>
                <th>Total Registered</th>
                <th>Total Attended</th>
            </tr>
            <?php
                $result = $conn->query("SELECT school, COUNT(*) as total, SUM(attended) as attended FROM attendees GROUP BY school");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['school']}</td>
                            <td>{$row['total']}</td>
                            <td>{$row['attended']}</td>
                          </tr>";
                }
            ?>
        </table>
        <br>
        <div class="w3-center">
            <a href="index.php" class="w3-button w3-grey">Back to Menu</a>
        </div>
    </div>
</body>
</html>