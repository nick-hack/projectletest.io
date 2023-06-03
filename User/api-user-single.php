<?php
// Set the headers to return JSON and allow access from any domain
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


include('../User/decode.php');
$data = $response['response']['data'];

$names = $data['names'];
$Id = $data['Id'];

// Include the configuration file with database connection details
include('../Config/config.php');

// Get the user's session data
session_start();
//$user_id = isset($_SESSION['Id']) ? $_SESSION['Id'] : null;
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Fetch user data from the database
$sql = "SELECT Id, CONCAT(FirstName, ' ', LastName) AS Fullname, MobileNo, email,Addresess,UserRole,userfile_path FROM users WHERE Id = $Id";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    // Fetch the user data as an associative array
    $row = mysqli_fetch_assoc($result);

    // Create a new object to hold the user data
    $user_data = new stdClass();
    $user_data->Id = $row['Id'];
    $user_data->fullname = $row['Fullname'];
    $user_data->email = $row['email'];
    $user_data->mobile = $row['MobileNo'];
    $user_data->Addresess = $row['Addresess'];
    $user_data->UserRole = $row['UserRole'];
    $user_data->userfile_path = $row['userfile_path'];
    // Return the user data as a JSON object
    echo json_encode($user_data);
} else {
    // Return an error message if no user data was found
    echo json_encode(['error' => 'User data not found']);
}
