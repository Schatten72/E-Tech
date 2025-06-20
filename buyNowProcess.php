<?php

session_start();

require "connection.php";


if (isset($_SESSION["u"])) {

    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];

    $array;

    $orderID = uniqid();

    $productrs = Database::search("SELECT * FROM `product` WHERE `id`= '" . $id . "'");
    $pr =  $productrs->fetch_assoc();

    $cityrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`= '" . $umail . "'");
    $cn =    $cityrs->num_rows;


    if ($cn == 1) {

        $cr = $cityrs->fetch_assoc();

        $citytid = $cr["city_id"];
        $add = $cr["line1"] . ", " . $cr["line2"];

        $districtrs = Database::search("SELECT * FROM `city` WHERE `id`= '" . $citytid . "'");
        $dr =     $districtrs->fetch_assoc();

        $districtid = $dr["district_id"];

        $delivery = "0";

        if ($districtid == "2") {

            $delivery = $pr["delivery_fee_colombo"];
        } else {
            $delivery = $pr["delivery_fee_other"];
        }

        $item = $pr["title"];
        $amount = $pr["price"]*$qty + (int)$delivery;

        $fname = $_SESSION["u"]["fname"];
        $lanme = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $address = $add;
        $city = $dr["name"];

        $array['id'] = $orderID;
        $array['item'] = $item;
        $array['amount'] = $amount;
        $array['fname'] = $fname;
        $array['lname'] = $lanme;
        $array['email'] = $umail;
        $array['mobile'] = $mobile;
        $array['address'] = $address;
        $array['city'] = $city;
        $array['qty'] = $qty;

        echo  json_encode($array);


    } else {
        echo "2";
    }
} else {
    echo "1";
}
