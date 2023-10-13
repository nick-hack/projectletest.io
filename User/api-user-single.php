<?php

// Set the headers to return JSON and allow access from any domain
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Get the token from the request header
$headers = apache_request_headers();
$token = isset($headers['Authorization']) ? $headers['Authorization'] : null;

if ($token !== '') {
    $token_parts = explode(' ', $token);
    if (count($token_parts) === 2 && $token_parts[0] === 'Bearer') {
        $token = $token_parts[1];
        $decoded_token = decodeJWTToken($token);

        if ($decoded_token !== null) {
            // Token is valid, proceed to fetch user data
            $Id = $decoded_token['Id'];

            // Simulate database connection and query
            include('../Config/config.php');

            $sql = "SELECT Id, concat(FirstName,' ',LastName) AS Fullname, MobileNo, Email, Address, Roles, userfile_path FROM users WHERE Id = $Id";
            $result = mysqli_query($conn, $sql) or die("SQL query failed");

            // Check if the query returned any results
            if (mysqli_num_rows($result) > 0) {
                // Fetch the user data as an associative array
                $row = mysqli_fetch_assoc($result);

                // Create a new object to hold the user data
                $user_data = new stdClass();
                $user_data->Id = $row['Id'];
                $user_data->fullname = $row['Fullname'];
                $user_data->email = $row['Email'];
                $user_data->mobile = $row['MobileNo'];
                $user_data->Addresess = $row['Address'];
                $user_data->UserRole = $row['Roles'];
                $user_data->userfile_path = $row['userfile_path'];

                // Return the user data as a JSON object
                echo json_encode($user_data);
            } else {
                // Return an error message if no user data was found
                echo json_encode(['error' => 'User data not found']);
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            // Token is invalid, return an error message
            echo json_encode(['error' => 'Invalid token']);
        }
    } else {
        // Invalid token format, return an error message
        echo json_encode(['error' => 'Invalid token format']);
    }
} else {
    // Token not provided or user has logged out, return an appropriate response
    echo json_encode(['error' => 'User not logged in']);
}

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
    $user_id = $payload_array['data']['Id'];

    // Example response
    $response = array(
        'message' => 'Token successfully decrypted',
        'Id' => $user_id,
        'response' => $payload_array
    );

    return $response;
}
