<?php
// Set the headers to return JSON and allow access from any domain
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


include('../User/decode.php');
$data = $response['response']['data'];
// // echo "<pre>";
// // print_r($data);
// // echo "</pre>";
$names = $data['names'];


// Include the configuration file with database connection details
include('../Config/config.php');

// Get the user's session data
session_start();
//$user_id = isset($_SESSION['Id']) ? $_SESSION['Id'] : null;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Get the user's token data
// $headers = apache_request_headers();
// $token = null;
// if (isset($headers['Authorization'])) {
//     $authorization_header = $headers['Authorization'];
//     if (preg_match('/Bearer\s(\S+)/', $authorization_header, $matches)) {
//         $token = $matches[1];
//     }
// }

//Check if the token is valid and matches the user ID
// $token_valid = false;
// if ($token != null && $user_id != null) {
//Query the database to check if the token is valid
$sql = "SELECT Id,concat(FirstName,' ',LastName)As Fullname,MobileNo,email,userfile_path FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql) or die("SQL query failed");
$row = mysqli_fetch_assoc($result);
// $Fullname = $row['Fullname'];
// $MobileNo = $row['MobileNo'];
// $user_id = $row['Id'];
if (mysqli_num_rows($result) > 0) {
    // Token is valid
    $token_valid = true;
}
// }

// If session and token data are valid, continue with retrieving the data
//if ($user_id != null && $user_email != null && $token_valid) {
// Get page number and number of records per page from query parameters
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;

// Calculate offset based on page number and number of records per page
$offset = ($page - 1) * $records_per_page;

// Query the database to retrieve data from "students" table
$sql = "SELECT * FROM students WHERE IsDelete = false ORDER BY id DESC LIMIT $records_per_page OFFSET $offset";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

// Fetch data and store it in an array
$fetchdata = array();
foreach ($result as $data) {
    $datas['Id'] = $data['id'];
    $datas['Student Name'] = $data['student_name'];
    $datas['Age'] = $data['age'];
    $datas['City'] = $data['city'];
    $datas['Roll No'] = $data['RollNo'];
    $datas['mobileno'] = $data['mobileno'];
    $datas['IsDelete'] = $data['IsDelete'];
    $datas['CreatedDate'] = $data['CreatedDate'];
    $datas['Updateddate'] = $data['Updateddate'];

    array_push($fetchdata, $datas);
}

// Get total number of records in the table
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM students WHERE IsDelete = false"));

// Calculate total number of pages
$total_pages = ceil($total_records / $records_per_page);

// If data is found, return it with pagination details
if ($fetchdata != null) {
    echo json_encode(array(
        'message' => 'All records successfully retrieved',
        'status' => 200,
        'data' => $fetchdata,
        'email' => $email,
        'names' => $names,
        //'MobileNo' => $MobileNo,
        'pagination' => array(
            'total_records' => $total_records,
            'total_pages' => $total_pages,
            'current_page' => $page,
            'records_per_page' => $records_per_page
        )
    ));
} else {
    // If no data is found, return an error message
    echo json_encode(array(
        'message' => 'No records found',
        'status' => 404
    ));
}
//}

// Close the database connection
mysqli_close($conn);
