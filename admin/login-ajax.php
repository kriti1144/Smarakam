

<?php

// admin login backend file 


#CONNECTION
include "include/connect.php";


#FETCH DATA FROM THE FORM
$email = $_POST['email'];
$pwd = $_POST['password'];


#QUERY 
$sql= "select *from admin where a_email='{$email}' and  a_pwd='{$pwd}'";

#STORING THE RESULT     
$result = mysqli_query($conn,$sql) or die("query failed");
   
        #CONDITION
        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);
                
                #SESSION START HERE
                session_start();

                $_SESSION['A-EMAIL'] = $row['a_email'];
                $_SESSION['A-NAME'] = $row['a_name'];


                mysqli_close($conn);
                echo true;

        }else{
            
                #IF ANY ERROR FIND OUT 
                $error = mysqli_errno($conn);
                mysqli_close($conn);
                echo $error;

        }