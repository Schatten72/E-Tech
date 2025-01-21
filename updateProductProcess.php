<?php

session_start();

require "connection.php";

// $useremail  = $_SESSION["u"]["email"];

$pid = $_POST["id"];
$title = $_POST["ti"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$description = $_POST["desc"];





// if (isset($_FILES["img"])) {
//     $image = $_FILES["img"];
// }
// if (isset($_FILES["img2"])) {
//     $image2 = $_FILES["img2"];
// }
// if (isset($_FILES["img3"])) {
//     $image3 = $_FILES["img3"];
// }


// echo $pid;
// echo "<br/>";
// echo $title;
// echo "<br/>";
// echo $qty;
// echo "<br/>";
// echo $price;
// echo "<br/>";
// echo $dwc;
// echo "<br/>";
// echo $doc;
// echo "<br/>";
// echo $image;


if (empty($title)) {
    echo "Please Add a Title";
} else if (strlen($title) > 100) {
    echo "Title Must be Less than 100 Characters";
} else if ($qty == "0" || $qty == "e") {
    echo "Please Add the Quantity of Your Product";
} else if (!is_int($qty)) {
    echo "Please Add a Valid Quantity";
} else if (empty($qty)) {
    echo "Please Add the Quantity of Your Product";
} else if ($qty < 0) {
    echo "Please Add a Valid Quantity";
} else if (empty($price)) {
    echo "Please insert the price of your product";
} else if (!is_int($price)) {
    echo "Please insert a valid price";
} else if (empty($dwc)) {
    echo "Please insert the delivery cost within colombo";
} else if (!is_int($dwc)) {
    echo "Please insert a valid delivery cost within colombo";
} else if (empty($doc)) {
    echo "Please insert the delivery cost outside colombo";
} else if (!is_int($doc)) {
    echo "Please insert a valid delivery cost outside colombo";
} else if (empty($description)) {
    echo "Please enter the description of your product";
} else {

    Database::iud("UPDATE `product` SET
    `title` = '" . $title . "',
     `qty` = '" . $qty . "',
     `price` = '" . $price . "',
     `delivery_fee_colombo` = '" . $dwc . "',
      `delivery_fee_other` = '" . $doc . "',
     `description` = '$description' WHERE `id` ='" . $pid . "'");


    echo "Product Updated";




    // if (isset($_FILES["img"])) {

    //     $image = $_FILES["img"];

    //     $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
    //     $fileex = $image["type"];

    //     if (!in_array($fileex, $allowed_image_extentions)) {
    //         echo " | Please Select a Valid image";
    //     } else {
    //         // echo $imageFile["name"];

    //         $newimgextension;
    //         if ($fileex = "image/jpeg") {
    //             $newimgextension = ".jpeg";
    //         } elseif ($fileex = "image/jpg") {
    //             $newimgextension = ".jpg";
    //         } elseif ($fileex = "image/png") {
    //             $newimgextension = ".png";
    //         } elseif ($fileex = "image/svg") {
    //             $newimgextension = ".svg";
    //         }

    //         $fileName = "resources//products//" . uniqid() . $newimgextension; //unique id

    //         move_uploaded_file($image["tmp_name"], $fileName);

    //         $proimg = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $pid . "'");
    //         $row = $proimg->fetch_assoc();

    //         Database::iud("UPDATE `images` SET `code` = '" . $fileName . "' WHERE `product_id` = '" . $row["product_id"] . "'");
    //         echo " | Image Updated";
    //     }
    // }
  
  
}


// if (isset($_FILES["img"])) {
//     $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
//     $fileex = $image["type"];

//     if (!in_array($fileex, $allowed_image_extentions)) {
//         echo " | Please Select a Valid image";
//     } else {
//         // echo $imageFile["name"];

//         $newimgextension;
//         if ($fileex = "image/jpeg") {
//             $newimgextension = ".jpeg";
//         } elseif ($fileex = "image/jpg") {
//             $newimgextension = ".jpg";
//         } elseif ($fileex = "image/png") {
//             $newimgextension = ".png";
//         } elseif ($fileex = "image/svg") {
//             $newimgextension = ".svg";
//         }

//         $fileName = "resources//products//" . uniqid() . $newimgextension; //unique id

//         move_uploaded_file($image["tmp_name"], $fileName);

//         Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES('" . $fileName . "','" . $pid . "')");
//         echo " | Image saved Successfully";
//     }
// } else {
//     echo "Please Select an image";
// }

// if (isset($_FILES["img2"])) {
//     $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
//     $fileex = $image2["type"];

//     if (!in_array($fileex, $allowed_image_extentions)) {
//         echo " | Please Select a Valid image";
//     } else {
//         // echo $imageFile["name"];

//         $newimgextension;
//         if ($fileex = "image/jpeg") {
//             $newimgextension = ".jpeg";
//         } elseif ($fileex = "image/jpg") {
//             $newimgextension = ".jpg";
//         } elseif ($fileex = "image/png") {
//             $newimgextension = ".png";
//         } elseif ($fileex = "image/svg") {
//             $newimgextension = ".svg";
//         }

//         $fileName = "resources//products//" . uniqid() . $newimgextension; //unique id

//         move_uploaded_file($image2["tmp_name"], $fileName);

//         Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES('" . $fileName . "','" . $pid . "')");
//         echo " | Image 2 saved Successfully";
//     }
// } else {
//     echo "Please Select an image 2";
// }


// if (isset($_FILES["img3"])) {
//     $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
//     $fileex = $image3["type"];

//     if (!in_array($fileex, $allowed_image_extentions)) {
//         echo " | Please Select a Valid image";
//     } else {
//         // echo $imageFile["name"];

//         $newimgextension;
//         if ($fileex = "image/jpeg") {
//             $newimgextension = ".jpeg";
//         } elseif ($fileex = "image/jpg") {
//             $newimgextension = ".jpg";
//         } elseif ($fileex = "image/png") {
//             $newimgextension = ".png";
//         } elseif ($fileex = "image/svg") {
//             $newimgextension = ".svg";
//         }

//         $fileName = "resources//products//" . uniqid() . $newimgextension; //unique id

//         move_uploaded_file($image3["tmp_name"], $fileName);

//         Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES('" . $fileName . "','" . $pid . "')");
//         echo " | Image 3 saved Successfully";
//     }
// } else {
//     echo "Please Select an image 3";
// }