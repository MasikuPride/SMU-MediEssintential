<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> SMU MediEssential |Online Shopping Site for Medical Equipment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--header -->
 <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Welcome to SMU MediEssential!</h1>
            <p>We have wide range of medical Equipments for you.No need to hunt around,we have all in one place</p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
    <hr/>
    <!--menu list-->
    <div class="row text-center" id="Stethoscope">
        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/Pink Stethoscope.webp" alt="" class="img-fluid pb-1" >
                <div class="figure-caption">
                    <h6>Pink Stethoscope</h6>
                    <h6>Price :R700</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(1)) {
                     echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                        ?>
                        <p><a href="cart-add.php?id=1" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a><p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/stethoscope.webp" alt="" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6>Black Stethoscope </h6>
                    <h6>Price :R650</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(2)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                         } else {
                        ?>
                        <p><a href="cart-add.php?id=2" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                        <?php
                         }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/blue stetoscope.jpg" alt="" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6>Blue Stethoscope</h6>
                    <h6>Price :R600 </h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(3)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        <p><a href="cart-add.php?id=3" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 py-2">
            <div class="card">
                <img src="images/Green stetoscope.jpg" alt="" class="img-fluid pb-1">
                <div class="figure-caption">
                    <h6>Green stetoscope</h6>
                    <h6>Price :R800</h6>
                    <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                        if (check_if_added_to_cart(4)) {
                        echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                        } else {
                        ?>
                        </p><a href="cart-add.php?id=4" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center" id="scrubs">
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/scrubs.jpg" alt="Blue Scrubs" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>Blue Scrubs</h6>
                <h6>Price :R1800</h6>
                <?php if (!isset($_SESSION['email'])) { ?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(5)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=5" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/Pink  scrubs.jpg" alt="Pink Scrubs" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>Pink Scrubs</h6>
                <h6>Price :R1800</h6>
                <?php if (!isset($_SESSION['email'])) { ?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(6)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=6" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/Red Scrubs.jpg" alt="Red Scrubs" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>Red Scrubs</h6>
                <h6>Price :R1800</h6>
                <?php if (!isset($_SESSION['email'])) { ?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(7)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=7" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/Green Scrubs.webp" alt="Green Scrubs" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>Green Scrubs</h6>
                <h6>Price :R1800</h6>
                <?php if (!isset($_SESSION['email'])) { ?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(8)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=8" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
        <div class="row text-center" id="shoes">
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/white lab coats.jpg" alt="White Lab Coat" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>White lab coat</h6>
                <h6>Price :R900</h6>
                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(9)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=9" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/Blue coats.jpg" alt="Blue Lab Coat" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>Blue lab coat</h6>
                <h6>Price :R1000</h6>
                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(10)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=10" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/Red lab.webp" alt="Red Lab Coat" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>Red lab coat</h6>
                <h6>Price :R1300</h6>
                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(11)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=11" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 py-3">
        <div class="card">
            <img src="images/black labcoat.jpg" alt="Black Lab Coat" class="img-fluid pb-1" style="width: 300px; height: 400px;">
            <div class="figure-caption">
                <h6>Black lab coat</h6>
                <h6>Price :R1000</h6>
                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                <?php } else {
                    if (check_if_added_to_cart(12)) {
                        echo '<p><a href="#" class="btn btn-warning text-white" disabled>Added to cart</a></p>';
                    } else { ?>
                        <p><a href="cart-add.php?id=12" name="add" value="add" class="btn btn-warning text-white">Add to cart</a></p>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
            <div class="row text-center" id="Masks and Gloves">
                    <div class="col-md-3 col-6 py-3" >
                        <div class="card">
                            <img src="images/Face mask blue.jpg" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>Blue Mask</h6>
                                <h6>Price :R5</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(13)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    <p> <a href="cart-add.php?id=13" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                    <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-3">
                        <div class="card">
                            <img src="images/black  mask.jpg" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>Black mask</h6>
                                <h6>Price :R5</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(14)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    </p><a href="cart-add.php?id=14" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                    <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-3">
                        <div class="card">
                            <img src="images/gloves.jpg" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>Blue gloves</h6>
                                <h6>Price :R10</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(15)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    </p><a href="cart-add.php?id=15" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                   <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 py-3">
                        <div class="card">
                            <img src="images/White gloves.webp" alt="" class="img-fluid pb-1">
                            <div class="figure-caption">
                                <h6>White gloves</h6>
                                <h6>Price :R10</h6>
                                <?php if (!isset($_SESSION['email'])) {?>
                    <p><a href="index.php#login" role="button" class="btn btn-warning  text-white ">Add To Cart</a></p>
                    <?php
                    } else {
                    if (check_if_added_to_cart(16)) {
                    echo '<p><a href="#" class="btn btn-warning  text-white" disabled>Added to cart</a></p>';
                    } else {
                    ?>
                    <p> <a href="cart-add.php?id=16" name="add" value="add" class="btn btn-warning  text-white">Add to cart</a></p>
                    <?php
                    }
                    }
                    ?>
                            </div>
                        </div>
                    </div>
                </div>
      </div>
      <!--menu list ends-->
      <!-- footer-->
        <?php include 'includes/footer.php'?>
      <!--footer ends-->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
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