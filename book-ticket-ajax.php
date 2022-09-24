<?php

session_start();

$uid = $_SESSION['UID'];

$date = $_POST['date'];


include "include/connect.php";

$count = $_POST['count'];
$mid = $_POST['m-id'];
$name = array();
$age = array();
$gender = array();

for($i = 1 ; $i<= $count; $i++){

    $name[$i] = $_POST['name'.$i];
    $age[$i] = $_POST['age'.$i];
    $gender[$i] = $_POST['gender'.$i];

}

$bid = 'B'.rand(1000,100000000);
 
$sql = "insert into booking values('{$bid}','{$mid}','{$uid}','{$date}','{$count}','1')";

$result = mysqli_query($conn,$sql);

if($result){

   for($i = 1; $i<=$count; $i++){
    
        $sql= "insert into ticket_detail values('{$bid}','{$name[$i]}',{$age[$i]},'{$gender[$i]}')";
        
        $result = mysqli_query($conn,$sql);

        }
    mysqli_close($conn);
    // header("location: view-booking.php");
    echo true;
    

}else{

    mysqli_close($conn);
    echo false;
}

?>