<?php

// Calculate card details 

    $today = date("Y-m-d");
    $thismonth = date("m");
    $thisyear = date("Y");
    $a = "0";
    $b = "0";
    $c = "0";
    $e = "0";
    $f = "0";

    $invoicers = Database::search("SELECT * FROM `invoice`");
    $in = $invoicers->num_rows;

    for ($x = 0; $x < $in; $x++) {
        $ir = $invoicers->fetch_assoc();

        $f = $f + $ir["qty"];

        $d = $ir["date"];
        $splitdate = explode(" ", $d); 
        $pdate = $splitdate[0];

        if ($pdate == $today) {

            $a = $a + $ir["total"];
            $c = $c + $ir["qty"];
        }

        $splitmonth = explode("-", $pdate);
        $pyear = $splitmonth[0];
        $pmonth = $splitmonth[1];

        if ($pyear == $thisyear) {
            if ($pmonth == $thismonth) {
                $b = $b + $ir["total"];
                $e = $e + $ir["qty"];
            }
        }
    }

// Calculate Total Engagement

    $usersrs = Database::search("SELECT * FROM `user`");
    $un = $usersrs->num_rows;


// Manage Users

