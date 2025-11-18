
<?php
# 1. Database Connection (MySQLi)
$conn = mysqli_connect("localhost", "root", "", "your_database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

# 2. SELECT — Read All Records
$result = mysqli_query($conn, "SELECT * FROM table_name");

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['column_name'];
}

# 3. SELECT — Read Single Record (WHERE id)
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM table_name WHERE id=$id");
$row = mysqli_fetch_assoc($result);

# 4. INSERT — Create New Record
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $course = $_POST['course'];

    $query = "INSERT INTO students (name, course) 
              VALUES ('$name', '$course')";
    
    mysqli_query($conn, $query);
}
# 5. UPDATE — Update Existing Record
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];

    mysqli_query($conn, 
        "UPDATE students SET 
            name='$name',
            course='$course'
        WHERE id=$id"
    );
}
# 6. DELETE — Delete Record
$id = $_GET['delete'];
mysqli_query($conn, "DELETE FROM students WHERE id=$id");

# 7. SEARCH - LIKE Query
$keyword = $_GET['search'];
$result = mysqli_query($conn, 
    "SELECT * FROM students WHERE name LIKE '%$keyword%'"
);

# 8. COUNT Rows Returned
$result = mysqli_query($conn, "SELECT * FROM students");
$count = mysqli_num_rows($result);

# 9. Redirect After Action
header("Location: index.php");
exit;


?>

# 10. Form Required Attribute
<input type="text" name="name" required>

<?php
# 11. PHP Validation (Empty Fields)

if (empty($name) || empty($course)) {
    echo "All fields are required!";
}

# 12. Prevent Errors - Check Query Success
if (mysqli_query($conn, $query)) {
    echo "Success";
} else {
    echo "Error: " . mysqli_error($conn);
}

# 13. Close Database Connection
mysqli_close($conn);


# 15. Fetch Data Using Prepared Statements (Prevent SQL Injection)
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

# 16. Fetch All Records Using Prepared Statements
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['name'];
}
$stmt->close();

# 17. Insert Using Prepared Statements
$stmt = $conn->prepare("INSERT INTO students (name, course) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $course);
$stmt->execute();
$stmt->close();

# 18. Update Using Prepared Statements
$stmt = $conn->prepare("UPDATE students SET name=?, course=? WHERE id=?");
$stmt->bind_param("ssi", $name, $course, $id);
$stmt->execute();
$stmt->close();

# 19. Delete Using Prepared Statements
$stmt = $conn->prepare("DELETE FROM students WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

# 20. Search Using Prepared Statements
$keyword = "%{$_GET['search']}%";
$stmt = $conn->prepare("SELECT * FROM students WHERE name LIKE ?");
$stmt->bind_param("s", $keyword);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['name'];
}
$stmt->close();

?>