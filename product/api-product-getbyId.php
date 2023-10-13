<?php

// Set the headers to return JSON and allow access from any domain
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        // Get the product ID from the query parameters
        $product_id = isset($_GET['Id']) ? $_GET['Id'] : null;

        if ($product_id !== null) {
            // Simulate database connection and query
            include('../Config/config.php');

            // Sanitize the product ID to prevent SQL injection
            $product_id = mysqli_real_escape_string($conn, $product_id);

            $sql = "SELECT * FROM product WHERE Id = '$product_id'";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                throw new Exception("SQL query failed: " . mysqli_error($conn));
            }

            // Check if the query returned any results
            if (mysqli_num_rows($result) > 0) {
                // Fetch the product data as an associative array
                $row = mysqli_fetch_assoc($result);

                // Create an object to hold the product data
                $product_data = new stdClass();
                $product_data->Id = $row['Id'];
                $product_data->name = $row['ProductName'];
                $product_data->Description = $row['Discription'];
                $product_data->oldPrice = $row['OldPrice'];
                // $product_data->NewPrice = $row['NewPrice'];
                $product_data->TotalPrice = $row['TotalPrice'];
                $product_data->CreatedDate = $row['createdDate'];
                $product_data->image_path = $row['ProImage'];
                $product_data->IsActive = $row['IsActive'];

                // Return the product data as a JSON object
                echo json_encode(['message' => 'get DATA productByID', 'status' => '200', 'data' => $product_data]);
            } else {
                // Return an error message if no product data was found
                echo json_encode(['status' => 'error', 'message' => 'Product data not found']);
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            // Missing or invalid product ID in the query parameters
            echo json_encode(['status' => 'error', 'message' => 'Invalid product ID']);
        }
    } catch (Exception $e) {
        // Exception occurred, return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
