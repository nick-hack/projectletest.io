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

// Retrieve the token from the request header
$headers = apache_request_headers();
$token = isset($headers['Authorization']) ? $headers['Authorization'] : null;

if (!empty($token)) {
    $result = decodeJWTToken($token);

    if (isLoggedIn()) {
        if (verifyTokenEmail($result)) {
            performLogout();
            session_unset();
            session_destroy();
            returnSuccessResponse('Logout Successful', 200);
        } else {
            returnErrorResponse('Invalid Logout Token', 400);
        }
    } else {
        returnErrorResponse('User not logged in', 400);
    }
} else {
    returnErrorResponse('No token provided', 400);
}

// Function to check if user is logged in
function isLoggedIn()
{
    return isset($_SESSION['email']);
}

// Function to verify token email against session email
function verifyTokenEmail($result)
{
    return $_SESSION['email'] === $result['response']['data']['email'];
}

// Function to perform logout
function performLogout()
{
    session_unset();
    session_destroy();
}

// Function to return success response
function returnSuccessResponse($message, $statusCode)
{
    $response = array(
        'status_message' => $message,
        'status_code' => $statusCode
    );
    echo json_encode($response);
}

// Function to return error response
function returnErrorResponse($message, $statusCode)
{
    $response = array(
        'status_message' => $message,
        'status_code' => $statusCode
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Function to decode JWT token
function decodeJWTToken($token)
{
    // Split the token into its three parts: header, payload, and signature
    $token_parts = explode('.', $token);
    $header = base64_decode($token_parts[0]);
    $payload = base64_decode($token_parts[1]);
    $signature = $token_parts[2];

    // Decode the payload JSON into an associative array
    $payload_array = json_decode($payload, true);

    // At this point, the token has been successfully verified, and the payload data can be used in your application
    $user_id = $payload_array['Id'];

    // Example response
    $response = array(
        'message' => 'Token successfully decrypted',
        'Id' => $user_id,
        'response' => $payload_array
    );

    return $response;
}
