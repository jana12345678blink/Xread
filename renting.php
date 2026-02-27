<?php
include 'nav.html';
include "conn.php";
$sql = "SELECT * FROM book ORDER BY bookid DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Rental Page</title>
  <link rel="stylesheet" href="./renting.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  
</head>
<body>
  <div class="container">
    <h1>Rent Your Favorite Books</h1>
    <div class="books">
      
      <div class="container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="book-card">
                <img src="<?php echo $row['bookcover']; ?>" alt="Book Cover">
                <h3><?php echo $row['bookname']; ?></h3>
                <p><strong>Category:</strong> <?php echo $row['bookcategory']; ?></p>
                <p><strong>Author:</strong> <?php echo $row['bookauthor']; ?></p>
                <p><strong>Description:</strong> <?php echo $row['bookdescription']; ?></p>
                <p><strong>Duration:</strong> <?php echo $row['bookduration']; ?></p>
                <p><strong>Price:</strong> $<?php echo $row['bookprice']; ?></p>
                <a href="#" class="rent-btn">Rent Now</a>
                <button class="rent-icon" name='${"bookname"}'><i class="fa-regular fa-heart"></i></button>

            </div>
        <?php } ?>
    </div>
    </div>
    <button class="add-btn"><a href="./add.php">Add a Book</a></button>

  </div>
</body>
</html>
