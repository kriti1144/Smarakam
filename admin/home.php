<!-- #ADMIN FILE IN THIS FOLDER -->
<?php
  session_start();
  if(!isset($_SESSION['A-EMAIL'])){

    header("location: login.php");

  }
?>


<!DOCTYPE html>



<html>

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .a {
            background-color: lightslategray;
        }

        .h {
            height: 250px;
        }

        .button {
            transition-duration: 0.5s;
        }

        .button:hover {
            background-color: black;
            color: white;
        }

        .but1 {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
        }

        .box-color{
            background-color: rgb(164, 196, 255);
            border-radius: 15px;
        }

        .box-digit{
            font-size: 50px;
        }

    </style>
</head>

<body>
    <div class="container-fluid">


        <!-- header will be included here [header.php]-->

        <?php

        include "include/header.php";

        ?>

    

            <div class="row">

                <?php

                include "include/sidebar.php";  
                
                ?>


                <div class="col-sm-10 border border-dark">
                    <div class="container">
                        <div class="row mt-3 mb-3 ml-3 mr-3 justify-content-center" align="center">
                            <div class="col-5  h m-3 box-color">
                                <?php 

                                      include "include/connect.php";
                                      $sql1 = "select count(*)as status from booking";
                                      $result = mysqli_query($conn,$sql1);
                                      if(mysqli_num_rows($result)>0){
                                          $row = mysqli_fetch_assoc($result);
                                          echo "   <div class='vcenter'>
                                                    <h4 class='text-center'>Total Bookings</h4>
                                                    <h1 class='box-digit text-light'>".$row['status']."</h1>
                                                    </div>";
                                      }

                                ?>
                            </div>
                            <div class="col-5 h m-3 box-color">
                                <?php
                                   include "include/connect.php";
                                   $sql2 = "select count(*)as users from user ";
                                   $result = mysqli_query($conn,$sql2);
                                   if(mysqli_num_rows($result)>0){
                                       $row = mysqli_fetch_assoc($result);
                                       echo "   <div class='vcenter'>
                                                    <h4 class='text-center'>Registered Users</h4>
                                                    <h1 class='box-digit text-light'>".$row['users']."</h1>
                                                    </div>";

                                   }
                                   
                                ?>
                            </div>
                            <!-- <div class="w-100"></div> -->
                            <div class="col-5  h m-3 box-color">
                                <?php
                                
                                include "include/connect.php";
                                $sql3 = "select count(*)as monuments from monument";
                                $result = mysqli_query($conn,$sql3);
                                if(mysqli_num_rows($result)>0){
                                    $row= mysqli_fetch_assoc($result);
                                    echo "   <div class='vcenter'>
                                                    <h4 class='text-center'>Total Monuments</h4>
                                                    <h1 class='box-digit text-light'>".$row['monuments']."</h1>
                                                    </div>";

                                }?>
                            </div>
                            <div class="col-5  h m-3 box-color">
                            <?php 
                             include "include/connect.php";
                             $sql4 = "select count(*)as validators from validator";
                             $result =mysqli_query($conn,$sql4);
                             if(mysqli_num_rows($result)>0){
                               $row = mysqli_fetch_assoc($result);
                               echo "   <div class='vcenter'>
                               <h4 class='text-center'>Registered Validators</h4>
                               <h1 class='box-digit text-light'>".$row['validators']."</h1>
                               </div>";

                             }
                            ?>
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="row bg-dark text-white align-items-center">
                    <div class="col-sm-8">
                        <h4>CopyRight @ Smarakam 2022</h4>
                    </div>
                    <div class="col-sm-2">Terms & Conditions</div>
                    <div class="col-sm-2">Privacy Policy</div>
                </div>

            </div>

    



    </div>



</body>

</html>