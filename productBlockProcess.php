<?php

require "connection.php";

if(isset($_POST["e"])){

    
$id = $_POST["e"];

$productrs = Database::search("SELECT * FROM `product` WHERE `id` = '".$id."'");
$num = $productrs->num_rows;

if($num == 1){
    $row  = $productrs->fetch_assoc();
    $us = $row["status_id"];

    if($us == 1 ){
        Database::iud("UPDATE `product` SET `status_id` = '2' WHERE `id` = '".$id."'");
        echo "success1";
    
    }else{
        Database::iud("UPDATE `product` SET `status_id` = '1' WHERE `id` = '".$id."'");
        echo "success2";
    }
}


}




?>