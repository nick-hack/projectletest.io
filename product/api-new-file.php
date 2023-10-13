<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../Config/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['Id'])) {
        $Id = $_GET['Id'];
        // echo "<pre>";
        // print_r($Id);
        // echo "<pre>";
        // exit();
        // Check if a file was uploaded
        //if (isset($_FILES['file']) && isset($_POST['Id'])) {
        if (isset($_FILES['file']) && $Id) {
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

            // Check if Id is provided
            // $Id = $_POST['Id'];

            // Update data in the database
            $sql = "UPDATE product SET ProImage = '$file_path' WHERE Id = $Id";

            if (move_uploaded_file($file_tmp, $target_file) && mysqli_query($conn, $sql)) {
                echo json_encode(array('Status message' => 'Record updated successfully.', 'status Code' => 200));
            } else {
                echo json_encode(array('Status message' => 'There was an error uploading your file or updating the record.', 'status Code' => 400));
            }
        } else {
            echo json_encode(array('Status message' => 'Please select a file to upload and provide a valid ID.', 'status Code' => 400));
        }
    } else {
        echo json_encode(array('Status message' => 'Invalid request method.', 'status Code' => 405));
    }
} else {
    echo json_encode(array('Status message' => 'Invalid request Id.', 'status Code' => 405));
}
