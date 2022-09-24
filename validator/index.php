<?php

session_start();

if (isset($_SESSION['VID'])) {
    //DO NOTHING
} else {
    header("location: signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validator Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        form {
            border: 1px solid lightgrey;
            display: flex;
            flex-direction: column;
            padding: 20px;
            margin: 50px auto;
            width: 500px;
        }

        form input {
            margin: 10px auto;
            width: 100%;
        }

        .shadow {
            box-shadow: 100px 100px;
        }
    </style>
</head>

<body>

    <div class="container">
        <DIV class="row bg-light">
            <div class="col-2">
                <img src="../img/logo.png" width="100%">
            </div>
            <div class="col-7">
                <h3 class="text-center vcenter">Validator Dashboard</h4>
            </div>
            <div class="col-3">
                <a href="logout.php" class="btn btn-danger d-block vcenter">Logout</a>
            </div>
        </DIV>
        <div class="row bg-light">
            <div class="col py-1">
                <?php
                echo "<h6 class='vcenter' style='margin-left: 450px;'><b>{$_SESSION['VNAME']}</b></h6>";
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <form id="validate-ticket-form" class="rounded bg-light shadow">
                    <h4 class="text-center my-2">Validate Ticket</h4>
                    <input type="text" placeholder="Enter Ticket Number" id='ticket-no' name="b_id" required />
                    <input type="submit" value="Verify" class="btn btn-primary">
                </form>

                <div class="row" id="ticket-info">
                    <!--  ALL THE TICKET DETAILS WILL BE FETCHED AND DISPLAYED HERE-->
                </div>


            </div>
        </div>
    </div>

    <script src="../js/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {

            $("#validate-ticket-form").submit(function(e) {

                e.preventDefault()

                $.ajax({

                    url: "validate-ticket-ajax.php",
                    type: "post",
                    data: $("#validate-ticket-form").serialize(),
                    success: function(result) {


                        if (result == "false") {


                            $("#ticket-info").html("<h3 class ='text-danger text-center'>Booking not found</h3>");

                        } else {

                            $("#ticket-info").html(result); //ticket info ka result isme aake stored hoga

                        }

                    }

                });


            });




        });
    </script>
</body>

</html>