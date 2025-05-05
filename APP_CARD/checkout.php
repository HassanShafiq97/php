<?php
session_start();
include 'db.php';
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2> Checkout</h2>
    <?php
    if (!$cart) {
        echo "<p>Your cart is empty.</p>";
        exit;
    }

    $total = 0;
    foreach ($cart as $id => $qty) {
        $result = $conn->query("SELECT price FROM products WHERE id=$id");
        $row = $result->fetch_assoc();
        $total += $row['price'] * $qty;
    }

    $conn->query("INSERT INTO orders (total) VALUES ($total)");
    $order_id = $conn->insert_id;

    foreach ($cart as $id => $qty) {
        $conn->query("INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $id, $qty)");
    }

    unset($_SESSION['cart']);
    ?>

    <div class="alert alert-success">
        <p>🎉 Order placed successfully! Your Order ID is <strong>#<?= $order_id ?></strong></p>
    </div>
    <a href="card.php" class="btn btn-primary">Back to Shop</a>
</div>
</body>
</html>
