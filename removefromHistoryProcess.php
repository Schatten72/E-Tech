<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {

    $mail = $_SESSION["u"]["email"];
$id = $_GET["id"];


// $watchrs = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '".$mail."'");
// $watchrow = $watchrs->fetch_assoc();

// $pid = $watchrow["product_id"];
// $mail = $watchrow["user_email"];


// Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES('".$pid."','".$mail."')");

// //echo "PRODUCT ADDED TO THE RECENTS";

Database::iud("DELETE FROM `invoice` WHERE `id` = '".$id."'");

echo "success";
}
?>