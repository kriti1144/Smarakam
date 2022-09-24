<!-- #USER LOGIN FILE  -->

<?php
 
  session_start();
  
 if(isset($_SESSION['UID'])){

      header("location: home.php");

 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SMARAKAM | e-Ticketing System for Monuments & Heritage Sites</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

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
            background-image: url("img/form-bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: scroll;
        }
        <?php 
                // include "css/bootstrap.css";
                // include "css/style.css";
        ?>
        <?php 
            //include "js/bootstrap.js"
         ?>
    </style>
</head>

<body>
    <div class="container-fluid" align="center">
        <div class="row">
            <div class="col"><img src="img/logo.png" height=150 width=250></div>
        </div>
        <br>
        <div class="row cont shadow bg-light rounded">
            <div class="row">
                <div class="col m-auto">
                    <h3>Login</h3>
                </div>
            </div>
            <div class="row">
                <form id="login_form" >
                   <span id="form-response">
            
                   </span> 
                   <input type="text" placeholder="Email" class="ro" name="Email" required><br>
                    <br>
                    <input type="password" placeholder="Password" class="ro" name="Password" required>
                    <br>
                    <br>
                    <input type="submit" class="btn-sm btn-primary ro" value="Submit" id="login-btn">
                </form>

            </div>

            <div class="row">
                 <div class="col">Don't have an Account <a href="register.php" class="text-danger"><b>Register here</b></a></div> 
            </div>

        </div>
    </div>
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function(){


            //ON SUBMIT OF LOGIN FORM
            $("#login_form").submit(function(e) {

                e.preventDefault();
                $("#login-btn").attr("disabled","disabled").val("logging in......");

                $.ajax({

                    url: "login-ajax.php",
                    type: "post",
                    data: $("#login_form").serialize(),
                    success: function(result) {


                        if(result == true){
                              
                               $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Successfully Login");
                               $(location).attr("href","index.php"); //#redirection

                        }else{

                               $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Invalid credentials");
                             }
                        $("#login-btn").removeAttr("disabled").val("Login");
                        // alert(result); 
                    }

                });
            });

        });
    </script>
</body>

</html>