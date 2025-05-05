<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'login');

if ($conn->connect_error) {
    die('Not connected! ' . $conn->connect_error);
}


$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    
    echo json_encode(array('message' => 'No Record Found'));
}

?>

?>
