<?php

header('Content-Type: application/json'); // Typo: Contant-Type ➔ Content-Type

header('Access-Control-Allow-Origin: *'); // Typo: Orgin ➔ Origin

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
// Typo: Contant-Type ➔ Content-Type and X-Requested-with ➔ X-Requested-With (capital W)

$data = json_decode(file_get_contents("php://input"), true);

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

// Your query looks good!
$sql = "INSERT INTO students(name, fname, address, city, state, contact) 
        VALUES ('{$student_name}', '{$student_fname}', '{$student_address}', '{$student_city}', '{$student_state}', '{$student_contact}')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student record Inserted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'No record Inserted.', 'status' => false));
}

?>

