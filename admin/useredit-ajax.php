<?php

include "include/connect.php";

$name =  $_GET['name'];
$email= $_GET['email'];
$phone= $_GET['phone'];

$ID = $_GET['id'];


$sql= "update user  set u_name ='{$name}' , u_email = '{$email}' , u_phone='{$phone}' where u_id='{$ID  }' ";

$result= mysqli_query($conn,$sql);

if($result){
   
    mysqli_close($conn);
    echo true;

}else{

    mysqli_close($conn);
    echo false;

}





?>