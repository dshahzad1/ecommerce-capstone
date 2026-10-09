<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ecommerce_db';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from inventory
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechGear E-Commerce Store</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px;
            background-color: #f4f6f9;
            color: #333333;
        }
        header {
            margin-bottom: 30px;
        }
        h1 {
            color: #0f172a;
        }
        .subtitle {
            color: #64748b;
        }
        .product-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .product-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 20px;
            width: 280px;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .product-card h3 {
            margin-top: 0;
            color: #1e293b;
        }
        .price {
            color: #0284c7;
            font-weight: bold;
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .stock {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 15px;
        }
        .btn {
            background-color: #0284c7;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
            box-sizing: border-box;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background-color: #0369a1;
        }
    </style>
</head>
<body>

    <header>
        <h1>TechGear E-Commerce Platform</h1>
        <p class="subtitle">Capstone Project: Secure inventory management & checkout simulation.</p>
        <hr style="margin-top: 15px; border: 0; border-top: 1px solid #cbd5e1;">
    </header>

    <main>
        <h2>Available Inventory</h2>
        <div class="product-grid">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product-card">';
                    echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                    echo '<div class="price">$' . number_format($row['price'], 2) . '</div>';
                    echo '<div class="stock">In Stock: ' . $row['stock_quantity'] . ' units</div>';
                    echo '<a href="#" class="btn">Add to Cart</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No products available in inventory right now.</p>";
            }
            $conn->close();
            ?>
        </div>
    </main>

</body>
</html>
