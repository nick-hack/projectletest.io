<?php

header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');

$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];

include_once('../Config/config.php');

$sql = "SELECT * FROM students WHERE student_name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No search found', 'status' => false));
}
