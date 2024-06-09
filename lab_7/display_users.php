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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .message {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #e0ffe0;
            color: #333;
        }
    </style>
</head>
<body>
    <h2>User Information</h2>

    <?php
    // Display message if set
    if (isset($_SESSION["message"])) {
        echo "<p class='message'>" . $_SESSION["message"] . "</p>";
        unset($_SESSION["message"]);
    }

    // Fetch data from users table
    $sql = "SELECT matric, name, role FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display data in a table
        echo "<table>
                <tr>
                    <th>Matric</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["matric"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["role"]."</td>
                    <td>
                        <a href='update_user.php?matric=".$row["matric"]."'>Update</a>
                        <a href='delete_user.php?matric=".$row["matric"]."' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found.</p>";
	echo "<p><a href='registration.html'>Go back to registration page</a></p>";
    }

    $conn->close();
    ?>
</body>
</html>
