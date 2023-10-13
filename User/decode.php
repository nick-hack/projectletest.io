<?php

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

// Retrieve the token from the request header
$token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : '';
//$token = str_replace('Bearer ', '', $token);

if (!empty($token)) {
    $result = decodeJWTToken($token);

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($result);
} else {
    // No token provided, return an error message
    $error_response = array(
        'error' => 'No token provided'
    );
    header('Content-Type: application/json');
    echo json_encode($error_response);
}
