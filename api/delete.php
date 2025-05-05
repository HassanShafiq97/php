<?php

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['student_id'];

$conn = new mysqli('localhost', 'root', '', 'login');

if ($conn->connect_error) {
    die('Not connected! ' . $conn->connect_error);
}

$sql = "DELETE FROM students WHERE id = '{$student_id}'"; // wrapped in quotes

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student record Deleted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'No record Deleted.', 'status' => false));
}

?>
