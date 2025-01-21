<?php

session_start();

require "connection.php";

if(isset($_SESSION["a"])){


    $text = $_GET["t"];

    if(empty($text)){
        echo "You must enter a Brand Name.";

    }else{

        $brand = Database::search("SELECT * FROM `brand` WHERE `name` ='".$text."'");
        $n = $brand->num_rows;

        if($n==1){
            echo "This Brand Already exists";
        }else{

            $category = Database::iud("INSERT INTO `brand`(`name`) VALUES('".$text."')");

            echo "success";
        }

    }
    

}
