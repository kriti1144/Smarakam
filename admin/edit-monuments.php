
<!-- #edit  monument FILE  -->
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
    <title>UPDATE MONUMENTS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
          #monumentedit{
              border: 1px solid black ;
              display:flex;
              flex-direction:column;
              padding:20px;
              margin: 20px auto; 
              width: 800px;

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
                        <h3 class='text-center my-3'>*UPDATE MONUMENTS*</h3>
                        <?php
                          $monument=$_GET['id'];
                           
                          include "include/connect.php";

                          $sql= "select* from monument where m_id='{$monument}'";

                          $result = mysqli_query($conn,$sql) or die("query failed");
                          
                          if(mysqli_num_rows($result)>0){
 
                               $row=mysqli_fetch_assoc($result);
                            
                               echo  "<form id='monumentedit'>
                               
                               <span id='form-response' class='text-center p-1 mx-auto d-block mt-3 rounded'></span>
                               <input type='text' placeholder='NEW MONUMENT' class='ro' name='m_name' required value='{$row['m_name']}'><br>
                               <br>
                               <input type='text' placeholder='NEW ADDRESS' class='ro' name='address' required value='{$row['address']}'><br>
                               <br>
                               <input type='text' placeholder='NEW CITY' class='ro' name='city' required value='{$row['city']}'><br>
                               <br>
                               <select class='w-100' name ='state' value='{$row['state']}' required>
                                   <option value='' name='Select'>Select State
                                   <option value='Madhya Pradesh' name=MP>Madhya Pradesh
                                   <option value='Uttar Pradesh' name=UP>Uttar Pradesh
                                   <option value='Himachal Pradesh' name=HP>Himachal Pradesh
                                   <option value='Arunachal Pradesh' name=ARP>Arunachal Pradesh
                                   <option value='Andhra Pradesh' name=AP>Andhra Pradesh
                                   <option value='Chhattisgarh' name=CG>Chhattisgarh
                                   <option value='Rajasthan' name=RJ>Rajasthan
                                   <option value='Jammu & Kashmir' name=J&K>Jammu & Kashmir
                                   <option value='Gujrat' name=GJ>Gujrat
                                   <option value='Maharashtra' name=MH>Maharashtra
                                   <option value='Kerala' name=KL>Kerala
                                   <option value='Odisha' name=OD>Odisha
                                   <option value='Tamilnadu' name=TN>Tamilnadu
                                   <option value='West Bengal' name=WB>West Bengal
                                   <option value='Punjab' name=PB>Punjab
                                   <option value='Bihar' name=BH>Bihar
                                   <option value='Telangana' name=TL>Telangana
                                   <option value='Haryana' name=HR>Haryana
                                   <option value='Assam' name=AS>Assam
                                   <option value='Goa' name=GO>Goa
                                   <option value='Manipur' name=MP>Manipur
                                   <option value='Jharkhand' name=JH>Jharkhand
                                   <option value='Karnataka' name=KR>Karnataka
                                   <option value='Uttarakhand' name=Ut>Uttarakhand
                                   <option value='Sikkim' name=SI>Sikkim
                                   <option value='Nagaland' name=NG>Nagaland
                                   <option value='Meghalaya' name=MG>Meghalaya
                                   <option value='Mizoram' name=MIZ>Mizoram
                                   <option value='Tripura' name=TR>Tripura
                               </select>
                               <br>
                               <br>
                               <textarea rows=5 cols=50 wrap placeholder='NEW DESCRIPTION' class='ro' name='desc' required >{$row['description']}</textarea>
                               <br>
                               <br>
                               <input type='number' placeholder='Enter Slots/Day' class='ro' name='day' required value={$row['slots_per_day']}><br>
                               <br>
                               <div class='row' align='start'>
                                   <div class='col-2'>Opening Time:</div>
                                   <div class='col-10'><input type='time' placeholder='EDIT TIME' class='ro' name='o-time' required value={$row['opening_time']}><br></div>
                               </div>
                               <br>
                               <div class='row' align='start'>
                                   <div class='col-2'>Closing Time:</div>
                                   <div class='col-10'><input type='time' placeholder='EDIT TIME' class='ro' name='c-time' required value={$row['closing_time']}><br></div>
                               </div>
                               
                               <br>
                               <!-- <button type='button' class='btn btn-block btn-primary but1 w-100'>Submit</button> -->
                               <input type='submit' value='Submit' id='monument-btn' class='btn btn-primary w-75 mx-auto d-block'>
   
                           </form>";

                                mysqli_close($conn);


                           }
                           
                           else {

                              mysqli_close($conn);
                               
                              echo "Monument not found..";

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
                
            $("#monumentedit").submit(function(e) {

                e.preventDefault();
                $("#monumentedit-btn").attr("disabled", "disabled").val("updating......");

                $.ajax({

                    url: "monumentedit-ajax.php?id=<?php echo $monument ;?>", //id url path

                    type: "get",

                    data: $("#monumentedit").serialize(),

                    success: function(result) {


                        if (result == true) {

                            $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Successfully updated.");
                              $(location).attr("href","monuments.php"); //#redirection
                            // $("#useredit").trigger("reset"//form reset hoga isse sussecfully submiision ke bad


                        } else {

                            $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Error occured :"+result);


                        }
                        $("#monumentedit-btn").removeAttr("disabled").val("Submit");


                    }

                });




            });

        });
    </script>




</body>

</html>