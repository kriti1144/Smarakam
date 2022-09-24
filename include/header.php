<?php

/*  THIS UIS THE HEADER OF CLIENT SIDE 
    IT CONTAINES LOGO, LOGIN BTN, AND NAV BAR
*/
?>

<div class="row" align="center" id="header">
    <div class="col-sm-2 m-sm-auto">
        <img src="img/logo.png" width="100%">
    </div>
    <div class="col-sm-8 text-center">
        <h1 class="vcenter">Welcome To Incredible India</h1>
    </div>
    <div class="col-sm-2 text-center">

        <?php
        
          

            if(isset($_SESSION['UID'])){

                //  SESSION ALREADY EXISTS, SHOW LOGOUT BTN
                echo "<div class='row vcenter'>
                        <a href='logout.php' class='btn btn-danger w-75 mx-auto'>Logout</a>
                        <div class='text-center text-dark bg-light'>Welcome {$_SESSION['NAME']}</div>
                      </div>";

            }else{

                //SESSION NOT EXISTS, SHOW LOGIN BTN
                echo "<a href='login.php' class='btn btn-primary w-75 vcenter'>Login</a>";
            }
        
        ?>
      
    </div>
</div>
<div class="row text-dark bg-dark" align="center">
    <div class="col-sm-2">
        <a class="nav-link active text-light button" aria-current="page" href="home.php">Home</a>
    </div>
    <div class="col-sm-2">
        <a class="nav-link active text-light button" aria-current="page" href="monuments-grid.php">View Monuments</a>
    </div>
    <div class="col-sm-2">
        <a class="nav-link active text-light button" aria-current="page" href="view-booking.php">Bookings</a>
    </div>
</div>