<?php

require 'includes/PHPMailer.php';
require 'includes/Exception.php';
require 'includes/SMTP.php';
include('includes/Header.php');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
$mail = new PHPMailer();

if(isset($_POST['submit'])){
    $to = "joethomas1901@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Website enquiry";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . ":\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    $mail = new PHPMailer(); // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->SMTPSecure = "tls";
    $mail->Host = "send.one.com";
    $mail->Port = 587; // or 587
    $mail->IsHTML(true);    $mail->Username = getenv('PORTFOLIO_SMTP_USERNAME') ?: '';    $mail->Password = getenv('PORTFOLIO_SMTP_PASSWORD') ?: '';
    $mail->SetFrom("alerts@joe-thomas.co.uk");

    $mail->addAddress($to,$first_name . " " . $last_name);
    $mail->Subject = $subject . " from " . $from;
    $mail->Body = $message;



$mail->send();

$mail->ClearAddresses();

    $mail->addAddress($from,$first_name . " " . $last_name);
    $mail->Subject = $subject2 . " from " . $from;
    $mail->Body = $message2;

    $mail->send();

    echo "

        <div class='container-fluid'>
        <label>Message Sent, thank you for your enquiry!
                </label><br></div>
                ";

}
else{

echo"
<body background='images/codeimage.jpg'>
<h1 style='text-align: center'>Contact me here!</h1>
<div class='container-fluid'>
            <form action='' method='post' style='position: fixed; left: 45%; top: 15%'>
                First Name: <br><label>
                    <input type='text' name='first_name'>
                </label><br>
                Last Name: <br><label>
                    <input type='text' name='last_name'>
                </label><br>
                Email: <br><label>
                    <input type='text' name='email'>
                </label><br>
                Message:<br><label>
                    <textarea rows='5' name='message' cols='23'></textarea>
                </label><br><br>
                <input type='submit' name='submit' value='Submit'>
            </form>
        </div>
    
";}