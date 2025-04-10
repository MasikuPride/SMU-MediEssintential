<?php
require("includes/common.php");

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login if user is not authenticated
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

// Validate and store delivery details in session
if (
    isset($_POST['fullName']) && !empty(trim($_POST['fullName'])) &&
    isset($_POST['location']) && !empty(trim($_POST['location'])) &&
    isset($_POST['phone']) && !empty(trim($_POST['phone']))
) {
    $_SESSION['delivery_details'] = [
        'fullName' => htmlspecialchars(trim($_POST['fullName'])),
        'address'  => htmlspecialchars(trim($_POST['location'])),
        'phone'    => htmlspecialchars(trim($_POST['phone']))
    ];
} else {
    die("Delivery details are missing. Please go back and fill in the form.");
}

// Get and validate total amount
if (isset($_POST['total_amount'])) {
    $raw_amount = str_replace(',', '.', $_POST['total_amount']); // Convert comma to dot

    if (is_numeric($raw_amount)) {
        $amount = number_format((float)$raw_amount, 2, '.', '');
    } else {
        die("Invalid amount format. Please enter a valid number.");
    }
} else {
    die("Total amount is missing. Please go back to the cart.");
}

// PayPal configuration (sandbox)
$paypal_url    = "https://www.sandbox.paypal.com/cgi-bin/webscr"; // Sandbox URL
$business_email = "masikupride@gmail.com"; // Your sandbox PayPal email
$return_url     = "http://localhost/ecommerce-website-master/success.php";
$cancel_url     = "http://localhost/ecommerce-website-master/index.php";
$notify_url     = "http://localhost/ecommerce-website-master/ipn.php";

// Order info
$item_name   = "SMU MediEssential Order";
$item_number = uniqid("ORD_");
$currency    = "USD"; // South African Rand
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting to PayPal...</title>
</head>
<body>
    <h2 style="text-align: center;">Please wait... Redirecting to PayPal</h2>

    <form action="<?php echo $paypal_url; ?>" method="post" id="paypalForm">
        <input type="hidden" name="business" value="<?php echo $business_email; ?>">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_name" value="<?php echo $item_name; ?>">
        <input type="hidden" name="item_number" value="<?php echo $item_number; ?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
        <input type="hidden" name="return" value="<?php echo $return_url; ?>">
        <input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>">
        <input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>">
        <input type="hidden" name="custom" value="<?php echo $_SESSION['email']; ?>">
    </form>

    <script>
        document.getElementById('paypalForm').submit();
    </script>
</body>
</html>
