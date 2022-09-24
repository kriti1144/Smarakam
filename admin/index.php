<?php

    session_start();

    if(isset($_SESSION['A-EMAIL'])){
        //home page
        header("location: home.php");
    }else{
        header("location: login.php");
    }


?>