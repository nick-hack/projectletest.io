<?php

header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');

$data= json_decode(file_get_contents("php://input"),true); //$request method use (php://input) convert array format
$search_value = $data['search'];  //post method.

//$search_value = isset($_GET['search']) ? $_GET['search'] :die();   //http://localhost/php-rest-api/api-search.php?search=A

include_once('../Config/config.php');

    $sql="select * from students where student_name LIKE '%{$search_value}%'";
$result=mysqli_query($conn,$sql) or die("sql query failed");

if(mysqli_num_rows($result)>0)
{
$output=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);
}else{
    echo json_encode(array('massage'=>'No search found','status'=>false));

}

?>