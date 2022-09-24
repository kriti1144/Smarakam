
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
    <style>
        a{
            text-decoration: none;
            margin: 0px 3px;
        }
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
    </style>
</head>

<body>
    <div class="container-fluid">

         <?php
            include "include/header.php";
        ?>

        <div>

            <div class="row">

            <?php
            include "include/sidebar.php";
        ?>


                <div class="col-sm-10 border border-dark">
                    <div class="container">
                        
                         <div class = 'row text-center'>
                             <!-- table in static FORMAT(user acc)   -->
                             <h3 class='text-center my-4'>User Accounts </h3><br><br>
                             
                             <?php
                             include "include/connect.php";

                             $sql = "select*from user";

                             $result = mysqli_query($conn ,$sql);

                             $output = "<table class='table table-bordered w-75 mx-auto'><tr>
                            
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>ACTION BUTTONS</th>
                                                
                                                </tr>";

                             while($row = mysqli_fetch_assoc($result)){

                                $output = $output."<tr class='text-center'>

                                                        <td>{$row['u_id']}</td>
                                                        <td>{$row['u_name']}</td>
                                                        <td>{$row['u_email']}</td>
                                                        <td>
                                                              <a href='view.php?id={$row['u_id']}' class='btn-sm btn-danger'>View</button>
                                                              <a href='edit-user.php?id={$row['u_id']}' class='btn-sm btn-success'>Edit</button>
                                                              <a href ='delete.php?id={$row['u_id']}' class='btn-sm btn-dark'>Delete</button>
                                                        </td>

                                                        
                                                

                                                   </tr>";


                            }
                               $output = $output."</table>";

                               echo $output;

                               mysqli_close($conn);
                            

                             
                             ?>

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



    </div>



</body>

</html>