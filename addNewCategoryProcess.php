<?php

session_start();

require "connection.php";

if(isset($_SESSION["a"])){


    $text = $_GET["t"];

    if(empty($text)){
        echo "You must enter a category.";

    }else{

        $category = Database::search("SELECT * FROM `category` WHERE `name` ='".$text."'");
        $n = $category->num_rows;

        if($n==1){
            echo "This Category Already exists";
        }else{

            $category = Database::iud("INSERT INTO `category`(`name`) VALUES('".$text."')");

            echo "success";
        }

    }
    

}
