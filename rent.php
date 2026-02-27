<?php
include "nav.html"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="rent.css">
</head>
<body>
    <div class="book_title">
    <h1 >Book Details</h1>
    <img src="./download.jpeg" alt="">

    </div>
    <div class="book-details">
        <p><strong>Author:</strong> Juan Gómez Jurado</p>
        <p><strong>Pages:</strong> 518</p>
        <p><strong>Publisher:</strong> House of Books Publishing & Distribution</p>
        <p><strong>Book Size:</strong> 14.5 * 21.5</p>
        <p><strong>Available at:</strong> JimCamp Branch, Shiraz Branch, Loran</p>
        <p><strong>ISBN:</strong> 978979613857</p>
        <p><strong>Categories:</strong> World Literature -- Thriller Literature</p>
        <p><strong>Short Link:</strong> <a href="">Click here</a></p>
    </div>
    <div class="book-description">
        <h2>Description</h2>
        <p>El Paciente is a thriller novel by Juan Gómez Jurado.
             The book was first published in 2014 and has since been
              translated into multiple languages. The story follows the
               life of a psychiatrist named Sonia Bonet who is accused 
               of murdering her husband. The novel explores themes of
               love, betrayal, and the complexities of the human mind.
            </p>
            </div>
    <div class="purchase-section">
        <label for="quantity">Quantity:</label>
        <div class="quantity-control">
            <button>-</button>
            <input type="number" id="quantity" value="1" min="1">
            <button>+</button>
        </div>
        <button class="like-button">Like 0</button>
        <button class="share-button">Share 0</button>
        <button class="add-to-cart">Add to Cart</button>
        <button class="add-to-favorites">Add to Favorites</button>
    </div>
    
</body>
</html>