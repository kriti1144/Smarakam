
<?php
 
 
 $conn=mysqli_connect("localhost","root","","Smarakam")  or die("connection failed");
 
 $name       = $_POST['m_name'];
 $description= $_POST['desc'];
 $address    = $_POST['address'];
 $city       = $_POST['city'];
 $state      = $_POST['state'];
 $time1      = $_POST['o-time'];
 $time2      = $_POST['c-time'];
 $day        = $_POST['day'];
 $image      = $_FILES['image']['tmp_name'];//BACKEND CHANGE FOR IMAGE + TEMP NAME FOR ALL THE IMAGES ARE STORED AS ARRAY
 $MID        = 'M'.rand(100,100000000);

 $img_count = count($image);
 
 
 
 $sql = "insert into monument values('{$MID}','{$name}','{$description}','{$address}','{$city}','{$state}','{$time1}','{$time2}',{$day},{$img_count})";
 
 
 $result= mysqli_query($conn,$sql) or die("query failed");
 
 
         if($result){
             
             #CREATING DIRECTORY FOR IMAGES 
             mkdir("../upload/".$MID);
                 
                 for($i=0 ; $i< count($image); $i++){
                        
                      $tempName = $image[$i];
                      move_uploaded_file($tempName,"../upload/".$MID."/".$MID."_".$i.".png"); #2 PARAMETRE PASSED [TEMPORARY NAME $ DESTINATION] IN THIS FUNC
         
                     }
        
             
             mysqli_close($conn);
             echo true;       
 
         }else{
 
             $error= mysqli_error($conn);
             mysqli_close($conn);
             echo $error;
         }
 
         ?>