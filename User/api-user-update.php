<?php

// error_reporting(0);

// header('Content-Type: application/json');
// header('Access-control-Allow-Origin:*');
// header('Access-control-Allow-Methods:PUT');
// header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,
// Authorization,X-Requested-With'); // all allow headers files in inserted

// Include the necessary files
require_once('../User/decode.php');
require_once('../Config/config.php');

// Get the raw input from the request
// $input = file_get_contents('php://input');
$datas = $response['response']['data'];
$data = json_decode(file_get_contents("php://input"), true);

// Get the form values
$id = $datas['Id'] ?? '';
$firstName = $data['sFirstName'] ?? '';
$lastName = $data['sLastName'] ?? '';
$mobileNo = $data['sMobileNo'] ?? '';
$email = $data['semail'] ?? '';
$address = $data['sAddresess'] ?? '';

// Update the user data in the database
$sql = "UPDATE users SET 
            FirstName = '{$firstName}',
            LastName = '{$lastName}',
            MobileNo = '{$mobileNo}',
            email = '{$email}',
            Addresess = '{$address}',
            Updateddate = NOW()
        WHERE id = {$id}";

if (mysqli_query($conn, $sql)) {
    // Successful update
    $response = array(
        'statusCode' => 200,
        'message' => 'Record updated successfully',
        'data' => array(
            'id' => $id,
            'FirstName' => $firstName,
            'LastName' => $lastName,
            'MobileNo' => $mobileNo,
            'email' => $email,
            'Addresess' => $address,
            'Updateddate' => date('Y-m-d H:i:s')
        )
    );
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Failed to update
    $response = array(
        'statusCode' => 500,
        'message' => 'Failed to update record: ' . $conn->error
    );
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
