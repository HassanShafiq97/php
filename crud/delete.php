<?php
$conn = new mysqli('localhost', 'root', '', 'crud');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    
    header("Location: index.php");
    exit;
}
?>
