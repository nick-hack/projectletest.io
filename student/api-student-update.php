<?php

error_reporting(0);

header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');
header('Access-control-Allow-Methods:PUT');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Requested-With');

// Include the necessary files
require_once('../User/decode.php');
require_once('../Config/config.php');

// Get the student ID from the request query parameter
$studentId = $_GET['id'] ?? '';

// Get the raw input from the request
$data = json_decode(file_get_contents("php://input"), true);

// Get the form values
$student_name = $data['sstudent_name'] ?? '';
$age = $data['sage'] ?? '';
$city = $data['scity'] ?? '';
$RollNo = $data['sRollNo'] ?? '';
$mobileno = $data['smobileno'] ?? '';

// Update the student data in the database
$sql = "UPDATE students SET 
            student_name = '{$student_name}',
            age = '{$age}',
            city = '{$city}',
            RollNo = '{$RollNo}',
            mobileno = '{$mobileno}',
            Updateddate = NOW()
        WHERE id = {$studentId}";

if (mysqli_query($conn, $sql)) {
    // Successful update
    $response = array(
        'statusCode' => 200,
        'message' => 'Record updated successfully',
        'data' => array(
            'id' => $studentId,
            'student_name' => $student_name,
            'age' => $age,
            'city' => $city,
            'RollNo' => $RollNo,
            'mobileno' => $mobileno,
            'Updateddate' => date('Y-m-d H:i:s')
        )
    );
} else {
    // Failed to update
    $response = array(
        'statusCode' => 500,
        'message' => 'Failed to update record: ' . $conn->error
    );
}

// Return the response as JSON
echo json_encode($response);
