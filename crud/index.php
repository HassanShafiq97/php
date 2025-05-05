<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title></title>
</head>
<body>

	<div class="container-fluid">
		<h1 class="text-center mt-3 mb-3">CRUD APPlICATION</h1>
	</div>

	<div class="container">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Add
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Add Users</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="POST" action="create.php">
							<div class="row">
								<div class="col-6">
									<div class="mb-3">
										<label for="name" class="form-label">Name</label>
										<input type="text" class="form-control" id="name" name="name">
									</div>
								</div>

								<div class="col-6">
									<div class="mb-3">
										<label for="fname" class="form-label">Father Name</label>
										<input type="text" class="form-control" id="fname" name="father_name">
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label for="address" class="form-label">Address</label>
								<textarea class="form-control" id="address" name="address" rows="3"></textarea>
							</div>

							<div class="row">
								<div class="col-4">
									<div class="mb-3">
										<label for="country" class="form-label">Country</label>
										<select class="form-select" id="country" name="country">
											<option selected>Pakistan</option>
										</select>
									</div>
								</div>

								<div class="col-4">
									<div class="mb-3">
										<label for="state" class="form-label">State</label>
										<select class="form-select" id="state" name="state">
											<option selected>Select the state</option>
											<option value="Punjab">Punjab</option>
											<option value="KPK">KPK</option>
											<option value="Sindh">Sindh</option>
											<option value="Balochistan">Balochistan</option>
											<option value="Gilgit Baltistan">Gilgit Baltistan</option>
										</select>
									</div>
								</div>

								<div class="col-4">
									<div class="mb-3">
										<label for="city" class="form-label">City</label>
										<input type="text" class="form-control" id="city" name="city">
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label class="form-label">Gender</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" id="male" value="Male">
									<label class="form-check-label" for="male">Male</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="gender" id="female" value="Female">
									<label class="form-check-label" for="female">Female</label>
								</div>
							</div>

							<div class="mb-3">
								<label class="form-label" for="email">Email</label>
								<input class="form-control" type="email" id="email" name="email">
							</div>

							<div class="d-flex justify-content-center">
								<button type="submit"  name="submit" class="btn btn-primary">Submit</button>
							</div>		
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>







	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th scope="row">Id</th>
					<td>Name</td>
					<td>Father Name</td>
					<td>Address</td>
					<td>Country</td>
					<td>State</td>
					<td>City</td>
					<td>Gender</td>
					<td>email</td>
					<td>Delete</td>
					<td>Update</td>
				</tr>
			</thead>
			<tbody class="table-group-divider">
				<?php
				$conn = new mysqli('localhost', 'root', '', 'crud');
				$stmt = $conn->prepare("SELECT * FROM users");
				$stmt->execute();
				$result = $stmt->get_result();

				while ($rows = $result->fetch_assoc()) {
				?>

				<tr>
					<th><?=htmlspecialchars($rows['id'])?></th>
					<td><?=htmlspecialchars($rows['name'])?></td>
					<td><?=htmlspecialchars($rows['father_name'])?></td>
					<td><?=htmlspecialchars($rows['address'])?></td>
					<td><?=htmlspecialchars($rows['country'])?></td>
					<td><?=htmlspecialchars($rows['state'])?></td>
					<td><?=htmlspecialchars($rows['city'])?></td>
					<td><?=htmlspecialchars($rows['gender'])?></td>
					<td><?=htmlspecialchars($rows['email'])?></td>

					<td>
						<a href="delete.php?id=<?=htmlspecialchars($rows['id'])?>" class="btn btn-danger">Delecte</a>
						
					</td>
				


					<td>
						<a href="update.php?update_id=<?=htmlspecialchars($rows['id'])?>" class="btn btn-success">Update</a>
					</td>

				</tr>
			<?php } ?>
			</tbody>
		</table>

	</div>

	<script src="js/bootstrap.js"></script>



</body>
</html>