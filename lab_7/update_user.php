<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION["matric"])) {
    header("Location: login.php");
    exit();
}


// Check if matric parameter is provided
if (!isset($_GET["matric"])) {
    echo "Matric number not provided.";
    exit();
}

$matric = $_GET["matric"];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_7";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data based on matric number
$stmt = $conn->prepare("SELECT matric, name, role FROM users WHERE matric = ?");
$stmt->bind_param("s", $matric);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // User found, display update form
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2>Update User</h2>
        <form action="process_update.php" method="post">
            <input type="hidden" name="matric" value="<?php echo $row["matric"]; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" required><br><br>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="Student" <?php if ($row["role"] == 'Student') echo 'selected'; ?>>Student</option>
                <option value="Lecturer" <?php if ($row["role"] == 'Lecturer') echo 'selected'; ?>>Lecturer</option>
            </select><br><br>
            <input type="submit" value="Update">

        </form>
    </body>
    </html>
    <?php
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
?>
