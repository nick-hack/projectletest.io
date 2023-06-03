<?php
// $conn = mysqli_connect("localhost", "root", "", "test");
// if (!$conn) {
//     die("connection failed");
// }
// //echo "connection succesfull";


// Database configuration
$host = 'localhost';
$dbname = 'test';
$user = 'root';
$password = '';

// Database connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "connection successfull";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
