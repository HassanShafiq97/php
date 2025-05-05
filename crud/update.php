
<?php
$conn = new mysqli('localhost', 'root', '', 'crud');

$users = null;
if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $users = $result->fetch_assoc();
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['update_id'];
    $name = $_POST['name'];
    $father = $_POST['father_name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET name=?, father_name=?, address=?, country=?, state=?, city=?, gender=?, email=? WHERE id=?");
    $stmt->bind_param('ssssssssi', $name, $father, $address, $country, $state, $city, $gender, $email, $id);
    $stmt->execute();
    header("Location: index.php"); 
    exit;
}


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
		<h1 class="mt-3 text-center">Update Users</h1>
		<form method="POST">
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" value="<?= isset($users['name']) ? htmlspecialchars($users['name']) : '' ?>" class="form-control" id="name" name="name">
			</div>

			<div class="mb-3">
				<label for="fname" class="form-label">Father Name</label>
				<input type="text" value="<?= isset($users['father_name']) ? htmlspecialchars($users['father_name']) : '' ?>" class="form-control" id="fname" name="father_name">
			</div>
			<div class="mb-3">
				<label for="address" class="form-label">Address</label>
				<textarea class="form-control" id="address" name="address" rows="3"><?= isset($users['address']) ? htmlspecialchars($users['address']) : '' ?></textarea>
			</div>
			<div class="mb-3">
				<label for="country" class="form-label">Country</label>
				<select class="form-select" id="country" name="country" value="<?= isset($users['country']) ? htmlspecialchars($users['country']) : '' ?>">
					<option selected >Pakistan</option>
				</select>
			</div>

			<div class="mb-3">
				<label for="state" class="form-label">State</label>
				<select class="form-select" id="state" name="state">
					<option selected>Select the state</option>
					<option value="Punjab" <?= (isset($users['state']) && $users['state'] == 'Punjab') ? 'selected' : '' ?>>Punjab</option>
					<option value="KPK">KPK</option>
					<option value="Sindh">Sindh</option>
					<option value="Balochistan">Balochistan</option>
					<option value="Gilgit Baltistan">Gilgit Baltistan</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="city" class="form-label">City</label>
				<input type="text" class="form-control" id="city" name="city" value="<?= isset($users['city']) ? htmlspecialchars($users['city']) : '' ?>">
			</div>

			<div class="mb-3">
				<label class="form-label">Gender</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?= (isset($users['gender']) && $users['gender'] == 'Male') ? 'checked' : '' ?>>
					<label class="form-check-label" for="male">Male</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?= (isset($users['gender']) && $users['gender'] == 'Female') ? 'checked' : '' ?>>
					<label class="form-check-label" for="female">Female</label>
				</div>
			</div>
			<div class="mb-3">
				<label class="form-label" for="email">Email</label>
				<input class="form-control" type="email" id="email" name="email" value="<?= isset($users['email']) ? htmlspecialchars($users['email']) : '' ?>">
			</div>

			<div class="d-flex justify-content-center">
				<button type="submit"  name="update" class="btn btn-primary">Update</button>
			</div>


		</form>
	</div>
</body>
</html>