<!-- THIS IS THE GRID PAGE OF MONUMENTS EXPLORE MORE -->
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monuments | SMARAKAM | e-Ticketing System for Monuments & Heritage Sites</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .a {
            background-color: lightslategray;
        }

        .h {
            height: 250px;
        }

        .button {
            transition-duration: 0.4s;
        }

        .button:hover {
            background-color: black;
            color: white;
        }

        .button1:hover {
            transition-duration: 0.2s;
            background-color: green;
            color: white;
        }

        .but1 {
            box-shadow: 3px 3px 5px rgb(200, 195, 195);
            border-top: 0.8px solid lightgrey;
            border-left: 0.8px solid lightgrey;
            background-color: white;
        }

        .but1:hover {
            background-color: lightgrey;
        }

        .bg {
            background-color: lightblue;
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



        <div class="row">

            <div class="col border border-dark ">

                <div class="container">

                    <h3 align="center" class="mt-4">More Places To Visit</h3>

                    <div class="row mt-3 mb-3 ml-3 mr-3 justify-content-center" align="center">


                        <?php

                        /*PHP SCRIPT FOR FETCHING MONUMENTS DATA AND DISPLAYING GRID HERE*/

                        include "include/connect.php";

                        $sql = "select *from monument";

                        $result = mysqli_query($conn, $sql) or die("Query Failed !");

                        if (mysqli_num_rows($result) > 0) {

                            $output = "";

                            while ($row = mysqli_fetch_assoc($result)) {

                                $output = $output . "<div class='col-md-3 but1 m-3 p-3 rounded'>
                                                            <div class='row text-center'>
                                                                <img src='upload/{$row['m_id']}/{$row['m_id']}_0.png' class='mx-auto rounded' width='80%' height='190px'>
                                                            </div>
                                                            <div class='row'>

                                                                <a href='monument.php?id={$row['m_id']}' class='text-center btn btn-warning my-2 w-75 mx-auto'>{$row['m_name']}, {$row['city']}</a>
                                                            
                                                            </div>
                                                       </div>";
                            }

                            echo $output;
                        } else {
                            echo "<h2 class='text-center text-danger my-4'>No Monuments Found !!</h2>";
                        }

                        mysqli_close($conn);

                        ?>




                        <!-- <div class="col-md-3  h m-3 but1">
                                <div class="row ">
                                    <div class="col text-center">
                                        <img src="img/gwl_fort.jpg" alt="" width=90%>
                                    </div>
                                    <div class="row">
                                        <div class="col  text-center">
                                            <div type="button" class="btn btn-warning m-auto button1">Gwalior Fort,
                                                Gwalior
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        <!-- <div class="col-md-3 h m-3 but1">

                                <div class="row mt-2">
                                    <div class="col">
                                        <img src="" alt="">
                                    </div>
                                    <div class="row">
                                        <div class="col mt-1">
                                            <div type="button" class="btn btn-warning m-auto button1">Gwalior Fort,
                                                Gwalior
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> -->


                    </div>

                </div>

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