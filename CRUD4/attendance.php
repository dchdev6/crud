<?php
    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['attendee_id'])) {
        $attendee_id = $_POST['attendee_id'];
        $stmt = $conn->prepare("UPDATE attendees SET attended = 1 WHERE id = ?");
        $stmt->bind_param("i", $attendee_id);
        $stmt->execute();
        $stmt->close();
        header("Location: attendance.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="w3-container">
        <h2 class="w3-center">Mark Attendance</h2>
        <table class="w3-table w3-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>School</th>
                <th>Attended</th>
                <th>Action</th>
            </tr>
            <?php
                $result = $conn->query("SELECT * FROM attendees");
                while ($row = $result->fetch_assoc()) {
                    $attended = $row['attended'] ? 'Yes' : 'No';
                    $button = $row['attended'] ? '' : '<form action="" method="POST" style="display:inline;"><input type="hidden" name="attendee_id" value="' . $row['id'] . '"><input type="submit" value="Mark Present" class="w3-button w3-green w3-small"></form>';
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['school']}</td>
                            <td>$attended</td>
                            <td>$button</td>
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