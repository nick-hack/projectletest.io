<?php

// This is an example JWT token, replace with your own
// $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJsb2NhbGhvc3QiLCJhdWQiOiJsb2NhbGhvc3QiLCJpYXQiOjE2ODA3NTc5MjMsIm5iZiI6MTY4MDc1NzkzMywiZXhwIjoxNjgwNzYxNTIzLCJzZWMiOiJteV9zZWNyZXRfa2V5IiwiZGF0YSI6eyJlbWFpbCI6Im5ld2pvbm55NTVAbXlwb3J0YWwuY29tIiwibmFtZXMiOiJuZXcgam9ubnkiLCJNb2JpbGVObyI6Ijk2Nzg1NDY3NTYiLCJJZCI6IjE4In19.lURiOx6pym14KTpAFE0z8SFKFUGW19Pr/uXFjnitsgs=';

// Get the token from the request header
$headers = apache_request_headers();
$token = $headers['Authorization'];
//$token = str_replace('Bearer ', '', $token);


// Set the secret key for decoding the token
// $secret_key = "my_secret_key";
// Your secret key should be stored securely, don't hardcode it here
$secret_key = 'your_secret_key';

// Split the token into its three parts: header, payload, and signature
$token_parts = explode('.', $token);
$header = base64_decode($token_parts[0]);
$payload = base64_decode($token_parts[1]);
$signature = $token_parts[2];


// Decode the payload JSON into an associative array
$payload_array = json_decode($payload, true);

// At this point, the token has been successfully verified, and the payload data can be used in your application
$user_id = $payload_array['iss'];

// Example response
$response = array(
    'message' => 'Token successfully decrypted',
    'user_id' => $user_id,
    'response' => $payload_array
);

header('Content-Type: application/json');
return json_encode($response);



//Note:
// this code echo json_encode($response); then javascript error show SyntaxError: Unexpected non-whitespace character after JSON at position 283
//then its not working then i am using return data then its work data i got and working properly with token data passes