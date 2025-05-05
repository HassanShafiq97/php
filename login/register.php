
<?php

$conn = new mysqli('localhost', 'root', '', 'login');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password === $cpassword) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO login (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $username, $email, $hash);

        if ($stmt->execute()) {
            echo "<div style='color: green;'> Registration successful!</div>";
        } else {
            echo "<div style='color: red;'> Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div style='color: red;'> Passwords do not match!</div>";
    }
}

$conn->close();

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

	<div class="container border border-5 mt-3">
		<h1 class="text-center fs-3 pt-3">Registeration form</h1>

		<form method="post">
			<div class="mb-3">
				<label for="username" class="form-label">Username:</label>
				<input class="form-control" type="text" name="username">
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email:</label>
				<input class="form-control" type="email" name="email">
			</div>

			<div class="mb-3">
				<label for="password" class="form-label">Password:</label>
				<input class="form-control" type="password" name="password">
			</div>

			<div class="mb-3">
				<label for="cpassword" class="form-label">Conform Password:</label>
				<input class="form-control" type="password" name="cpassword">
				<a href="">forget password</a>
			</div>

			<div class="d-flex mb-3 justify-content-center">
				<button class="btn btn-primary" name="register">Register</button>
			</div>

		</form>

		<p>For Registratione <a href="register.php">register</a></p>
	</div>

</body>
</html>