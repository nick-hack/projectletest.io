<?php

error_reporting(0);

header('Content-Type: application/json');
header('Access-control-Allow-Origin:*');
header('Access-control-Allow-Methods:DELETE');
header('Access-control-Allow-Headers: Access-control-Allow-Headers,Content-Type,Access-control-Allow-Methods,
Authorization,X-Requested-With'); // all allow headers files in inserted


$data= json_decode(file_get_contents("php://input"),true); //$request method use (php://input) convert array format
$student_id=$data['sid'];
$IsDelete=1;

include_once('../Config/config.php');

   // $sql="DELETE from students where id={$student_id}";
   
   $sql="UPDATE students SET IsDelete='{$IsDelete}' where id={$student_id}";

if(mysqli_query($conn,$sql))
{
    echo json_encode(array('Status Massage'=>'Record Deleted Successfully','status'=>true));
}else{
    echo json_encode(array('Status Massage'=>'Record Not deleted','status'=>false));

}

?>