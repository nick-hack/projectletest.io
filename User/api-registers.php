<?php
header('Content-Type: application/json');
header('Access-control-Allow-Origin: *');
header('Access-control-Allow-Methods: POST');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,Authorization,X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$firstname = $data['sFirstName'];
$lastname = $data['sLastName'];
$mobileNo = $data['sMobileNo'];
$email = $firstname . $lastname . rand(1, 100) . "@" . "myportal.com";
$password = $data['spassword'];


include_once('../Config/config.php');

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Check if the mobile number or email already exists in the database using prepared statement
$checkSql = "SELECT * FROM users WHERE MobileNo = ? OR Email = ?";
$stmtCheck = mysqli_prepare($conn, $checkSql);
mysqli_stmt_bind_param($stmtCheck, "ss", $mobileNo, $email);
mysqli_stmt_execute($stmtCheck);
$resultCheck = mysqli_stmt_get_result($stmtCheck);

if (mysqli_num_rows($resultCheck) > 0) {
    $response = new stdClass();
    $response->status_message = 'Mobile number or email already exists';
    $response->status_code = 400;
    echo json_encode($response);
} else {
    $insertSql = "INSERT INTO users (FirstName, LastName, MobileNo, Email, PasswordHash, IsDeleted, IsActive, CreatedDate) VALUES (?, ?, ?, ?, ?, 0, 1, NOW())";
    $stmtInsert = mysqli_prepare($conn, $insertSql);
    mysqli_stmt_bind_param($stmtInsert, "sssss", $firstname, $lastname, $mobileNo, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmtInsert)) {
        $response = new stdClass();
        $response->status_message = 'Record Inserted Successfully';
        $response->status_code = 200;
        $response->username = $firstname . ' ' . $lastname;
        $response->email = $email;
        $response->mobileNo = $mobileNo;
        // echo "<pre>";
        // print_r($response);
        // echo "</pre>";
        // exit();
        echo json_encode($response);
    } else {
        $response = new stdClass();
        $response->status_message = 'Record Not Inserted';
        $response->status_code = 400;
        echo json_encode($response);
    }

    mysqli_stmt_close($stmtInsert);
}

mysqli_stmt_close($stmtCheck);
mysqli_close($conn);
