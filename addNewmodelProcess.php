<?php

session_start();

require "connection.php";

if(isset($_SESSION["a"])){


    $text = $_GET["t"];

    if(empty($text)){
        echo "You must enter a Model Name.";

    }else{

        $brand = Database::search("SELECT * FROM `model` WHERE `name` ='".$text."'");
        $n = $brand->num_rows;

        if($n==1){
            echo "This Model Already exists";
        }else{

            $category = Database::iud("INSERT INTO `model`(`name`) VALUES('".$text."')");

            echo "success";
        }

    }
    

}
