<?php
// Start session
session_start();

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

// Validate login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST["matric"];
    $password = $_POST["password"];
    
    // Check if user exists
    $stmt = $conn->prepare("SELECT matric, name, role, password FROM users WHERE matric = ?");
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Authentication successful, redirect to display_users.php
            $_SESSION["matric"] = $row["matric"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["role"] = $row["role"];
            header("Location: display_users.php");
            exit();
        } else {
            // Incorrect password
            $_SESSION["error"] = "Incorrect password.";
            header("Location: login.php");
            exit();
        }
    } else {
        // User does not exist
        $_SESSION["error"] = "User does not exist.";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
