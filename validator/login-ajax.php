<?php

include "../include/connect.php";

$email = $_POST['Email'];
$pwd = sha1($_POST['Password']);

$sql = "select *from validator where v_email='{$email}' and v_pwd='{$pwd}'";

$result = mysqli_query($conn, $sql) or die("Query failed");

if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    session_start();
    $_SESSION['VID'] = $row['v_id']; 
    $_SESSION['VNAME'] = $row['v_name']; 
    
    mysqli_close($conn);
    echo true;

}else{
    
    $error = mysqli_errno($conn);
    mysqli_close($conn);
    echo $error;
}



?>

