<?php

session_start();

require "connection.php";

if(isset($_SESSION["a"])){


    $id = $_GET["id"];

     


            $model = Database::iud("DELETE FROM `brand` WHERE `id` = '".$id."'");
            echo "success";
        

    

}
