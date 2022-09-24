

<?php 

// IN THIS FILE DELETE A SPECIFIC RECORD

include "include/connect.php";



$ID = $_GET['id'];


if($ID[0]=='M'){
  // THIS BLOCK IS FOR DELETE THE MONUMENT

    $sql="delete from monument where m_id ='{$ID}'";

    $result = mysqli_query($conn,$sql) or die("query failed to delete Monument");
    
    mysqli_close($conn);

    header("location: monuments.php");
}
else if($ID[0]=='U'){
    //THIS BLOCK IS FOR DELETE THE USER CREDENTIALS

    $sql="delete from user where u_id = '{$ID}'";

    $result = mysqli_query($conn,$sql) or die ("query failed to delete User");

    mysqli_close($conn);

    header("location: user-accounts.php");
}
else if($ID[0]='V'){
    //THIS BLOCK IS FOR DELETE THE VALIDATOR RECORD

    $sql = "delete from validator where v_id = '{$ID}'";

    $result = mysqli_query($conn,$sql) or die ("query failed to delete validator");
    mysqli_close($conn);

    header("location: validator.php");
    


}else{
    //THIS BLOCK IS FOR DELETE THE BOOKING RECORD 

}







?>