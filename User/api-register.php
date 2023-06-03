<?php

// Turn off error reporting
error_reporting(0);

// Set headers to allow access from any origin
header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With');

// Get JSON input and decode it
$data = json_decode(file_get_contents("php://input"), true);

// Get user data from input
$username = $data['username'];
$password = $data['password'];
$email = $data['email'];

// Include database connection configuration file
include_once('../Config/config.php');

// Hash the password using bcrypt algorithm
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Check if the email is already registered
$sql = "SELECT * FROM users WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
    echo json_encode(array('status' => false, 'message' => 'Email already registered'));
    exit;
}

// Insert user data into database
$sql = "INSERT INTO users(username, password, email) 
        VALUES ('{$username}', '{$hashedPassword}', '{$email}')";

if(mysqli_query($conn, $sql)) {
    echo json_encode(array('status' => true, 'message' => 'User registered successfully'));
} else {
    echo json_encode(array('status' => false, 'message' => 'User registration failed'));
}
