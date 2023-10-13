<?php
// Set the headers to return JSON and allow access from any domain
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Include the configuration file with database connection details
include('../Config/config.php');

// Pagination settings
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;

// Calculate offset based on page number and number of records per page
$offset = ($page - 1) * $records_per_page;

// Query to retrieve product data with pagination
$sql = "SELECT * FROM product WHERE IsActive = 1 AND IsDelete = 0 ORDER BY Id DESC LIMIT $records_per_page OFFSET $offset";
$result = mysqli_query($conn, $sql) or die("SQL query failed");

// Fetch data and store it in an array
$fetchdata = array();
foreach ($result as $data) {
    $datas['Id'] = $data['Id'];
    $datas['productName'] = $data['ProductName'];
    $datas['Discription'] = $data['Discription'];
    $datas['OldPrice'] = $data['OldPrice'];
    $datas['TotalPrice'] = $data['TotalPrice'];
    $datas['Discount'] = $data['Discount'];
    $datas['ProImage'] = $data['ProImage'];

    array_push($fetchdata, $datas);
}

// Get total number of records in the table
$total_records = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product WHERE IsActive = 1 AND IsDelete = 0"));

// Calculate total number of pages
$total_pages = ceil($total_records / $records_per_page);

// If data is found, return it with pagination details
if ($fetchdata != null) {
    echo json_encode(array(
        'message' => 'All records successfully retrieved',
        'status' => 200,
        'data' => $fetchdata,
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

// Close the database connection
mysqli_close($conn);
