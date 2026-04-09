<?php
// product-detail.php

echo "<h1>Product Detail Page</h1>";

echo "<div class='product-images'>";
for ($i = 1; $i <= 3; $i++) {
    echo "<img src='image$i.jpg' alt='Product Image $i' />";
}

echo "</div>";

echo "<div class='product-info'>";
    echo "<h2>Product Title</h2>";
    echo "<p>Description of the product goes here...</p>";
    echo "<h3>Price: $99.99</h3>";

echo "</div>";

echo "<div class='product-reviews'>";
    echo "<h4>Customer Reviews</h4>";
    echo "<p>Review 1: Great product!</p>";
    echo "<p>Review 2: Very satisfied!</p>";

echo "</div>";

echo "<div class='add-to-cart'>";
    echo "<label for='quantity'>Quantity:</label>";
    echo "<input type='number' id='quantity' name='quantity' min='1' value='1' />";
    echo "<button>Add to Cart</button>";

echo "</div>";
?>