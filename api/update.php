<?php

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$student_id = $data['student_id'];
$student_name = $data['student_name'];
$student_fname = $data['student_fname'];
$student_address = $data['student_address'];
$student_city = $data['student_city'];
$student_state = $data['student_state'];
$student_contact = $data['student_contact'];

$conn = new mysqli('localhost', 'root', '', 'login');

if ($conn->connect_error) {
    die('Not connected! ' . $conn->connect_error);
}

// Corrected SQL query:
$sql = "UPDATE students 
        SET name='{$student_name}', 
            fname='{$student_fname}', 
            address='{$student_address}', 
            city='{$student_city}', 
            state='{$student_state}', 
            contact='{$student_contact}' 
        WHERE id='{$student_id}'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student record Updated.', 'status' => true));
} else {
    echo json_encode(array('message' => 'No record Updated.', 'status' => false));
}

?>
