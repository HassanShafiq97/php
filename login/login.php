<?php

$conn = new mysqli('localhost', 'root', '', 'login');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Proper placeholder (no quotes around ?)
    $stmt = $conn->prepare("SELECT * FROM login WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();

    // Fetch result
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // You can start a session here if needed
            // session_start();
            // $_SESSION['username'] = $row['username'];
            session_start();
            $_SESSION['username'] = $row['username'];
                        header('Location:welcome.php');
        } else {
            echo "<div style='color: red;'> Incorrect password.</div>";
        }
    } else {
        echo "<div style='color: red;'> No user found with that email.</div>";
    }

    $stmt->close();
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
		<h1 class="text-center fs-3 pt-3">Login Form</h1>

		<form method="post">
			
			<div class="mb-3">
				<label for="email" class="form-label">Email:</label>
				<input class="form-control" type="email" name="email">
			</div>

			<div class="mb-3">
				<label for="password" class="form-label">Password:</label>
				<input class="form-control" type="password" name="password">
			</div>

			<div class="d-flex mb-3 justify-content-center">
				<button class="btn btn-primary" name="login">Login</button>
			</div>

		</form>

		<p>if you already register please <a href="register.php">Regisrtation here</a></p>
	</div>
</body>
</html>