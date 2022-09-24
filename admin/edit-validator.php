
<!-- #edit user FILE  -->
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
    <title>UPDATE USER ACCOUNTS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
          #validatoredit{
              border: 1px solid black ;
              display:flex;
              flex-direction:column;
              padding:20px;
              margin: 20px auto; 
              width: 600px;

          }
          #validatoredit input{
              display:block;
              width: 100%;
              margin: 10px auto;



          }

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
                    <div class="container">
                        <h3 class='text-center my-3'>*UPDATE USER FORM*</h3>
                        <?php
                          $validator=$_GET['id'];
                           
                          include "include/connect.php";

                          $sql= "select* from validator where v_id='{$validator}'";

                          $result = mysqli_query($conn,$sql) or die("query failed");
                          
                          if(mysqli_num_rows($result)>0){
 
                               $row=mysqli_fetch_assoc($result);
                            
                               echo  "<form id='validatoredit'>
                               
                               <span id='form-response' class='text-center p-1 mx-auto d-block mt-3 rounded'></span>
                               <input type='text' name='name' required placeholder='NEW NAME' value='{$row['v_name']}'>
                               <input type='email' name='email' required placeholder='NEW EMAIL'value='{$row['v_email']}'>
                               <input type='submit' value='update' class='btn-success' id='useredit-btn'>
                               </form>";

                               mysqli_close($conn);


                           }
                           
                           else {

                              mysqli_close($conn);
                               
                              echo "validator not found..";

                           }

        
                       


                        ?>
                     </div> 

                </div>

                <div class="row bg-dark text-white align-items-center">
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
                
            $("#validatoredit").submit(function(e) {

                e.preventDefault();
                $("#validatoredit-btn").attr("disabled", "disabled").val("updating......");

                $.ajax({

                    url: "validatoredit-ajax.php?id=<?php echo $validator ;?>", //id url path

                    type: "get",

                    data: $("#validatoredit").serialize(),

                    success: function(result) {


                        if (result == true) {

                            $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Successfully updated.");
                              $(location).attr("href","validator.php"); //#redirection
                            // $("#useredit").trigger("reset"//form reset hoga isse sussecfully submiision ke bad


                        } else {

                            $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Error occured :"+result);


                        }
                        $("#validatoredit-btn").removeAttr("disabled").val("Submit");


                    }

                });




            });

        });
    </script>




</body>

</html>