<?php

// Suppress errors
error_reporting(0);

// Set response headers
header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');
header('Access-control-Allow-Methods:POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Requested-With');

// Get request data
$data = json_decode(file_get_contents("php://input"), true);

// Extract data
$username = $data['email'];
$password = $data['password'];

// Validate email and password inputs
if (empty($username) || empty($password)) {
    $response = new stdClass();
    $response->status_message = 'Email and password are required';
    $response->status_code = 400;
    echo json_encode($response);
    exit;
}

// Include database configuration
include_once('../Config/config.php');

// Check if user exists in the database
$sql = "SELECT * FROM users WHERE email='{$username}'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // If user exists, verify password and generate JWT token
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['email'] = $username;


        $secret_key = "my_secret_key";
        $issuer_claim = "localhost"; // this can be the servername
        $audience_claim = "localhost";
        $issuedat_claim = time(); // issued at
        $notbefore_claim = $issuedat_claim + 10; //not before in seconds
        $expire_claim = $issuedat_claim + 3600; // expire time in seconds

        // Get student name from database
        $sql = "SELECT Id,concat(FirstName,' ',LastName)As names,MobileNo,email FROM users WHERE email='{$username}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['names'];
        $MobileNo = $row['MobileNo'];
        $user_id = $row['Id'];
        // Generate JWT token with student name in payload data
        $header = array(
            "alg" => "HS256",
            "typ" => "JWT"
        );

        $payload = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "sec" => $secret_key,
            "data" => array(
                "email" => $username,
                "names" => $name,
                "MobileNo" => $MobileNo,
                "Id" => $user_id
            )
        );

        $encoded_header = base64_encode(json_encode($header));
        $encoded_payload = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', $encoded_header . '.' . $encoded_payload, $secret_key, true);
        $encoded_signature = base64_encode($signature);

        $jwt = $encoded_header . '.' . $encoded_payload . '.' . $encoded_signature;

        // Return success message with JWT token and student name
        $response = new stdClass();
        $response->status_message = 'Login Successful';
        $response->status_code = 200;
        $response->token = $jwt;
        $response->email = $username;
        $response->name = $name;
        $response->MobileNo = $MobileNo;
        $response->user_id = $user_id;
        $response->sec = $secret_key;
        echo json_encode($response);
    } else {
        // If password is invalid, return error message
        $response = new stdClass();
        $response->status_message = 'Invalid password';
        $response->status_code = 400;
        echo json_encode($response);
    }
} else {
    // If user does not exist, return error message
    $response = new stdClass();
    $response->status_message = 'Invalid username or password';
    $response->status_code = 400;
    echo json_encode($response);
}
