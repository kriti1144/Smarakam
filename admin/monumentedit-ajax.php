<?php

include "include/connect.php";

$name =  $_GET['m_name'];
$desc= $_GET['desc'];
$add= $_GET['address'];
$city= $_GET['city'];
$state= $_GET['state'];
$optime= $_GET['o-time'];
$cltime= $_GET['c-time'];
$spday= $_GET['day'];

$ID = $_GET['id'];


$sql= "update monument  set m_name ='{$name}' , description= '{$desc}' , address='{$add}',city='{$city}',state='{$state}',opening_time='{$optime}',closing_time='{$cltime}',slots_per_day='{$spday}'where m_id='{$ID}' ";

$result= mysqli_query($conn,$sql);

if($result){
   
    mysqli_close($conn);
    echo true;

}else{

    mysqli_close($conn);
    echo false;

}





?>