<?php

// Set the headers to return JSON and allow access from any domain
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Include your JWT library or dependencies here

// Simulate database connection and query
include('../Config/config.php');


// Check if the request method is GET
// ... (Other code before this point)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Get the token and product ID from the POST data
        $headers = apache_request_headers();
        $token = isset($headers['Authorization']) ? $headers['Authorization'] : null;

        //$data = json_decode(file_get_contents("php://input"), true);

        if ($token !== '') {
            $token_parts = explode(' ', $token);
            if (count($token_parts) === 2 && $token_parts[0] === 'Bearer') {
                $token = $token_parts[1];
                //$productId = isset($_POST['Id']) ? $_POST['Id'] : null;
                // $productId = isset($_GET['Id']) ? $_GET['Id'] : null;
                // // Validate token and perform cart logic
                if ($token !== null) {
                    // Decode the token (implement this based on your JWT library)
                    $decoded_token_data = decodeJWTToken($token);

                    if ($decoded_token_data !== null) {
                        $userId = $decoded_token_data['Id'];
                        // Token is valid, proceed with cart logic
                        // echo "<pre>";
                        // // print_r($result);
                        // print_r($productId);
                        // // print_r($userId);
                        // echo "</pre>";
                        // exit();
                        //         $product_id = mysqli_real_escape_string($conn, $productId);
                        //         $sql = "SELECT * FROM product WHERE Id = '$product_id'";
                        //         $result = mysqli_query($conn, $sql);

                        //         if (mysqli_num_rows($result) > 0) {
                        //             // Fetch the product data as an associative array
                        //             $row = mysqli_fetch_assoc($result);

                        //             // Create an object to hold the product data
                        //             $product_data = new stdClass();
                        //             $product_data->Id = $row['Id'];
                        //             $product_data->name = $row['ProductName'];
                        //             $product_data->Description = $row['Discription'];
                        //             $product_data->oldPrice = $row['OldPrice'];
                        //             // $product_data->NewPrice = $row['NewPrice'];
                        //             $product_data->TotalPrice = $row['TotalPrice'];
                        //             $product_data->CreatedDate = $row['createdDate'];
                        //             $product_data->image_path = $row['ProImage'];
                        //             $product_data->IsActive = $row['IsActive'];
                        //         }
                        //         $ProductName = $product_data->name;
                        //         $TotalPrice = $product_data->TotalPrice;
                        //         $productId = $product_data->Id;


                        // $sql = "INSERT INTO ProductCart (UserId,ProductId,ProductName,TotalPrice,InOrder,CreatedBy,CreatedDate)VALUES($userId,$productId,'$ProductName',$TotalPrice,1,$userId,now())";
                        // $insert_result = mysqli_query($conn, $sql);


                        // if ($insert_result) {
                        // Fetch cart items and prepare for response
                        $select_cart_sql = "SELECT p.Id,p.UserId, p.ProductId, p.ProductName, p.TotalPrice, p.newAddress, p.InOrder, ord.Ordtatus,p.CreatedDate,pro.ProImage
                        FROM ecomm.ProductCart p
                        INNER JOIN ecomm.orderstatus ord ON p.InOrder = ord.id
                        INNER JOIN ecomm.product pro ON pro.Id = p.ProductId
                            WHERE p.UserId = $userId order by p.id desc
                            ";
                        $select_cart_result = mysqli_query($conn, $select_cart_sql);
                        // echo "<pre>";
                        // print_r($select_cart_sql);
                        // echo "</pre>";
                        // exit();
                        if ($select_cart_result) {
                            // Create an array to hold the cart item objects
                            $cart_items = array();

                            while ($cart_row = mysqli_fetch_assoc($select_cart_result)) {
                                // Create an object to hold the cart item data
                                $cart_item_data = new stdClass();
                                $cart_item_data->Id = $cart_row['Id'];
                                $cart_item_data->UserId = $cart_row['UserId'];
                                $cart_item_data->ProductId = $cart_row['ProductId'];
                                $cart_item_data->ProductName = $cart_row['ProductName'];
                                $cart_item_data->ProductImage = $cart_row['ProImage'];
                                $cart_item_data->InOrder = $cart_row['InOrder'];
                                $cart_item_data->Ordtatus = $cart_row['Ordtatus'];
                                $cart_item_data->TotalPrice = $cart_row['TotalPrice'];
                                //  $cart_item_data->CreatedDate = $cart_row['createdDate'];

                                // Add the cart item data object to the cart_items array
                                $cart_items[] = $cart_item_data;
                            }
                            //  }
                        }
                        // Return the cart items as JSON response
                        echo json_encode(['status' => 200, 'message' => 'Item added to cart', 'cart_items' => $cart_items]);
                    } else {
                        // Invalid token, return an error
                        echo json_encode(['status' => 'error', 'message' => 'Invalid token']);
                    }
                } else {
                    // Missing token or product ID in POST data
                    echo json_encode(['status' => 'error', 'message' => 'Missing token or product ID']);
                }
            }
        }
    } catch (Exception $e) {
        // Exception occurred, return an error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// ... (Other code after this point)



// ... (Other code after this point)


// Decode a JWT token
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
