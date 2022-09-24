<?php


session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | SMARAKAM | e-Ticketing System for Monuments & Heritage Sites</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .wid {
            width: 500px;
        }
       

        .h {
            height: 400px;
        }

        .w {
            width: 100%;
        }

        #card:hover {
            background-color: lightgrey;
            box-shadow: 3px 3px 3px grey;
            transition: 0.8s;
        }
        .button:hover{
            transition:0.5s;
            background-color: grey;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <!-- INCLUDING HEADER-->
        <?php
        include "include/header.php";
        ?>

        <div class="row align-items-center m-auto mt-4" align="center" id="banner">
            <div class="col">
                <img src="img/banner.jpg" alt="" width="100%" height="450px" class="text-center">
            </div>
        </div>
        <!-- <div class="row align-items-center m-auto" align="center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner h w">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h w" src="img1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h w" src="img1.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h w" src="7NVLhA.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev text-dark" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only text-dark">Previous</span>
                </a>
                <a class="carousel-control-next text-dark" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="sr-only text-dark">Next</span>
                </a>
            </div>
        </div> -->
        <br>
        <div class="row justify-content-center" align="center">
            <h3>Places To Visit......</h3>

            <?php

            //PHP CODE FOR DISPLAYING FEW MONUMENTS ON HOME PAGE

            include "include/connect.php";

            $sql = "select *from monument order by m_id limit 4";

            $result = mysqli_query($conn, $sql) or die("Query Failed");

            if (mysqli_num_rows($result) > 0) {

                $output = "";

                while ($row = mysqli_fetch_assoc($result)) {

                    $desc = substr($row['description'], 0, 130) . " ........";

                    $output  = $output . "<div class='card  hite wid mt-3 mx-3' id='card'>
                                                <div class='card-header text-center'>
                            
                                                <img src='upload/{$row['m_id']}/{$row['m_id']}_0.png' class='rounded' height=200px width=90%>
                                               
                                                </div>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>{$row['m_name']}</h5>
                                                    <p class=''>{$desc}</p>
                                                    <a href='monument.php?id={$row['m_id']}' class='btn btn-success'>Book Tickets</a>
                                                </div>
                                            </div>";
                }

                echo $output;
            } else {
                echo "<h4 class='text-danger text-center'>No Monuments Found</h4>";
            }

            mysqli_close($conn);
            ?>
            <!-- <div class="card text-center hite wid mt-3">
                <div class="card-header">
                    <img src="img/gwl_fort.jpg" class="rounded" alt="" height=150px width=400px>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-success">Book Tickets</a>
                </div>
            </div>
            <br>
            <div class="card text-center hite wid mt-3">
                <div class="card-header">
                    <img src="img/gwl_fort.jpg" class="rounded" alt="" height=150px width=400px>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-success">Book Tickets</a>
                </div>
            </div>
            <div class="card text-center hite wid mt-3">
                <div class="card-header">
                    <img src="img/gwl_fort.jpg" class="rounded" alt="" height=150px width=400px>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-success">Book Tickets</a>
                </div>
            </div>
            <div class="card text-center hite wid mt-3">
                <div class="card-header">
                    <img src="img/gwl_fort.jpg" class="rounded" alt="" height=150px width=400px>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-success">Book Tickets</a>
                </div> -->
        </div>
        <br>

        <div class="row justify-content-end">
            <div class="col-4">
                <a href="monuments-grid.php">
                    <h3>Explore more....</h3>
                </a>
            </div>
        </div>

        <!-- INCLUDING FOOTER -->
        <?php
                include "include/footer.php";
        ?>

    </div>





    <script src="js/jquery-3.6.0.js"></script>
    <script>

    </script>
</body>

</html>