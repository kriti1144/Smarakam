<?php

session_start();


if(isset($_SESSION['UID'])){

}else{
    header("location: login.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY BOOKINGS | SMARAKAM | e-Ticketing System for Monuments & Heritage Sites</title>
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

        <div class="row" id="bookings-container">
            <div class="col">
                <h3 class="text-center my-4">My Bookings</h3>
                <div class="container">
                 
                    <?php

                    include "include/connect.php";
                   
                   //session_start();

                    $userid = $_SESSION['UID'];

                    $sql = "select *from booking inner join monument on booking.m_id = monument.m_id where u_id='{$userid}' order by date desc ";
                    

                    $result = mysqli_query($conn,$sql);
                    
                    if(mysqli_num_rows($result)>0){

                        $output =  "";

                        while($row=mysqli_fetch_assoc($result)){

                            // $sql2 = "select*from ticket_details  where  b_id={$row['b_id']}";//pending....

                            $output = $output."<div class='row my-3 p-4 border-1 bg-light rounded w-75 mx-auto'>
                                                    <div class='col-4'>
                                                        {$row['m_name']}<br>
                                                        <b style='color:navy;'> Ticket No. : {$row['b_id']}</b>
                                                    </div>
                                                    <div class='col-3'>
                                                        {$row['date']}
                                                    </div>
                                                    <div class='col-3'>
                                                   <b> {$row['no_of_heads']} Visitors</b>
                                                    </div>";

                                                if($row['status'] == 1){

                                                    $output .= "<div class='col-sm-2'>
                                                                     <a href='cancel-ticket.php?id={$row['b_id']}' class='btn-sm btn-danger '>Cancel Visit</a>
                                                                </div></div>";
                                                }else{
                                                    $output .= "<div class='col-sm-2 text-dark'>
                                                                   <b>  CANCELLED</b>
                                                                </div></div>";
                                                }
                                                   
                                                    

                                            

                        }

                        echo $output;

                
                    }else{
                        echo "<h4 class='text-center text-danger my-4'> Currently No Bookings</h4>";
                    }

                  
                   
                   
                   ?>

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