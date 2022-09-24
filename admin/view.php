<?php

session_start();

if (!isset($_SESSION['A-EMAIL'])) {

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

        .monument-img {
            width: 700px;
            height: 500px;
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

                        <h3 class='text-center my-4'>Monument Database</h3>
                        <?php

                        include "include/connect.php";

                        $ID = $_GET['id'];
                        if ($ID[0] == 'M') {
                            //for view the monument

                            $sql = "select *from monument where m_id='{$ID}'";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                $row = mysqli_fetch_assoc($result);
                                $img_count = $row['img_count'];

                                echo "<div id='myCarousel' class='carousel slide mt-5 w-75 mx-auto' data-ride='carousel'>
                                            <div class='carousel-inner'>";

                                echo " <div class='carousel-item active'>
                                            <img class='d-block w-100' src='../upload/{$ID}/{$ID}_0.png' height=400>
                                        </div>";

                                for ($i = 1; $i < $img_count; $i++) {

                                    echo " <div class='carousel-item'>
                                            <img class='d-block w-100' src='../upload/{$ID}/{$ID}_{$i}.png' height=400>
                                        </div>";

                                }


                                echo " </div>
                                            <a class='carousel-control-prev' href='#myCarousel' role='button' data-slide='prev'>
                                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                <span class='sr-only'></span>
                                            </a>
                                            <a class='carousel-control-next' href='#myCarousel' role='button' data-slide='next'>
                                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                <span class='sr-only'></span>
                                            </a>
                                     </div>";


                                //   echo "<center>
                                //             <img src='../upload/{$ID}/{$ID}_3.png' class=' my-3 w-75'>
                                //         </center>";
                                echo "<h4 class='text-center my-4'>{$row['m_name']}, {$row['city']}</h4>";

                                echo "<table class='table table-striped table-bordered text-justify w-75 mx-auto'>
                                    <tr>
                                        <td>Monument Id</td>
                                        <td>{$row['m_id']}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{$row['m_name']}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td class='text-justify'>{$row['description']}</td>
                                    </tr>
                                    <tr>
                                        <td>Adress</td>
                                        <td>{$row['address']}</td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>{$row['state']}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{$row['city']}</td>
                                    </tr>
                                    <tr>
                                        <td>Opening_time</td>
                                        <td>{$row['opening_time']}</td>
                                    </tr>
                                    <tr>
                                        <td>Closing_time</td>
                                        <td>{$row['closing_time']}</td>
                                    </tr>
                                    <tr>
                                        <td>slots_per_day:</td>
                                        <td>{$row['slots_per_day']}</td>
                                    </tr>
                                    </table>";

                                mysqli_close($conn);
                            }

                        } else if ($ID[0] == 'V') {
                            //for view the validator acc
                            $sql = "select*from validator where v_id='{$ID}'";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                $row = mysqli_fetch_assoc($result);

                                echo "<h4 class='text-center mt-3'>Validator Account</h4>";

                                echo "<table class='table table-bordered table-striped w-75 mx-auto mt-5'>
            <tr>
            <td>validator Id</td>
            <td>{$row['v_id']}</td>
         
         
            </tr>
            <tr>
                <td> validator Name</td>
                <td>{$row['v_name']}</td>
            
            </tr>
            <tr>
                <td>validator email</td>
                <td>{$row['v_email']}</td>
            
            </tr>
            
            </table>";

                                mysqli_close($conn);
                            }
                        } else if ($ID[0] == 'U') {
                            //for view the users record
                            $sql = "select*from user where u_id='{$ID}'";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                $row = mysqli_fetch_assoc($result);

                                //   echo "<h4 class='text-center my-3'>{$row['u_name']}</h4>";
                                echo "<h4 class='text-center mt-3'>User Account</h4>";

                                echo "<table class='table table-striped table-bordered w-75 mx-auto my-4'>
           <tr>
            <td>User Id</td>
            <td>{$row['u_id']}</td>
          </tr>
            <tr>
                <td> User Name</td>
                <td>{$row['u_name']}</td>
            
            </tr>
            <tr>
                <td>User email</td>
                <td>{$row['u_email']}</td>
            
            </tr>

            <tr>
                <td>User phone :</td>
                <td>{$row['u_phone']}</td>
            
            </tr>
          </table>";

                                mysqli_close($conn);
                            }
                        } else {
                        }
                        ?>
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
    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>