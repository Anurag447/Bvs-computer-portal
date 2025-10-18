<?php
include '../includes/conn.php';

$id= $_POST['id'];

$sql="SELECT * FROM student where id={$id}";
$res=mysqli_query($conn,$sql);

if($res){
    $row = mysqli_fetch_assoc($res);  
    echo json_encode($row);   
}
else{
    echo json_encode(['status'=>'error','message'=>'Record not found']);
}



