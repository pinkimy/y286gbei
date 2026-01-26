<?php
session_start();
include("dbconnect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// var_dump($_ENV);
//dotEnv varibles

$email_name = $_ENV['EMAIL_NAME'];
$email_pass = $_ENV['EMAIL_PASS'];

// Mailer config

function sendemail_verify ($name, $email, $verify_token, $email_pass, $email_name) {
    // $mail->SMTPDebug = 2;  // for errors
    $mail = new PHPMailer(true);                                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // debug server
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $email_name;                                // example@gmail.com
    $mail->Password   = $email_pass;                                // app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email_name, 'My Site');
    $mail->addAddress($email);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';

    $email_template = "
        <h2>You have been registered!</h2>
        <h5>Please verify your email address</h5>
        <br>
        <a href='https://localhost:8080/verify_email.php?token=$verify_token'>
            Click me
        </a>
    ";

    $mail->Body = $email_template;
    try {
        $mail->send();
    } catch (Exception $e) {
        echo "Mail error: {$mail->ErrorInfo}";
    }

}

if(isset($_POST["register_btn"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $verify_token = md5(rand());

    // Email check

    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0){
        $_SESSION['status'] = "Email id already Exisrs!";
        header("Location: register.php");
    } else{
        // Insert User / Register user data
        $query = "INSERT INTO users (name, email, password, verify_token) VALUES ('$name', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            sendemail_verify("$name", "$email", "$verify_token", $email_pass, $email_name);
            $_SESSION['status'] = "Registration Successfull!";
            header("Location: register.php");
        } else {
            $_SESSION['status'] = "Registration failed!";
            header("Location: register.php");
        }
    }

    }



?>