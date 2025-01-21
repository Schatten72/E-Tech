<?php



require "abs_path.php";     // Defined absolute path
require "connection.php";
require "admin_func.php";   // Admin Functions
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;


if(isset($_POST["e"])){

    $email = $_POST["e"];

    if(empty($email)){
        echo "Please Enter Your Email Address";
    }else{

        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."'");
        $an = $adminrs->num_rows;

        if($an ==1){
            $code = uniqid();

            Database::iud("UPDATE `admin` SET `verification`= '".$code."' WHERE  `email` = '".$email."'");

            
            //email code


            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'infinityedu72@gmail.com';
            $mail->Password = 'gybwjnetxoorfayc';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('infinityedu72@gmail.com', 'E-tech');
            $mail->addReplyTo('infinityedu72@gmail.com', 'E-tech');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'E-tech Admin Verfication Code';
            $bodyContent = '<h1 style="color:red;"><h2>Your Verification Code :</h2>' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'error';
            } else {
                echo 'Success';
            }
            //email code

          

        }else{
            echo "You are not a valid user";
        }

    }

}else{

    echo "Please Enter Your Email";
}


?>