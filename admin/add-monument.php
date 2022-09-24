<!-- #ADD MONUMENT FILE  -->
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
    <title>Admin</title>
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

        .cont {
            border: 1px solid black;
            height: 90%;
            width: 900px;
            margin-top: 30px;
            margin-bottom: 30px;
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
                        <h3>Add Monuments / Heritage Sites</h3>
                    </div>
                    <div class="container cont but1">
                        <form id="monumentForm" enctype="multipart/form-data" class="p-3">
                          <span id="form-response" class="text-center p-1 mx-auto d-block mt-3 rounded"></span>
                          <br>
                            <input type="text" placeholder="Monument Name" class="ro" name="m_name" required><br>
                            <br>
                            <input type="text" placeholder="Local Address" class="ro" name="address" required><br>
                            <br>
                            <input type="text" placeholder="Enter City" class="ro" name="city" required><br>
                            <br>
                            <select class="w-100" name ="state" required>
                                <option value="" name="Select">Select State
                                <option value="Madhya Pradesh" name=MP>Madhya Pradesh
                                <option value="Uttar Pradesh" name=UP>Uttar Pradesh
                                <option value="Himachal Pradesh" name=HP>Himachal Pradesh
                                <option value="Arunachal Pradesh" name=ARP>Arunachal Pradesh
                                <option value="Andhra Pradesh" name=AP>Andhra Pradesh
                                <option value="Chhattisgarh" name=CG>Chhattisgarh
                                <option value="Rajasthan" name=RJ>Rajasthan
                                <option value="Jammu & Kashmir" name=J&K>Jammu & Kashmir
                                <option value="Gujrat" name=GJ>Gujrat
                                <option value="Maharashtra" name=MH>Maharashtra
                                <option value="Kerala" name=KL>Kerala
                                <option value="Odisha" name=OD>Odisha
                                <option value="Tamilnadu" name=TN>Tamilnadu
                                <option value="West Bengal" name=WB>West Bengal
                                <option value="Punjab" name=PB>Punjab
                                <option value="Bihar" name=BH>Bihar
                                <option value="Telangana" name=TL>Telangana
                                <option value="Haryana" name=HR>Haryana
                                <option value="Assam" name=AS>Assam
                                <option value="Goa" name=GO>Goa
                                <option value="Manipur" name=MP>Manipur
                                <option value="Jharkhand" name=JH>Jharkhand
                                <option value="Karnataka" name=KR>Karnataka
                                <option value="Uttarakhand" name=Ut>Uttarakhand
                                <option value="Sikkim" name=SI>Sikkim
                                <option value="Nagaland" name=NG>Nagaland
                                <option value="Meghalaya" name=MG>Meghalaya
                                <option value="Mizoram" name=MIZ>Mizoram
                                <option value="Tripura" name=TR>Tripura
                            </select>
                            <br>
                            <br>
                            <textarea rows=5 cols=50 wrap placeholder="Enter Brief Description" class="ro" name="desc" required></textarea>
                            <br>
                            <br>
                            <input type="number" placeholder="Enter Slots/Day" class="ro" name="day" required><br>
                            <br>
                            <div class="row" align="start">
                                <div class="col-2">Opening Time:</div>
                                <div class="col-10"><input type="time" placeholder="" class="ro" name="o-time" required><br></div>
                            </div>
                            <br>
                            <div class="row" align="start">
                                <div class="col-2">Closing Time:</div>
                                <div class="col-10"><input type="time" placeholder="" class="ro" name="c-time" required><br></div>
                            </div>
                            <br>
                            <div class="row" align="start">
                                <div class="col-2"><b>Upload Image:</b></div>
                                <div class="col-10"><input type="file" class="ro" name="image[]" multiple accept="image/*" required><br></div>
                            </div>
                            <br>
                            <!-- <button type="button" class="btn btn-block btn-primary but1 w-100">Submit</button> -->
                            <input type="submit" value="Submit" id="monument-btn" class="btn btn-primary w-75 mx-auto d-block">

                        </form>
                        <!-- <div class="row mt-3 mb-3 ml-3 mr-3 justify-content-center" align="center">
                            <div class="col-5 border border-dark h m-3">STATUS 1</div>
                            <div class="col-5 border border-dark h m-3">STATUS 2</div> -->
                        <!-- <div class="w-100"></div> -->
                        <!-- <div class="col-5 border border-dark h m-3">STATUS 3</div>
                            <div class="col-5 border border-dark h m-3">STATUS 4</div>
                            <div class="col-5 border border-dark h m-3">STATUS 5</div>
                            <div class="col-5 border border-dark h m-3">STATUS 6</div>
                        </div> -->
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
        $(document).ready(function(){


            //ON SUBMIT OF monument FORM
            $("#monumentForm").submit(function(e) {

                e.preventDefault();
                $("#monument-btn").attr("disabled","disabled").val("submitting......");

                var formData = new FormData(monumentForm);  //ALL THE VALUES STORED IN FORMDATA
                 
                $.ajax({

                    url: "add-monument-ajax.php",
                    type: "post",
                    data: formData,
                    contentType : false,
                    processData : false,
                    success: function(result) {

                        if(result == true){

                           $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Monument Added SuccessFully");
                            $("#monumentForm").trigger("reset");

                        }else{
                            $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("Internal Server Error"+result);
                            
                        }
                        $("#monument-btn").removeAttr("disabled").val("Submit");

                    }
              
                });
            });

        });
    </script>






</body>

</html>