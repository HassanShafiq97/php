
<?php 
session_start();
include 'db.php';

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
		<h1 class="fs-4 text-center fst-italic my-3">Card Application</h1>
	</div>

	<div class="container">
		<div class="row">
			<?php

			$stmt = $conn->query('SELECT * FROM products');
			while ($rows = $stmt->fetch_assoc()) {	
				?>
				<div class="col-4">
					<div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title"><?= $rows['name'] ?></h5>
							<p>Price:<?= $rows['price'] ?></p>
							<div class="d-flex justify-content-center">
								<a href="add-to-card.php?id=<?= $rows['id'] ?>" class="btn btn-primary">Add to card</a>
							</div>

						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<div class="container my-3">
		<a href="viewCard.php" class="btn btn-success">View Cart</a>
	</div>
</body>
</html>