<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){


    $id = $_GET["id"];
    $qtytxt = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];

if($qtytxt <=0){
    echo "Please add  quantity";
}else{

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '".$umail."' AND `product_id` ='".$id."'");
    $cn = $cartrs->num_rows;

    if($cn==1){

  echo "This Product already exists in your cart";
  
    }else{
        $productrs = Database::search("SELECT `qty` FROM `product` WHERE `id` ='".$id."'");
        $pr = $productrs->fetch_assoc();

        if($pr["qty"]>= $qtytxt){
            Database::iud("INSERT INTO `cart` (`user_id`,`product_id`,`qty`) VALUES ('".$umail."','".$id."','".$qtytxt."')");
            echo "Item added";
        }else{
            echo "Please enter a valid Quantity below ".$pr['qty'].".";
        }

    
    }

}

}else{
    echo "nouser";
  }
  
