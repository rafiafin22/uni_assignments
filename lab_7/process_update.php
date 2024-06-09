<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION["matric"])) {
    header("Location: login.php");
    exit();
}


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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST["matric"];
    $name = $_POST["name"];
    $role = $_POST["role"];

    // Update user data in the database
    $stmt = $conn->prepare("UPDATE users SET name = ?, role = ? WHERE matric = ?");
    $stmt->bind_param("sss", $name, $role, $matric);

    if ($stmt->execute()) {
        $_SESSION["message"] = "User updated successfully.";
    } else {
        $_SESSION["message"] = "Error updating user: " . $stmt->error;
    }

    $stmt->close();
}

// Redirect to display_users.php after update
header("Location: display_users.php");
$conn->close();
exit();
?>
