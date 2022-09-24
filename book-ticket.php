<?php

session_start();

if (isset($_SESSION['UID'])) {
} else {
    header("location: login.php");
}

$mid = $_GET['id'];
$date = $_GET['date'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css"> <!-- METHOD 1 : EXTERNAL CSS-->

    <!-- method 2 : INTERNAL CSS -->
    <style>
        #booking-form {
            border: 1px solid black;
            width: 750px;
            display: flex;
            flex-direction: column;
            margin: 30px auto;
            padding: 15px;

        }

        #no-of-visitors-form {
            border: 1px solid black;
            width: 750px;
            display: flex;
            flex-direction: column;
            margin: 30px auto;
            padding: 15px;

        }

        #booking-form input,
        #booking-form select {
            margin: 10px auto;
            width: 90%;
        }

        #number-of-visitors,
        #monument-id,
        #date {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center bg-success text-light p-5">
                <h2> Book Ticket </h2>
            </div>
        </div>
        <div class="row">

            <!-- number of visitors form -->
            <form id="no-of-visitors-form">
                <label for="">Select No. of Visitors : </label>
                <select name="" id="no-of-heads" class="w-50 d-block mx-2  my-4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Proceed">
            </form>

            <div class='row'>
            
                    <!-- Booking form . this will be visible after above form submit -->
                    <form id="booking-form" class="bg-light">


                    </form>
            
            </div>

        </div>
    </div>
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function(e) {


            $("#no-of-visitors-form").submit(function(e) {

                e.preventDefault();

                var count = $("#no-of-heads").val();

                var mid = '<?php echo $mid; ?>';
                var date = '<?php echo $date; ?>';

                var output = "<input type='number' value='" + count + "' id='number-of-visitors' name='count'><input type='text' value='" + mid + "' id='monument-id' name='m-id'><input type='text' value='" + date + "' id='date' name='date'>";

                for (var i = 1; i <= count; i++) {

                    output = output + "<b class='text-center'>Visitor" + i + "</b><input type='text' name='name" + i + "' placeholder='Enter Name' required> <input type='number' name='age" + i + "' placeholder='Enter Age' required><select name='gender" + i + "' id='gender-box'><option value='M'>Male</option><option value='F'>Female</option></select> <br>";

                }

                output = output + "<input type='submit' value='Book Now' class='btn-primary'>";

                $("#booking-form").html(output).show();


            });

            $("#booking-form").submit(function(e) {


                e.preventDefault();
                $.ajax({

                    url: "book-ticket-ajax.php",
                    type: "post",
                    data: $("#booking-form").serialize(),
                    success: function(result) {


                        if (result == true) {



                            $("#form-response").show().addClass("alert-success").removeClass("alert-danger").html("Booking Successfull ");
                            $(location).attr("href", "view-booking.php"); //#redirection


                        } else {

                            $("#form-response").show().addClass("alert-danger").removeClass("alert-success").html("not booked yet:");


                        }



                        $("#add-validator-btn").removeAttr("disabled").val("Submit");
                    }

                });


            });
        });
    </script>
</body>

</html>