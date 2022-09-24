<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Registration | SMARAKAM | e-Ticketing System for Monuments & Heritage Sites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .error {

            color: red;
            display: none;
            font-size: 12px;

        }

        .cont {
            border: 1px solid rgba(238, 130, 238, 0);
            height: 400px;
            width: 500px;
            margin-top: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            margin-right: 0px;
        }

        .ro {
            width: 450px;
        }

        */ .shadow {
            box-shadow: 100px 100px blue;
        }

        body {
            background-image: url("img/form-bg.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: scroll;
        }

        <?php  // include "css/bootstrap.css" ;
        //include "css/style.css";
        ?><?php //include "js/bootstrap.js" 
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
                    <h3>Register Here</h3>
                </div>
            </div>

            <!-- <div class="row"> -->
            <form id="register-form">
                <span id="form-response" class="my-2">

                </span>
                <input type="text" placeholder="Name" class="ro" name="Name" id="name" required><br>
                <span class='error' id="name-error">*Name shouldn't contain numerical or special characters values..</span>
                <br>
                <input type="text" placeholder="Email" class="ro" name="Email" id="email" required><br>
                <span class='error' id="email-error"> *Invalid email format..</span>
                <br>
                <input type="number" placeholder="Phone Number" class="ro" name="Phone" id="phone" required><br>
                <span class='error' id="phone-error"> *Phone Number should start with (7,8,9) and contain exactly 10 characters..</span>
                <br>
                <input type="text" placeholder="Password" class="ro" name="Password" id="pwd" required>
                <br>
                <span class='error' id="pwd-error">*Password length should be 8-16 characters only.It can contain only numeric values,alphabets and special characters($,#,@,*,_,.,%)</span>
                <br><br>
                <input type="submit" class="btn-sm btn-primary ro" value="Submit" id="register-btn">
            </form>
            <div class="row mb-2"><br>
                <div class="col">Already have an account <a href="login.php" class="text-danger"><b>Login here</b></a></div>
            </div>
            <!-- </div> -->
        </div>
    </div>

    <!-- #INCLUDE JAVA SCRIPT  -->
    <script src="js/jquery-3.6.0.js"></script>

    <!-- #INCLUDE AJAX FILE  -->
    <script>
        // # USED FOR INSTRUCTIING THAT THE BELOW JS CODE EXECUTE AFTER THE PAGE IS READY...
        $(document).ready(function() {


            $("#register-form").submit(function(e) {

                // #FOR STOPING THE PAGE RELOAD
                e.preventDefault();
               // $("#register-btn").attr("disabled", "disabled").val("Submitting....");


                // FETCHING INPUT FIELDS FROM FORM FOR VALIDATION
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var pwd = $("#pwd").val();

                var nameRegex = /^[a-zA-Z ]+$/;
                var emailRegex = /^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9]+)\.([a-z]{2,8})$/;
                var phoneRegex = /^[789][0-9]{9}$/;
                var pwdRegex = /^[0-9a-zA-Z@_#$%*.]{8,16}$/;


                if (nameRegex.test(name) == false) {

                    $("#name-error").show();
                    $("#email-error").hide();
                    $("#phone-error").hide();
                    $("#pwd-error").hide();

                } else if (emailRegex.test(email) == false) {

                    $("#email-error").show();
                    $("#name-error").hide();
                    $("#phone-error").hide();
                    $("#pwd-error").hide();

                } else if (phoneRegex.test(phone) == false) {

                    $("#phone-error").show();
                    $("#email-error").hide();
                    $("#name-error").hide();
                    $("#pwd-error").hide();

                } else if (pwdRegex.test(pwd) == false) {
                    $("#phone-error").hide();
                    $("#email-error").hide();
                    $("#name-error").hide();
                    $("#pwd-error").show();
                } else {

                    $("#phone-error").hide();
                    $("#email-error").hide();
                    $("#name-error").hide();
                    $("#pwd-error").hide();

                    //all good then fire ajax request
                    $.ajax({

                        // # FOR FURTHER PROCESSING
                        url: "register_ajax.php",
                        // # REQUEST METHOD (POST)
                        type: "post",
                        // # DATA TO BE PASSED 
                        data: $("#register-form").serialize(),
                        // # IF FORM SUCCESFULLY SUBMITTED  THEN IT PRINT RESULT
                        success: function(result) {

                            //CODE AFTER SUCCESSFULL EXECUTION

                            if (result == true) {

                                $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Registered Successfully !");
                                //Resetting the form
                                $("#register-form").trigger("reset");

                            } else {

                                $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Failed To Register. Email or Phone already Exists");
                            }

                            $("#register-btn").removeAttr("disabled").val("Submit");

                        }

                    });
                }





            });

        });
    </script>