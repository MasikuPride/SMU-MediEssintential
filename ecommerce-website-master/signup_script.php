<?php
require "includes/common.php";
require "includes/PHPMailer/PHPMailer.php";
require "includes/PHPMailer/SMTP.php";
require "includes/PHPMailer/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

$email = $_POST['eMail'];
$email = mysqli_real_escape_string($con, $email);

$pass = $_POST['password'];
$pass = mysqli_real_escape_string($con, $pass);
$pass = md5($pass);

$first = $_POST['firstName'];
$first = mysqli_real_escape_string($con, $first);

$last = $_POST['lastName'];
$last = mysqli_real_escape_string($con, $last);

$query = "SELECT * FROM users WHERE email_id='$email'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);

if ($num != 0) {
    $m = "Email Already Exists";
    header('location: index.php?error=' . $m);
} else {
    // Generate a random verification code
    $verification_code = rand(100000, 999999);

    // Insert user details into the database with verification code
    $quer = "INSERT INTO users(email_id, first_name, last_name, password, verification_code, is_verified) 
             VALUES('$email', '$first', '$last', '$pass', '$verification_code', 0)";
    if (mysqli_query($con, $quer)) {
        // Send the verification code to the user's email using PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Use your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'masikupride@gmail.com'; // Your email address
            $mail->Password = 'Pride@2002'; // Your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPDebug = 2; // Set to 2 for detailed debug output
            $mail->Debugoutput = 'html'; // Output errors in HTML format
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('masikupride@gmail.com', 'SMU MediEssential');
            $mail->addAddress($email, $first);

            // Content
            $mail->isHTML(true);
            $mail->Subject = "Verify Your Email - SMU MediEssential";
            $mail->Body = "Hello $first,<br><br>Your verification code is: <strong>$verification_code</strong><br><br>Please enter this code on the verification page to activate your account.<br><br>Thank you!";

            $mail->send();

            // Redirect to the verification page
            $_SESSION['email'] = $email;
            header('location: verify.php');
        } catch (Exception $e) {
            $m = "Failed to send verification email. Mailer Error: {$mail->ErrorInfo}";
            header('location: index.php?error=' . $m);
        }
    } else {
        $m = "Failed to register user. Please try again.";
        header('location: index.php?error=' . $m);
    }
}
?>