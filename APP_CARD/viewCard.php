<?php
session_start();
include 'db.php';
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title></title>
</head>
<body>

	<div class="container">
		<h2>Your Shopping Cart</h2>
		<?php if ($cart): ?>
		</div>

		<div class="container">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Product</th>
						<th scope="col">Price</th>
						<th scope="col">Quantity</th>
						<th scope="col">Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$total = 0;
					foreach ($cart as $id => $qty): 
						$result = $conn->query("SELECT * FROM products WHERE id=$id");
						$product = $result->fetch_assoc();
						$subtotal = $product['price'] * $qty;
						$total+=$subtotal;
						?>
						<tr>
							<th><?= $product['name'] ?></th>
							<td><?= $product['price'] ?></td>
							<td><?= $qty ?></td>
							<td><?= $subtotal ?></td>
						</tr>
					<?php endforeach; ?> 
				</tbody>
			</table>
			<h4>Total: $<?= $total ?></h4>
			<a href="checkout.php" class="btn btn-success">Checkout</a>
			<a href="card.php" class="btn btn-secondary">Continue Shopping</a>
		<?php else: ?>
			<p>Your cart is empty.</p>
			<a href="card.php" class="btn btn-primary">Back to Shop</a>
		<?php endif; ?>	
	</div>


</body>
</html>