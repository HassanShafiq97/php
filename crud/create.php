
<?php

$conn = new mysqli('localhost', 'root', '', 'crud');

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$father = $_POST['father_name'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];

	$stmt = $conn->prepare("INSERT INTO users (name, father_name, address, country, state, city, gender, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param('ssssssss', $name, $father, $address, $country, $state, $city, $gender, $email);
	$stmt->execute();

	header("Location: index.php");
    exit;

}

?>
