<?php

session_start();

if(isset($_SESSION['VID'])){
    header("location: index.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDATOR LOGIN | SMARAKAM</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body {
            background-image: url("../img/form-bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: scroll;
        }

        form {
            display: flex;
            flex-direction: column;
            margin : 30px auto;
            width: 500px;
            padding: 25px 10px;
            border-radius: 12px;
        }

        form input {
            margin: 10px 10px;
        }

        .shadow {
            box-shadow: 100px 100px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col text-center"><img src="../img/logo.png" height=150 width=250></div>
        </div>
        <div class="row">
            <div class="col">
                <form id="form-tag" class="bg-light shadow">
                    <h4 class="text-center my-1">Validator Login</h4>
                    <span id="form-response" class="text-center p-1 mx-1">

                    </span>
                    <input type="email" name="Email" placeholder="Enter Email" required>
                    <input type="password" name="Password" placeholder="Enter Password" required>
                    <input type="submit" value="Login" id="sign-in-btn" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>




    <script src="../js/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function() {

            $("#form-tag").submit(function(e) {

                e.preventDefault();

                $("#sign-in-btn").attr("disabled", "disabled").val("Signing in......");

                $.ajax({

                    url: "login-ajax.php",
                    type: "post",
                    data: $("#form-tag").serialize(),
                    success: function(result) {


                        if (result == true) {

                            $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Logged In Successfully");
                            $(location).attr("href", "index.php"); //#redirection

                        } else {

                            $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Invalid Credentials");

                        }



                        $("#sign-in-btn").removeAttr("disabled").val("Login");
                        $("#form-tag").trigger("reset");
                    }

                });
            });


        });
    </script>
</body>

</html>