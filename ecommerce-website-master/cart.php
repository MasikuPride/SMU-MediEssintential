<!-- filepath: c:\xampp\htdocs\ecommerce-website-master\cart.php -->
<?php
require "includes/common.php";

// Redirect to login if the user is not logged in
if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMU MediEssential | Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin-bottom: 150px; /* Same as footer height */
            padding-top: 60px; /* For fixed navbar */
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 150px; /* Fixed footer height */
            background-color: #141414;
            color: white;
            padding-top: 40px;
        }
        .table-responsive {
            margin-bottom: 50px; /* Add space above footer */
        }
        .empty-cart-message {
            text-align: center;
            padding: 50px 0;
        }
    </style>
</head>
<body>
<?php
include 'includes/header_menu.php';
?>
<div class="d-flex justify-content-center">
    <div class="col-md-8 my-5 table-responsive p-5">
        <form action="delivery_details.php" method="POST">
            <table class="table table-striped table-bordered table-hover">
                <?php
                $sum = 0;
                $user_id = $_SESSION['user_id'];
                $query = "SELECT products.price AS Price, products.id, products.name AS Name, users_products.size AS Size 
                          FROM users_products 
                          JOIN products ON users_products.item_id = products.id 
                          WHERE users_products.user_id='$user_id' AND status='Added To Cart'";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) >= 1) {
                    ?>
                    <thead>
                        <tr>
                            <th>Item Number</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $sum += $row["Price"];
                            echo "<tr>";
                            echo "<td>#{$row['id']}</td>";
                            echo "<td>{$row['Name']}</td>";
                            echo "<td>R {$row['Price']}</td>";

                            // Add size selection for lab coats and scrubs
                            if (strpos(strtolower($row['Name']), 'lab coat') !== false || strpos(strtolower($row['Name']), 'scrubs') !== false) {
                                echo "<td>";
                                echo "<select id='size_{$row['id']}' name='size_{$row['id']}' class='form-control d-inline w-auto'>";
                                echo "<option value='S'" . ($row['Size'] == 'S' ? ' selected' : '') . ">S - Small</option>";
                                echo "<option value='M'" . ($row['Size'] == 'M' ? ' selected' : '') . ">M - Medium</option>";
                                echo "<option value='L'" . ($row['Size'] == 'L' ? ' selected' : '') . ">L - Large</option>";
                                echo "<option value='XL'" . ($row['Size'] == 'XL' ? ' selected' : '') . ">XL - Extra Large</option>";
                                echo "</select>";
                                echo "</td>";
                            } else {
                                echo "<td>N/A</td>";
                            }

                            echo "<td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'>Remove</a></td>";
                            echo "</tr>";
                        }
                        echo "<tr><td></td><td><strong>Total</strong></td><td><strong>R {$sum}</strong></td><td></td><td>
                        <input type='hidden' name='total_amount' value='{$sum}'>
                        <button type='submit' class='btn btn-primary'>Confirm Order</button></td></tr>";
                        ?>
                    </tbody>
                    <?php
                } else {
                    echo "<div class='empty-cart-message'>";
                    echo "<img src='images/emptycart.png' class='img-fluid' height='150' width='150' alt='Empty Cart'>";
                    echo "<div class='h5 mt-3'>Add items to the cart first!</div>";
                    echo "</div>";
                }
                ?>
            </table>
        </form>
    </div>
</div>

<!-- Footer -->
<?php include 'includes/footer.php'; ?>
<!-- Footer ends -->

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
</body>
</html>