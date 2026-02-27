<?php
include "nav.html";
include "conn.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookcover = trim($_POST['bookcover']);
    $bookname = trim($_POST['bookname']);
    $bookcategory = trim($_POST['bookcategory']);
    $bookauthor = trim($_POST['bookauthor']);
    $bookdescription = trim($_POST['bookdescription']);
    $bookduration = trim($_POST['bookduration']);
    $bookprice = trim($_POST['bookprice']);


    // Basic validation
    if (empty($bookcover) || empty($bookname) || empty($bookcategory) || empty($bookauthor)
    || empty($bookdescription)|| empty($bookduration)|| empty($bookprice)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO book
         (bookcover, bookname, bookcategory, bookauthor, bookdescription, bookduration, bookprice) 
         VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $bookcover, $bookname,
         $bookcategory, $bookauthor, $bookdescription, $bookduration, $bookprice);

        if ($stmt->execute()) {
            echo "<script>
                alert('Book added Successfully 🎉😍\\nNow you can read peacefully 😊📚');
                window.location.href = './renting.php'; 
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
    <link rel="stylesheet" href="add.css">
    <title>Bookstore Signup</title>

</head>
<body>
   <center>
   <div class="signup-container">
        <h2>Add a Book</h2>
        <form method="POST">
            <input type="text" placeholder="Book Cover" name="bookcover" required>
            <input type="text" placeholder="Book Name" name="bookname" required>
            <input type="text" placeholder="Category" name="bookcategory" required>
            <input type="text" placeholder="Book Author" name="bookauthor" required>
            <input type="text" placeholder="Description" name="bookdescription" required>
            <input type="text" placeholder="Rental duration" name="bookduration" required>
            <input type="text" placeholder="Price" name="bookprice" required>
            <input type="submit" name="add" value="Add Book">
        </form>
        
    </div>
   </center>
</body>
</html>