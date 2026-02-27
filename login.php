<?php
session_start(); // Start the session
include 'nav.html';
include "conn.php"; // Include database connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $userpassword = trim($_POST['userpassword']);

    // Basic validation
    if (empty($username) || empty($userpassword)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        // Prepare SQL statement to check username
        $stmt = $conn->prepare("SELECT userid, userpassword FROM signupdata WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if username exists
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $db_password = $row["userpassword"];

            // Compare entered password with database password
            if ($userpassword === $db_password) {
                // Store user session variables
                $_SESSION["userid"] = $row["userid"];
                $_SESSION["username"] = $username;

                echo "<script>
                    alert('Login Successful! 🎉😊');
                    window.location.href = 'index.php'; // Redirect to homepage or dashboard
                </script>";
            } else {
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Username not found. Please sign up first.');</script>";
        }
        $stmt->close();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="userpassword" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <div class="signup-link">
            Don't have an account? <a href="./signup.php">Sign up</a>
        </div>
    </div>
</body>
</html> 