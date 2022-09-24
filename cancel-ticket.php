<?php

include "include/connect.php";

$ID = $_GET['id'];

$sql = "update  booking set status = 0 where b_id='{$ID}'";

$result = mysqli_query($conn,$sql);

if($result>0){
    
     mysqli_close($conn);
     header("location: view-booking.php");

    
}else{

    mysqli_close($conn);
    echo "not cancelled yet..";
}



?>