<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>Welcome: <?php echo htmlspecialchars($_SESSION['username']); ?></h1></body>
<a href="logout.php">logout</a>
</html>