<?php

require "connection.php";
$array;

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    echo $id;

    if (empty($id)) {

        echo "Please Enter The Product Id";
    } else {


        $prs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
        $n = $prs->num_rows;

        if ($n == 1) {

            $r = $prs->fetch_assoc();

            $array["id"] = $r["id"];
            $array["title"] = $r["title"];

            $crs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $r["category_id"] . "'");
            if ($crs->num_rows == 1) {
                $cr =  $crs->fetch_assoc();

                $array["category"] = $cr["name"];
            }

    //        $crs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $r["color_id"] . "'");
   //         if ($crs->num_rows == 1) {
     //           $crs->fetch_assoc();

      //          $array["model"] = $cr["name"];
      //      }

            echo json_encode($array);
        } else {
            echo "Invalid product id";
        }
    }
}
