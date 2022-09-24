<?php

include "include/connect.php";

$email = $_POST['Email'];
$pwd = sha1($_POST['Password']);

$sql = "select *from user where u_email='{$email}' and u_pwd='{$pwd}'";

$result = mysqli_query($conn, $sql) or die("Query failed");

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION['UID'] = $row['u_id']; 
    $_SESSION['NAME'] = $row['u_name']; 
    
    mysqli_close($conn);
    echo true;

}else{
    
    $error = mysqli_errno($conn);
    mysqli_close($conn);
    echo $error;
}



?>