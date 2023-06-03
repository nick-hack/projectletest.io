<?php

error_reporting(0);

header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');
header('Access-control-Allow-Methods:POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,
Authorization,X-Requested-With');

include_once('../Config/config.php');
// Get the user's session data
session_start();
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Get the user's ID from the database

// $id = null;

// if ($email !== null) {
$sql = "SELECT id FROM users WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_data = new stdClass();
    $user_data->id = $row['id'];
}
// }

if ($user_data->id === null) {
    echo json_encode(array('Status massage' => 'User not found.', 'status Code' => 400));
    exit;
}
// echo "<pre>";
// print_r($email);
// print_r($id);
// echo "</pre>";

// Check if a file was uploaded
if (isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    // echo "<pre>";
    // print_r($_FILES['file']['name']);
    // echo "</pre>";
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        echo json_encode(array('Status massage' => 'Invalid file extension. Please upload a JPEG or PNG file.', 'status Code' => 400));
        exit;
    }

    if ($file_size > 2097152) { // 2 MB
        echo json_encode(array('Status massage' => 'File size is too large. Please upload a file under 2 MB.', 'status Code' => 400));
        exit;
    }

    $target_dir = "../uploads/" . $file_name;
    $filename = $_FILES["file"]["name"];
    $extension = pathinfo($filename, PATHINFO_EXTENSION); // get the file extension
    $basename = explode("$extension", $filename); // remove the extension from the file name
    $target_file = $target_dir . $basename . ".webp";
    // $target_file = $target_dir . pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
    $file_path = "http://localhost/newapi/uploads/" . $target_dir;

    if (move_uploaded_file($file_tmp, $target_file)) {
        // Update data in database
        $sql = "UPDATE users SET userfile_path = '{$file_path}' WHERE id = '{$user_data->id}'";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(array('Status massage' => 'Record updated successfully.', 'status Code' => 200));
        } else {
            echo json_encode(array('Status massage' => 'Record not updated.', 'status Code' => 400));
        }
    } else {
        echo json_encode(array('Status massage' => 'There was an error uploading your file.', 'status Code' => 400));
    }
} else {
    echo json_encode(array('Status massage' => 'Please select a file to upload.', 'status Code' => 400));
}
