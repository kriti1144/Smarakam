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
    <title>monument</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>

        a{
            text-decoration: none;
            padding: 2px;
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
                        <!-- THIS IS A MAIN CONTENT PANEL FOR ALL THE PAGES OF ADMIN -->
                    <div class = 'row text-center' >
                            <!-- #TABLE IN STATIC FORMAT (monuments)  -->
                            <h3 class='text-center my-4'>Monument Database</h3>

                            <?php

                            include "include/connect.php";

                            $sql = "select*from monument";

                            $result = mysqli_query($conn,$sql);

                            $output = "<table class='table table-bordered w-75 mx-auto'><tr>
                            
                                                              <th>ID</th>
                                                              <th>NAME</th>
                                                              <th>LOCATION</th>
                                                              <th>ACTION BUTTONS</th>
                            
                            </tr>";
                             
                                 while($row =  mysqli_fetch_assoc($result)){

                                      $output = $output."<tr class='text-center'>
                                      
                                                            <td>{$row['m_id']}</td> 
                                                            <td>{$row['m_name']}</td> 
                                                            <td>{$row['city']}</td>
                                                            <td>
                                                              <a href ='view.php?id={$row['m_id']}' class = 'btn-sm btn-danger'>View</a>
                                                              <a href ='edit-monuments.php?id={$row['m_id']}' class = 'btn-sm btn-success'>Edit</a>
                                                              <a href = 'delete.php?id={$row['m_id']}' class = 'btn-sm btn-dark'>Delete</a>
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