<?php
error_reporting(0);

header('Content-Type: application/json');
header('Access-control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers, Content-Type, Access-control-Allow-Methods, Authorization, X-Requested-With');

include_once('../Config/config.php');

// Get the user's session data
session_start();
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

$headers = apache_request_headers();
$token = isset($headers['Authorization']) ? $headers['Authorization'] : null;

if ($token !== '') {
    $token_parts = explode(' ', $token);
    if (count($token_parts) === 2 && $token_parts[0] === 'Bearer') {
        $token = $token_parts[1];
        $decoded_token = decodeJWTToken($token);

        if ($decoded_token !== null) {
            $userId = $decoded_token['Id'];
            // echo "<pre>";
            // print_r($userId);
            // echo "</pre>";
            // exit();
            // Check if a file was uploaded
            if (isset($_FILES['file'])) {
                $file_name = $_FILES['file']['name'];
                $file_size = $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_type = $_FILES['file']['type'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $allowed_extensions = array("jpeg", "jpg", "png");


                if (!in_array($file_ext, $allowed_extensions)) {
                    echo json_encode(array('Status message' => 'Invalid file extension. Please upload a JPEG or PNG file.', 'status Code' => 400));
                    exit;
                }

                if ($file_size > 2097152) { // 2 MB
                    echo json_encode(array('Status message' => 'File size is too large. Please upload a file under 2 MB.', 'status Code' => 400));
                    exit;
                }

                $target_dir = "../uploads/";
                $target_file = $target_dir . uniqid() . ".webp";
                $file_path = "http://localhost/newapi/uploads/" . basename($target_file);

                // Convert and save the uploaded image as WebP format
                // if (move_uploaded_file($file_tmp, $target_file) && convertToWebP($target_file)) {
                if (move_uploaded_file($file_tmp, $target_file)) {
                    // Update data in the database
                    $sql = "UPDATE product SET ProImage = '$file_path' WHERE Id = $Id";
                    // echo "<pre>";
                    // print_r($sql);
                    // echo "</pre>";
                    // exit();
                    if (mysqli_query($conn, $sql)) {
                        echo json_encode(array('Status message' => 'Record updated successfully.', 'status Code' => 200));
                    } else {
                        echo json_encode(array('Status message' => 'Record not updated.', 'status Code' => 400));
                    }
                } else {
                    echo json_encode(array('Status message' => 'There was an error uploading your file.', 'status Code' => 400));
                }
            } else {
                echo json_encode(array('Status message' => 'Please select a file to upload.', 'status Code' => 400));
            }
        } else {
            echo json_encode(array('Status message' => 'Invalid token.', 'status Code' => 401));
        }
    }
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
