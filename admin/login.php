<!-- ADMIN LOGIN FILE  -->

<?php
  
session_start();

if(isset($_SESSION['A-EMAIL'])){
    header("location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        .cont {
            border: 1px solid rgba(238, 130, 238, 0);
            height: 300px;
            width: 500px;
            margin-top: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }

        .ro {
            width: 450px;
        }

        .shadow {
            box-shadow: 100px 100px;
        }

        body {
            background-image: url("../img/bg_login2.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: scroll;
        }
    </style>

</head>

<body>
    <div class="container-fluid" align="center">
        <div class="row">
            <div class="col"><img src="../img/Logo.png" height=150 width=250></div>
        </div>
        <br>
        <div class="row cont shadow bg-light">
            <div class="row">
                <div class="col m-auto">
                    <h3 class="text-dark">Admin Login</h3>
                </div>
            </div>

            <!-- <div class="row"> -->
            <form  id="adminForm" class="rounded">
                <span id="form-response" class="" style="margin-bottom:5px;">
                </span>
                <input type="text" placeholder="Admin Email" class="ro" name="email"  required><br>
                <br>
                <input type="password" placeholder="Admin Password" class="ro" name="password"  required>
                <br>
                <br>
                <input type="submit" class="btn-sm btn-primary ro" value="Submit">
            </form>
           
            <script src=js/jquery-3.6.0.js></script>
            <script>
                $(document).ready(function() {

                    $("#adminForm").submit(function(e) {

                        e.preventDefault();
                        $("#admin-btn").attr("disabled", "disabled").val("submitting....");


                        $.ajax({


                            url: "login-ajax.php",
                            type: "post",
                            data: $("#adminForm").serialize(),
                            success: function(result) {

                                if (result == true) {

                                    $("#adminForm").trigger("reset");
                                    $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Login sucessful");
                                    $(location).attr("href", "home.php"); //#redirection

                                } else {


                                    $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Invalid Credentials");

                                }
                                $("#login-btn").removeAttr("disabled").val("Login");
                                // alert(result);
                            }

                        });

                    });

                });
            </script>

        </div>
    </div>
</body>

</html>