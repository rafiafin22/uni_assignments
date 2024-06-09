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

// Delete user based on matric number
$stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
$stmt->bind_param("s", $matric);
$stmt->execute();

echo "User deleted successfully.";

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <p><a href="display_users.php">Go back to users display</a>.</p>
</body>
</html>