<?php
// Start session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <?php
    // Display error message if set
    if (isset($_SESSION["error"])) {
        echo "<p style='color: red;'>".$_SESSION["error"]."</p>";
        unset($_SESSION["error"]); // Clear the error message
    }
    ?>
    <form action="authenticate.php" method="post">
        <label for="matric">Matric Number:</label>
        <input type="text" id="matric" name="matric" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="registration.html">Register here</a>.</p>
</body>
</html>
