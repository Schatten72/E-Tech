<?php
session_start();

require "connection.php";

$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["co"];
// $colour = $_POST["col"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$description = $_POST["desc"];


if (isset($_FILES["img"])) {
    $image = $_FILES["img"];
}
if (isset($_FILES["img2"])) {
    $image2 = $_FILES["img2"];
}
if (isset($_FILES["img3"])) {
    $image3 = $_FILES["img3"];
}


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;
$useremail  = $_SESSION["a"]["email"];

if ($category == "0") {
    echo "Please Select a Category";
} else if ($brand == "0") {
    echo "Please Select a Brand";
} else if ($model == "0") {
    echo "Please Select a Model";
} else if (empty($title)) {
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
    $modelHasBrand = Database::search("SELECT `id` FROM `model_has_brand` WHERE `brand_id`='" . $brand . "' AND `model_id`='" . $model . "'");

    if ($modelHasBrand->num_rows == 0) {
        echo "The Product Doesn't Exists";
    } else {
        // $image = $_FILES["img"];

        $f = $modelHasBrand->fetch_assoc();
        $modelHasBrandId = $f["id"];

        Database::iud("INSERT INTO `product`(`category_id`,`model_has_brand_id`,`price`,`qty`,`description`,
    `title`,`condition_id`,`status_id`,`user_email`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`)
    VALUES('" . $category . "','" . $modelHasBrandId . "','" . $price . "','" . $qty . "','" . $description . "',
    '" . $title . "','" . $condition . "','" . $state . "','" . $useremail . "','" . $date . "','" . $dwc . "','" . $doc . "')");

        echo "Product Added Successfully";

        $last_id = Database::$connection->insert_id;


        if (isset($_FILES["img"])) {
            $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
            $fileex = $image["type"];

            if (!in_array($fileex, $allowed_image_extentions)) {
                echo " | Please Select a Valid image";
            } else {
                // echo $imageFile["name"];

                $newimgextension;
                if ($fileex = "image/jpeg") {
                    $newimgextension = ".jpeg";
                } elseif ($fileex = "image/jpg") {
                    $newimgextension = ".jpg";
                } elseif ($fileex = "image/png") {
                    $newimgextension = ".png";
                } elseif ($fileex = "image/svg") {
                    $newimgextension = ".svg";
                }

                $fileName = "resources//products//" . uniqid() . $newimgextension; //unique id

                move_uploaded_file($image["tmp_name"], $fileName);

                Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES('" . $fileName . "','" . $last_id . "')");
                echo " | Image saved Successfully";
            }
        } else {
            echo "Please Select an image";
        }

        if (isset($_FILES["img2"])) {
            $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
            $fileex = $image2["type"];

            if (!in_array($fileex, $allowed_image_extentions)) {
                echo " | Please Select a Valid image";
            } else {
                // echo $imageFile["name"];

                $newimgextension;
                if ($fileex = "image/jpeg") {
                    $newimgextension = ".jpeg";
                } elseif ($fileex = "image/jpg") {
                    $newimgextension = ".jpg";
                } elseif ($fileex = "image/png") {
                    $newimgextension = ".png";
                } elseif ($fileex = "image/svg") {
                    $newimgextension = ".svg";
                }

                $fileName = "resources//products//" . uniqid() . $newimgextension; //unique id

                move_uploaded_file($image2["tmp_name"], $fileName);

                Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES('" . $fileName . "','" . $last_id . "')");
                echo " | Image 2 saved Successfully";
            }
        } else {
            echo "Please Select an image 2";
        }

        
        if (isset($_FILES["img3"])) {
            $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
            $fileex = $image3["type"];

            if (!in_array($fileex, $allowed_image_extentions)) {
                echo " | Please Select a Valid image";
            } else {
                // echo $imageFile["name"];

                $newimgextension;
                if ($fileex = "image/jpeg") {
                    $newimgextension = ".jpeg";
                } elseif ($fileex = "image/jpg") {
                    $newimgextension = ".jpg";
                } elseif ($fileex = "image/png") {
                    $newimgextension = ".png";
                } elseif ($fileex = "image/svg") {
                    $newimgextension = ".svg";
                }

                $fileName = "resources//products//" . uniqid() . $newimgextension; //unique id

                move_uploaded_file($image3["tmp_name"], $fileName);

                Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES('" . $fileName . "','" . $last_id . "')");
                echo " | Image 3 saved Successfully";
            }
        } else {
            echo "Please Select an image 3";
        }

        
        // $last_id = Database::$connection->insert_id;

        // $allowed_image_extention  = array("image/jpg", "image/png", "image/svg", "image/jpeg");

   
        
        // if (isset($imageFile)) {
        //     $file_extension = $imageFile["type"];
        //     //echo $file_extension;

        //     if (!in_array($file_extension, $allowed_image_extention)) {
        //         echo "Please select a Valid image 1";
        //     } else {
        //         //echo $imageFile["name"];

        //         $new_name = str_replace(' ', '_', $title) . uniqid();
        //         $iName = $new_name . ".png";

        //         $fileName = "resources//products//" . $new_name . ".png";
        //         move_uploaded_file($imageFile["tmp_name"], $fileName);

        //         Database::iud("INSERT INTO `images`(`code`,`product_id`,`iName`) VALUES ('" . $fileName . "','" . $last_id . "','" . $iName . "')");
        //     }
        // } else {
        //     echo "Please Select an image 1";
        // }

        // if (isset($imageFile2)) {
        //     $file_extension = $imageFile2["type"];
        //     //echo $file_extension;

        //     if (!in_array($file_extension, $allowed_image_extention)) {
        //         echo "Please select a Valid image 2";
        //     } else {
        //         //echo $imageFile["name"];

        //         $new_name = str_replace(' ', '_', $title) . uniqid();
        //         $iName = $new_name . ".png";

        //         $fileName2 = "resources//products//" . $new_name . ".png";
        //         //echo $fileName2;
        //         move_uploaded_file($imageFile2["tmp_name"], $fileName2);
        //         Database::iud("INSERT INTO `images`(`code`,`product_id`,`iName`) VALUES ('" . $fileName . "','" . $last_id . "','" . $iName . "')");
        //         // Database::iud("INSERT INTO `image`(`code1`,`iName1`) VALUES ('" . $fileName2 . "','" . $iName . "')");
        //         Database::iud("UPDATE `images` SET `code1` = '".$fileName2."' , `iName1`='".$iName."' WHERE `product_id`='".$last_id."' ;");
        //     }
        // } else {
        //     echo "Please Select an image 2";
        // }

        // if (isset($imageFile3)) {
        //     $file_extension = $imageFile3["type"];
        //     //echo $file_extension;

        //     if (!in_array($file_extension, $allowed_image_extention)) {
        //         echo "Please select a Valid image 3";
        //     } else {
        //         //echo $imageFile["name"];

        //         $new_name = str_replace(' ', '_', $title) . uniqid();
        //         $iName = $new_name . ".png";

        //         $fileName3 = "resources//products//" . $new_name . ".png";
        //         //echo $fileName3;
        //         move_uploaded_file($imageFile3["tmp_name"], $fileName3);

        //         Database::iud("INSERT INTO `image`(`code2`,`iName2`) VALUES ('" . $fileName3 . "','" . $iName . "')");
        //         Database::iud("UPDATE `images` SET `code2` = '".$fileName3."' , `iName2`='".$iName."' WHERE `product_id`='".$last_id."' ;");
        //     }
        // } else {
        //     echo "Please Select an image 3";
        // }




    }
}



/*echo $categoty;
echo "<br/>";
echo $brand;
echo "<br/>";
echo $model;
echo "<br/>";
echo $title;
echo "<br/>";
echo $condition;
echo "<br/>";
echo $colour;
echo "<br/>";
echo $qty;
echo "<br/>";
echo $price;
echo "<br/>";
echo $dwc;
echo "<br/>";
echo $doc;
echo "<br/>";
echo $description;
echo "<br/>";
echo $imagefile;

*/
