<?php

session_start();



require "connection.php";


if(isset($_GET["v"])){
    
    $v = $_GET["v"];

    $adminrs = Database::search("SELECT * FROM `admin` WHERE `verification` = '".$v."'");
    $an = $adminrs->num_rows;

    if($an ==1){

        $ar = $adminrs->fetch_assoc();
        $_SESSION["a"] = $ar;

        echo "success";

    }else{

        echo "Please enter a Valid Verification Code to SignIn";
    }

}else{
    echo "Please enter the Verification Code";
}


?>