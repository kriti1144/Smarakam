<?php

include "include/connect.php";

$name =  $_GET['name'];
$email= $_GET['email'];
$ID = $_GET['id'];


$sql= "update validator  set v_name ='{$name}' , v_email = '{$email}'  where v_id='{$ID}' ";

$result= mysqli_query($conn,$sql);

if($result){
   
    mysqli_close($conn);
    echo true;

}else{

    mysqli_close($conn);
    echo false;

}





?>