<?php
require("includes/common.php");

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit();
}

$locations = [
    "Campus (pick up)",
    "1A",
    "1B",
    "5A",
    "5B",
    "Nursing Home",
    "Arebeng 1",
    "Arebeng 2",
    "Arebeng 3",
    "Drililies",
    "South Point",
    "Maderia",
];

// Get total_amount from POST or fallback
$total_amount = isset($_POST['total_amount']) ? htmlspecialchars($_POST['total_amount']) : (isset($_SESSION['total_amount']) ? $_SESSION['total_amount'] : null);
if (!$total_amount) {
    die("Missing total amount. Please go back to your cart.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery Details | SMU MediEssential</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        .delivery-container {
            margin-top: 80px;
            margin-bottom: 80px;
        }
        .form-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .form-title {
            margin-bottom: 30px;
            color: #343a40;
        }
        .btn-submit {
            margin-top: 20px;
            padding: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>
<?php include 'includes/header_menu.php'; ?>

<div class="container delivery-container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="form-card">
                <h2 class="text-center form-title">Select Delivery/Pick-up Location</h2>
                <form action="process_payment.php" method="POST">
                    <div class="form-group">
                        <label for="fullName" class="font-weight-bold">Full Name</label>
                        <input type="text" class="form-control form-control-lg" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="location" class="font-weight-bold">Select Location</label>
                        <select class="form-control form-control-lg" id="location" name="location" required>
                            <option value="" disabled selected>Choose your location</option>
                            <?php foreach ($locations as $location): ?>
                                <option value="<?= htmlspecialchars($location) ?>"><?= htmlspecialchars($location) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-muted">
                            Note: Delivery costs R10; campus pick-up is free.
                        </small>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone" class="font-weight-bold">Phone Number</label>
                        <input type="tel" class="form-control form-control-lg" id="phone" name="phone" placeholder="Enter your phone number" pattern="[0-9+ ]{10,}" required>
                    </div>

                    <!-- Pass total amount forward -->
                    <input type="hidden" name="total_amount" value="<?= $total_amount ?>">

                    <button type="submit" class="btn btn-primary btn-block btn-submit">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>
