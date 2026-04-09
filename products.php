<?php

// Sample products array
$products = [
    ['id' => 1, 'name' => 'Product 1', 'category' => 'Category A', 'price' => 10.99],
    ['id' => 2, 'name' => 'Product 2', 'category' => 'Category B', 'price' => 12.99],
    ['id' => 3, 'name' => 'Product 3', 'category' => 'Category A', 'price' => 15.99],
    ['id' => 4, 'name' => 'Product 4', 'category' => 'Category C', 'price' => 20.00],
];

// Function to search products
function searchProducts($searchTerm) {
    global $products;
    return array_filter($products, function($product) use ($searchTerm) {
        return stripos($product['name'], $searchTerm) !== false;
    });
}

// Function to filter products by category
function filterByCategory($category) {
    global $products;
    return array_filter($products, function($product) use ($category) {
        return $product['category'] === $category;
    });
}

// Handling requests
$filteredProducts = $products;
if (isset($_GET['search'])) {
    $filteredProducts = searchProducts($_GET['search']);
} elseif (isset($_GET['category'])) {
    $filteredProducts = filterByCategory($_GET['category']);
}

// HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
</head>
<body>
    <h1>Product Listing</h1>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search products..." />
        <button type="submit">Search</button>
        <select name="category">
            <option value="">All Categories</option>
            <option value="Category A">Category A</option>
            <option value="Category B">Category B</option>
            <option value="Category C">Category C</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <ul>
        <?php foreach ($filteredProducts as $product) : ?>
            <li>
                <h2><?php echo $product['name']; ?></h2>
                <p>Category: <?php echo $product['category']; ?></p>
                <p>Price: $<?php echo $product['price']; ?></p>
                <button>Add to Cart</button>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>