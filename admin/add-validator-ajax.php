<?php

include "include/connect.php";

#variables  FETCH THE DATA FROM THE FORM

$name  = $_POST['v_name'];
$email = $_POST['v_email'];
$pwd   = sha1( $_POST['v_pwd']);
$VID   = 'V'.rand(100,100000000);

#SQL QUERY FOR THE FORM

$sql = "insert into  validator values('{$VID}','{$name}','{$email}','{$pwd}')";

#PRINT RESULT
$result = mysqli_query($conn,$sql);

if($result){


         mysqli_close($conn);
         echo "true";

}else{


        $error = mysqli_error($conn);
        mysqli_close($conn);
        echo $error;
}



