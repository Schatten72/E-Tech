<?php

session_start();

require "connection.php";



if(isset($_GET["s"])){

    $text = $_GET["s"];


if(empty($text)){
    $_SESSION["k"]=null;
    session_destroy();


    echo"SS";




}
    
    
}
