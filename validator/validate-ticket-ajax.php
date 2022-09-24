<?php

include "../include/connect.php";

$BID = $_POST['b_id'];
$date= date("Y-m-d"); //return current date which is on the  server 

$sql = "select *from booking where b_id ='{$BID}' and status = 1 ";

$result = mysqli_query($conn,$sql) or die("query failed");

if(mysqli_num_rows($result)>0){

     $output= "<h4 class = 'text-center my-4 '>".$date."</h4><table class ='table table-striped table-bordered w-75 mx-auto'  ><thead><th>Visitor Name</th>
     <th>Age</th>
     <th>Gender</th></thead>";
     
     $sql2 = "select *from ticket_detail where b_id='{$BID}' ";

    $result =  mysqli_query($conn,$sql2);

    while($row= mysqli_fetch_assoc($result)){

        $output= $output."<tr>
                            <td>{$row['visitor_name']}</td>
                            <td>{$row['age']}</td>
                            <td>{$row['gender']}</td>
                         </tr>";

                         
         

    }
    $output =  $output."</table>";

     mysqli_close($conn);

    echo $output;

    

}else{

    mysqli_close($conn);
    echo "false";
}





?>