<?php
include 'nav.html';
include "conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $useremail = trim($_POST['useremail']);
    $userpassword = trim($_POST['userpassword']);

    // Basic validation
    if (empty($username) || empty($useremail) || empty($userpassword)) {
        echo "<script>alert('All fields are required.');</script>";
    } elseif (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } else {

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO signupdata (username, useremail, userpassword) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $useremail, $userpassword);

        if ($stmt->execute()) {
            echo "<script>
                alert('Signed Up Successfully 🎉😍\\nNow you can log in and read peacefully 😊📚');
                window.location.href = './index.php'; 
            </script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
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
    <link rel="stylesheet" href="signup.css">
    <title>Bookstore Signup</title>

</head>
<body>
   <center>
   <div class="signup-container">
        <h2>Sign Up</h2>
        <form method="POST">
            <input type="text" placeholder="Username" name="username" required>
            <input type="email" placeholder="Email" name="useremail" required>
            <input type="password" placeholder="Password" name="userpassword" required>
            <input type="submit" name="send" value="Sign Up">
        </form>
        <div class="login-link">
            Already have an account? <a href="./login.php">Login</a>
        </div>
    </div>
   </center>
</body>
</html>