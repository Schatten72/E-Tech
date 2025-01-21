<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $city = $_POST["c"];
    $district = $_POST["d"];
    $pcode = $_POST["pcode"];
  
 


    if (empty($fname)) {
        echo "Please enter your firstname";
    } else if (strlen($fname) > 50) {
        echo "Firstname must be less than 50 characters";
    } else if (empty($lname)) {
        echo "Please enter your lastname";
    } else if (strlen($lname) > 50) {
        echo "Lastname must be less than 50 characters";
    } else if (empty($mobile)) {
        echo "Please enter your mobile";
    } else if (strlen($mobile) != 10) {
        echo "Invalid Mobile Number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid Mobile Number";
    } else if (empty($line1)) {
        echo "Please enter your Address line 1";
    } else if (empty($line1)) {
        echo "Please enter your Address line 2";
    } else if (empty($city)) {
        echo "Please enter your city";
    } else {
        
        Database::iud("UPDATE `user` SET
        `fname` = '" . $fname . "',
        `lname` = '" . $lname . "',
        `mobile` = '" . $mobile . "'
        WHERE `email` = '" . $_SESSION["u"]["email"] . "'");

      //  echo "User Table Updated";
    //   $newcity =   Database::iud("INSERT INTO `city`(`name`,`district_id`,`postal_code`) 
    //   VALUES('" . $city. "','" . $district. "','" . $pcode . "')");


        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
            // //update

            // $newcity =   Database::iud("INSERT INTO `city`(`name`,`district_id`,`postal_code`) 
            // VALUES('" . $city. "','" . $district. "','" . $pcode . "')");
            $ucity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "'");
        //    $cc =  $ucity->num_rows;

            if($ucity->num_rows==1){
                $unr = $ucity->fetch_assoc();

                Database::iud("UPDATE`user_has_address`SET 
             `line1`='" . $line1 . "',
             `line2` = '" . $line2 . "',
             `city_id` = '" . $unr["id"] . "'");
    
                echo "Your Details Updated  ";
            }else{
                echo "There's no such city in our Database";
            }
 
        } else {

            //add new

              $ucity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "'");

            if($ucity->num_rows == 1){
                $unr = $ucity->fetch_assoc();
    //  echo"kk";

    
            Database::iud("INSERT INTO `user_has_address`(`user_email`,`line1`,`line2`,`city_id`) 
                    VALUES('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line2 . "','" . $unr["id"] . "')");

            echo "Address added";
            }else{

                // $newcity =   Database::iud("INSERT INTO `city`(`name`,`district_id`,`postal_code`) 
                // VALUES('" . $city. "','" . $district. "','" . $pcode . "')");
    

                echo "There's no such city in our Database";
               
            }
        }
   

    if (isset($_FILES["i"])) {
        $allowed_image_extentions = array("image/jpeg", "image/jpg,", "image/png", "image/svg");
        $img = $_FILES["i"];
        $fileex = $img["type"];

        if (!in_array($fileex, $allowed_image_extentions)) {
            echo "Please Select a Valid image";
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

            $fileName = "resources//profileimg//" . uniqid() . $newimgextension; //unique id

            move_uploaded_file($img["tmp_name"], $fileName);

            $profimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '".$_SESSION["u"]["email"]."'");
            $pn = $profimg->num_rows;

            if($pn==1){
                Database::iud("UPDATE `profile_img` SET `code`='".$fileName."' WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                echo "| Profile Picture Updated";
            }else{
                Database::iud("INSERT INTO `profile_img`(`code`,`user_email`) VALUES('" . $fileName . "','" .$_SESSION["u"]["email"] . "')");
                echo " | Image Added";
            }

      
        }
    } 
}
}

  

/*
echo $fname;
echo "<br/>";
echo $lname;
echo "<br/>";
echo $mobile;
echo "<br/>";
echo $line1;
echo "<br/>";
echo $line2;
echo "<br/>";
echo $city;
echo "<br/>";
echo $img; */
