<?php
// index.php

// Database connection
$host = 'localhost'; // Your database host
db   = 'your_database'; // Your database name
$user = 'your_username'; // Your database username
$pass = 'your_password'; // Your database password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Fetch featured products
$stmt = $pdo->query('SELECT * FROM products WHERE featured = 1 LIMIT 4');
$products = $stmt->fetchAll();

// Simple cart functionality example
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    // Logic to add product to cart
    // This is just a placeholder for demonstration 
    echo "Product added to cart!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
</head>
<body>
    <header>
        <div class="hero">
            <h1>Welcome to Our Store!</h1>
            <p>Your one-stop shop for amazing products.</p>
        </div>
    </header>
    <main>
        <h2>Featured Products</h2>
        <div class="products">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <form method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>
