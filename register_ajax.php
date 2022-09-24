
<?php
#CONNECTION OF REGISTER PAGE


include "include/connect.php";          

#FETCH THE DATA FROM THE FORM


$Name      =  $_POST['Name'];
$Email     =  $_POST['Email'];
$Phone     = $_POST['Phone']; 
$Password  =  sha1($_POST['Password']);         


$uid = 'U'.rand(100,100000000);

#SQL QUERY TO INSERT THE DATA INTO FORM

$sql = "insert into user values('{$uid}','{$Name}',{$Phone},'{$Email}','{$Password}')";

$result = mysqli_query($conn , $sql);

#TO CHECK ,QUERY  SUCCESSFULLY RUN OR NOT

if($result){

    mysqli_close($conn);
    echo true;   // success

}else{

    $error= mysqli_error($conn);
    mysqli_close($conn);
    echo $error;


}





?>