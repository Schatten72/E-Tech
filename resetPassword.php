<?php

require "connection.php";

if (isset( $_POST["e"],$_POST["np"],$_POST["rnp"],$_POST["vc"])){

 $e = $_POST["e"];
 $np = $_POST["np"];
 $rnp =$_POST["rnp"];
 $vc = $_POST["vc"];
 
 if(empty($e)){
     echo "Missing Email Address";
 }else if(empty($np)){
    echo "Please enter your new password";
 }else if(strlen($np) <5||strlen($np) > 20){
    echo "Password should between 5 to 20 charcters";
}else if(empty($rnp)){
    echo "Please Re-enter your password";
 }else if($np != $rnp){
    echo "Password And Re-enter password does not match";
 }else if(empty($vc)){
    echo "Please enter your Verfication Code";
 }else{

   $rs =  Database::search("SELECT * FROM `user` WHERE `email`='".$e."' AND `verification_code`='".$vc."'");
    if($rs->num_rows==1){
          
        Database::iud("UPDATE user SET `password`='".$np."' WHERE `email`='".$e."'");
         echo "Success";

    }else{
        echo"Password Reset Failed";
    }
   
 }
 }
?>