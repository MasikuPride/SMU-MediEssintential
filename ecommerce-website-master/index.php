<!-- filepath: c:\xampp\htdocs\ecommerce-website-master\index.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMU MediEssential | Online Shopping Site for Medical Equipment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Delius+Swash+Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <style>
        .welcome-text {
            font-family: 'Delius Swash Caps', cursive;
            font-size: 2rem;
            color: #ff9800;
            text-shadow: 2px 2px 4px #000000;
            margin-top: 20px; /* Adjust this value to push the text down */
            margin-bottom: 10px; /* Adjust this value to bring the text closer */
        }
        .logo {
            margin-top: 20px;
            margin-bottom: 10px;
        }
        #banner_content {
            padding-top: 20px; /* Adjust this value to bring the text closer */
            margin-bottom: 0px; /* Adjust this value to reduce the gap */
        }
        .product-section {
            margin-top: 20px; /* Adjust this value to reduce the gap */
        }
    </style>
</head>
<body style="margin-bottom:200px">
    <!--Header-->
    <?php
    include 'includes/header_menu.php';
    include 'includes/check-if-added.php';
    ?>
    <!--Header ends-->

    <!-- Display Payment Canceled Message -->
    <?php
    if (isset($_GET['payment_status']) && $_GET['payment_status'] == 'canceled') {
        echo "<div class='alert alert-warning text-center'>Payment was canceled. Please try again.</div>";
    }
    ?>

    <!-- Logo and Welcome Text -->
<!-- Logo and Welcome Text -->
<!-- Logo and Welcome Section -->
 
<div class="container text-center my-4">
    <div class="d-flex justify-content-center align-items-center flex-column">
        <img src="images/logo1.jpg" alt="SMU MediEssential Logo" class="logo img-fluid mb-3" style="width: 250px; height: auto; margin-top: 40px;">
        <h2 class="welcome-text">Welcome to <span style="color:#ff9800;">SMU MediEssential</span> Online Store</h2>
    </div>
</div>

    </div>

    <div id="content">
        <div id="bg" class=" ">
            <div class="container" style="padding-top:20px"> <!-- Adjust this value to bring the text closer -->
            <div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;">
            <h1>We sell Quality Medical Equipment</h1>
            <p>Flat 40% OFF on premium brands</p>
            <a href="products.php" class="btn btn-warning btn-lg text-white">Shop Now</a>
            </div>
        
    </div>
    <!--menu highlights start-->
    <div class="container pt-3 product-section">
        <div class="row text-center">
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#stethoscope">
                    <img src="images/stethoscope.webp" class="img-fluid" alt="" style="border-radius:0.5rem">
                    <div class="h5 pt-3 font-weight-bolder">
                        Stethoscopes
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#scrubs">
                    <img src="images/scrubs.jpg" class="img-fluid zoom" alt="" style="border-radius:0.5rem">
                    <div class="h5 pt-3 font-weight-bolder">
                        Scrubs
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#labcoats">
                    <img src="images/labcoats.jpg" class="img-fluid" alt="" style="border-radius:0.5rem">
                    <div class="h5 pt-3 font-weight-bolder">
                        Lab Coats
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#masks">
                    <img src="images/masks.jpg" class="img-fluid" alt="" style="border-radius:0.5rem">
                    <div class="h5 pt-3 font-weight-bolder">
                        Masks
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3 py-3">
                <a href="products.php#gloves">
                    <img src="images/gloves.jpg" class="img-fluid" alt="" style="border-radius:0.5rem">
                    <div class="h5 pt-3 font-weight-bolder">
                        Gloves
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--menu highlights end-->
    <!--footer -->
    <?php include 'includes/footer.php'?>
    <!--footer end-->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {
if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}
});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>