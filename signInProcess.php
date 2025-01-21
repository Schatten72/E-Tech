<?php

session_start();

require "connection.php";

$e = $_POST["email"];
$p = $_POST["password"];
$r = $_POST["remember"];
$status;

$rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "' AND `password`='" . $p . "'");

$n = $rs->num_rows;

if ($n == 1) {
    $d = $rs->fetch_assoc();
    if ($d["status_id"] == 2) {


        echo "Your account is Blocked Please contact Admin for more details";
    } else {
        echo "success";
 
        $_SESSION["u"] = $d;

        if ($r == "true") {
            setcookie("e", $e, time() + (60 * 60 * 24 * 365));
            setcookie("p", $p, time() + (60 * 60 * 24 * 365));
        } else {
            setcookie("e", "", -1);
            setcookie("p", "", -1);
        }
    }
} else {
    echo "Invalid Details";
}
