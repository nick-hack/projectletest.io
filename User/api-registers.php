<?php
// Suppress errors
error_reporting(0);

// Set response headers
header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');
header('Access-control-Allow-Methods:POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,
Authorization,X-Requested-With');

// Get request data
$data = json_decode(file_get_contents("php://input"), true);

// Extract data
$firstname = $data['sFirstName'];
$lastname = $data['sLastName'];
$mobileNo = $data['sMobileNo'];
$email = $firstname . $lastname . rand(1, 100) . "@" . "myportal.com";
$password = $data['spassword'];

// Include database configuration
include_once('../Config/config.php');

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Check if the mobile number or email already exists in the database
$sql = "SELECT * FROM users WHERE MobileNo='{$mobileNo}' OR email='{$email}'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // If mobile number or email already exists, return error message
    $response = new stdClass();
    $response->status_message = 'Mobile number or email already exists';
    $response->status_code = 400;
    echo json_encode($response);
} else {
    // Insert data into database
    $sql = "INSERT INTO users(FirstName, LastName, MobileNo, email, password, IsDelete, IsActive, CreatedDate) VALUES ('{$firstname}','{$lastname}','{$mobileNo}','{$email}','{$hashedPassword}',0,1,now())";

    if (mysqli_query($conn, $sql)) {
        // If insert successful, return success message
        $response = new stdClass();
        $response->status_message = 'Record Inserted Successfully';
        $response->status_code = 200;
        $response->username = $firstname . $lastname;
        $response->email = $email;
        $response->mobileNo = $mobileNo;
        echo json_encode($response);
    } else {
        // If insert unsuccessful, return error message
        $response = new stdClass();
        $response->status_message = 'Record Not Inserted';
        $response->status_code = 400;
        echo json_encode($response);
    }
}
