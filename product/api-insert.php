<?php
// Hide PHP error messages
error_reporting(0);

// Set response headers
header('Content-Type: application/json');
header('Access-control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With');

// Retrieve data from the request body
$data = json_decode(file_get_contents("php://input"), true);

// Validate form data
if (empty($data['sname'])) {
    // Return error message and status code 400
    echo json_encode(array('Status massage' => 'Student name is required', 'status Code' => 400));
    exit;
}

if (empty($data['sage'])) {
    // Return error message and status code 400
    echo json_encode(array('Status massage' => 'Student age is required', 'status Code' => 400));
    exit;
}

if (empty($data['scity'])) {
    // Return error message and status code 400
    echo json_encode(array('Status massage' => 'City is required', 'status Code' => 400));
    exit;
}

if (empty($data['sRollNo'])) {
    // Return error message and status code 400
    echo json_encode(array('Status massage' => 'Roll number is required', 'status Code' => 400));
    exit;
}

if (empty($data['smobileno'])) {
    // Return error message and status code 400
    echo json_encode(array('Status massage' => 'Mobile number is required', 'status Code' => 400));
    exit;
}

// Sanitize form data
$name = filter_var($data['sname'], FILTER_SANITIZE_STRING);
$age = filter_var($data['sage'], FILTER_SANITIZE_NUMBER_INT);
$city = filter_var($data['scity'], FILTER_SANITIZE_STRING);
$RollNo = filter_var($data['sRollNo'], FILTER_SANITIZE_STRING);
$mobileno = filter_var($data['smobileno'], FILTER_SANITIZE_STRING);

// Include database connection configuration file
include_once('../Config/config.php');

// Insert data into the database
$sql = "INSERT INTO students(student_name, age, city, RollNo, mobileno, CreatedDate, IsDelete) VALUES ('{$name}', {$age}, '{$city}', '{$RollNo}', '{$mobileno}', now(), 'false')";
if (mysqli_query($conn, $sql)) {
    // Return success message and status code 200
    echo json_encode(array('Status massage' => 'Record Inserted Successfully', 'status Code' => 200));
} else {
    // Return error message and status code 400
    echo json_encode(array('Status massage' => 'Record Not Inserted', 'status Code' => 400));
}
