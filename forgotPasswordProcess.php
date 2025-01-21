<?php

require "connection.php";


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_GET["e"])) {

    $e = $_GET["e"];

    if (empty($e)) {

        echo "Please enter your Email Address";
    } else {
        $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "'");

        if ($rs->num_rows == 1) {

            $code = uniqid();

            Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $e . "'");



            //email code


            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'oshadhamega@gmail.com';
            $mail->Password = 'ranoj7929';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('oshadhamega@gmail.com', 'E-tech');
            $mail->addReplyTo('oshadhamega@gmail.com', 'E-tech');
            $mail->addAddress($e);
            $mail->isHTML(true);
            $mail->Subject = 'E-tech Forgot Password Verfication Code';
            $bodyContent = '<h1 style="color:red;"><h2>Your Verification Code :</h2>' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Message could not be sent';
            } else {
                echo 'Success';
            }
            //email code

        } else {
            echo "Email address Not Found";
        }
    }
} else {
    echo "Please enter your Email Address";
}
