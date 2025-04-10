<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('location: admin_login.php');
    exit();
}

require("includes/common.php");

// Fetch total orders
$order_query = "SELECT COUNT(*) AS total_orders FROM orders";
$order_result = mysqli_query($con, $order_query);
$order_data = mysqli_fetch_assoc($order_result);
$total_orders = $order_data['total_orders'];

// Fetch total customers
$customer_query = "SELECT COUNT(DISTINCT user_id) AS total_customers FROM orders";
$customer_result = mysqli_query($con, $customer_query);
$customer_data = mysqli_fetch_assoc($customer_result);
$total_customers = $customer_data['total_customers'];

// Fetch all orders
$orders_query = "SELECT orders.id, users.email AS email, orders.product_name, orders.quantity, orders.order_date 
                 FROM orders 
                 JOIN users ON orders.user_id = users.id 
                 ORDER BY orders.order_date DESC";
$orders_result = mysqli_query($con, $orders_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Logo -->
        <div class="text-center mb-4">
            <img src="images/logo1.jpg" alt="SMU MediEssential Logo" class="img-fluid" style="max-width: 150px;">
        </div>
        <h2 class="text-center">Admin Dashboard</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-info text-center">
                    <h4>Total Orders</h4>
                    <p><?php echo $total_orders; ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-success text-center">
                    <h4>Total Customers</h4>
                    <p><?php echo $total_customers; ?></p>
                </div>
            </div>
        </div>
        <h3 class="mt-5">Order Details</h3>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Email</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($orders_result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin_logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>