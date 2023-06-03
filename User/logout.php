<?php

// Suppress errors
error_reporting(0);

// Set response headers
header('Content-Type: application/json');
header('Access-control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Requested-With');

// Start session
session_start();

// Check if user is logged in
if (isset($_SESSION['email'])) {
    // If logged in, check if the login token matches the one provided in the request
    $request_body = json_decode(file_get_contents('php://input'));
    $logout_token = $request_body->logout_token;
    if ($_SESSION['email'] == $logout_token) {
        // If the login token matches, unset session and return success message
        session_unset();
        session_destroy();
        $response = new stdClass();
        $response->status_message = 'Logout Successful';
        $response->status_code = 200;
        echo json_encode($response);
    } else {
        // If the login token does not match, return error message
        $response = new stdClass();
        $response->status_message = 'Invalid Logout Token';
        $response->status_code = 400;
        echo json_encode($response);
    }
} else {
    // If not logged in, return error message
    $response = new stdClass();
    $response->status_message = 'User not logged in';
    $response->status_code = 400;
    echo json_encode($response);
}
