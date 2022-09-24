<!-- #ADD VALIDATOR FILE  -->

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
    <title>Add Validator | ADMIN PANEL | SMARAKAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
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

        .ro {
            width: 100%;
        }

        /* .cont {
            border: 1px solid black;
            height: 90%;
            width: 900px;
            margin-top: 30px;
            margin-bottom: 30px;
        } */

        #add-validator-form {
            display: flex;
            flex-direction: column;
            width: 60%;
            margin: 10px auto;
            padding: 8px;
            border: 1px solid grey;
            border-radius: 12px;
        }

        #add-validator-form input {
            width: 90%;
            margin: 10px auto;
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
                    <div class="row mt-3" align="center">
                        <h3>Add Validators</h3>
                    </div>

                    <form id="add-validator-form">
                        <span id="form-response" class="text-center p-1 mx-auto d-block mt-3 rounded"></span>
                        <input type="text" placeholder="Enter Validator name" name="v_name" required>
                        <input type="email" placeholder="Enter Email" name="v_email" required>
                        <input type="text" placeholder="Create Password" name="v_pwd" required>
                        <input type="submit" value="Submit" id="add-validator-btn" class="btn btn-primary">
                    </form>

                </div>

                <div class="row bg-dark text-white align-items-center" style="position: absolute; left:0px ; bottom:0px;">
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
    <script>
        $(document).ready(function() {

            // write here the code for javascript and ajax call

            $("#add-validator-form").submit(function(e) {

                e.preventDefault();
                $("#add-validator-btn").attr("disabled", "disabled").val("submitting......");

                $.ajax({

                    url: "add-validator-ajax.php",

                    type: "post",

                    data: $("#add-validator-form").serialize(),

                    success: function(result) {


                        if (result == "true") {

                            $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Successfully submitted");
                            //   $(location).attr("href","add-validator.php"); //#redirection


                        } else {

                            $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Error occured :");


                        }
                        $("#add-validator-btn").removeAttr("disabled").val("Submit");
                        $("#add-validator-form").trigger("reset");


                    }

                });




            });

        });
    </script>






</body>

</html>