<?php
        session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONUMENT | SMARAKAM | e-Ticketing System for Monuments & Heritage Sites</title>
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
        }

        .slotBox {
            text-align: center;
            border-radius: 8px;
            padding: 20px;
            font-weight: bold;
            width: 90%;
            margin: 5px auto;
        }
        .slotBox:hover{
            box-shadow: 3px 3px 10px 3px grey;
            
        }

        .green {
            color: white;
            border: 3px solid darkgreen;
            background-color: green;
        }

        .red {
            color: red;
            border: 1px solid red;
            background-color: lightcoral;
        }
        .button:hover{
            transition:0.5s;
            background-color: grey;
        }

        .monument-img{
        
        }

        @media (max-width:800px){

            .monument-img{
                width: 90%;
                height: max-content;
            }

        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <!-- INCLUDING HEADER-->
        <?php
        include "include/header.php";
        ?>

        <div class="container">

            <?php

            $mid = $_GET['id'];

            include "include/connect.php";

            $sql = "select *from monument where m_id='{$mid}'";

            $result = mysqli_query($conn, $sql) or die("Query failed");

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);

                $totalSlots = $row['slots_per_day'];
                $img_count = $row['img_count'];

                //<img src='upload/{$row['m_id']}/{$row['m_id']}_0.png' width='60%' height='400px'>

                echo " <div class='row text-center mt-5'>
                            <div class='col'>
                                <div id='myCarousel' class='carousel slide ' data-ride='carousel'>
                                <div class='carousel-inner'>";

                echo " <div class='carousel-item active data-interval='1500'>
                            <img class='d-block w-75 mx-auto' src='upload/{$mid}/{$mid}_0.png' class='monument-img' height=400>
                        </div>";

                        for ($i = 1; $i < $img_count; $i++) {

                            echo " <div class='carousel-item data-interval='1500 '>
                                    <img class='d-block w-75 mx-auto' src='upload/{$mid}/{$mid}_{$i}.png'  class='monument-img' height=400>
                                    </div>";

                        }
                           
                 echo "</div>
                        <a class='carousel-control-prev' href='#myCarousel' role='button' data-slide='prev'>
                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                            <span class='sr-only text-dark'></span>
                        </a>
                        <a class='carousel-control-next' href='#myCarousel' role='button' data-slide='next'>
                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                            <span class='sr-only text-dark'></span>
                        </a>
                 </div>";           

                echo " <div class='row text-center my-3'>
                                <h3>{$row['m_name']}</h3>
                            </div>";



                //LOGIC FOR BOOKING SLOTS
                $output = "<div class='row my-3'>";
                $total_slots = $row['slots_per_day'];
                $today = date('Y-m-d');


                $userDateArr = array();
                $dateForDB = array();

                for ($i = 1; $i < 5; $i++) {

                    $var  = strtotime($i . " day", strtotime($today));
                    $newDate = date('d-M-Y', $var);

                    $userDateArr[$i] = $newDate;
                    $dateForDB[$i] = date('Y-m-d', strtotime($newDate));

                    // echo "<br>".$userDateArr[$i]." --------------   ".$dateForDB[$i];

                }

                for ($i = 1; $i < 5; $i++) {

                    $avl_slots = $total_slots;

                    $sqlDate = "select sum(no_of_heads) as booked from booking where m_id='{$mid}' and date='{$dateForDB[$i]}' and status=1";
                    $result = mysqli_query($conn, $sqlDate) or die("Query Failed");
                    $row2 = mysqli_fetch_assoc($result);

                    if ($row2['booked'] != NULL) {
                        $avl_slots = $total_slots - $row2['booked'];
                    }

                    if ($avl_slots > 0) {

                        $date = $dateForDB[$i];
                        $output = $output . "<div class='col-sm-3'>
                                                <a href='book-ticket.php?id=".$mid."&date=".$date."'>
                                                        <div class='slotBox green'>
                                                        <div>
                                                            {$userDateArr[$i]}
                                                        </div>
                                                        <div>
                                                            AVL {$avl_slots}
                                                        </div>
                                                        </div>
                                                    </a>
                                                </div>";
                    }else{
                        $output = $output . "<div class='col-sm-3'>
                                                    <a href='#'>
                                                            <div class='slotBox red'>
                                                            <div>
                                                                {$userDateArr[$i]}
                                                            </div>
                                                            <div>
                                                                AVL 00
                                                            </div>
                                                            </div>
                                                        </a>
                                                    </div>";
                    }
                }

                $output = $output . "</div>";

                echo $output;



                echo "<div class='row my-3'>
                <table class='table table-responsive table-bordered table-striped w-75 mx-auto text-center'>
                            <tr>
                                <th>Monument Name : </th>
                                <td>{$row['m_name']}</td>   
                            </tr>
                            <tr>
                                <th>Address : </th>
                                <td>{$row['address']}</td>   
                            </tr>
                            <tr>
                                <th>City : </th>
                                <td>{$row['city']}</td>   
                            </tr>
                            <tr>
                                <th>State : </th>
                                <td>{$row['state']}</td>   
                            </tr>
                            <tr>
                                <th>Opening Time : </th>
                                <td>{$row['opening_time']}</td>   
                            </tr>
                            <tr>
                                <th>Closing Time : </th>
                                <td>{$row['closing_time']}</td>   
                            </tr>
                            
                        </table></div>";

                echo "<div class='row m-auto' style='width:90%; text-align:justify;'>
                                <h5>About:</h5><p>{$row['description']}</p>
                        </div>";
            } else {
                die("Monument not found");
            }



            mysqli_close($conn);

            ?>


        </div>



        <!-- INCLUDING FOOTER -->
        <?php
        include "include/footer.php";
        ?>

    </div>





    <script src="js/jquery-3.6.0.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>

    </script>
</body>

</html>