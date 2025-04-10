<!-- filepath: c:\xampp\htdocs\ecommerce-website-master\verify.php -->
<?php
require "includes/common.php";
session_start();

if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['email'];
    $entered_code = $_POST['verification_code'];

    // Check the verification code in the database
    $query = "SELECT * FROM users WHERE email_id='$email' AND verification_code='$entered_code'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // Update the user's status to verified
        $update_query = "UPDATE users SET is_verified=1 WHERE email_id='$email'";
        mysqli_query($con, $update_query);

        // Redirect to the products page
        header('location: products.php');
    } else {
        $error = "Invalid verification code. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Verify Your Email</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="verification_code">Enter Verification Code</label>
            <input type="text" class="form-control" id="verification_code" name="verification_code" required>
        </div>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
</div>
</body>
</html>