<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="col-12">
        <div class="row rm-header-menu">
            <div class="offset-lg-1 col-12 col-lg-4 mt-4 align-self-start">
                <span class="text-start label1"><b>Hi there!</b>
                    <?php if (isset($_SESSION["u"])) {
                        $user =  $_SESSION["u"]["fname"];
                        echo $user;

                    ?>
                </span>
                | <span class="text-start label2" style="cursor: pointer;" onclick="signOut();">Sign Out</span>
            <?php
                    } else {
            ?>
                | <a href="index.php">Login or Sign Up</a>
            <?php
                    } ?> |<a href="aboutus.php">     <span class="text-start label2 text-white " style="cursor: pointer;">About Us</span>
                    </a>
       
            </div>

            <div class="col-12 col-lg-2 mt-2 mb-2 mb-lg-0 mb-md-0 align-self-center logoimg" style="cursor: pointer;" onclick="gotohome();"> </div>

            <div class="offset-lg-2 col-10  col-lg-2 align-self-end text-center">
                <div class="row" style="margin-top: -60px;">
                  
                    <div class="col-2 col-lg-6 dropdown">
                        <button class="btn btn-danger dropdown-toggle rm-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            E-TECH
                        </button>
                        <ul class="dropdown-menu  bg-danger" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item text-white fs-5" href="home.php">Home</a></li>

                            <li><a class="dropdown-item text-white fs-5" href="watchlist.php">Wishlist</a></li>

                            <!-- <li><a class="dropdown-item text-white fs-5" href="messages.php?email=<?php echo "#" ?>">Message</a></li> -->
                            <!-- <li><a class="dropdown-item text-white fs-5" href="sellerproductview.php">My Products</a></li> -->
                            <li><a class="dropdown-item text-white fs-5" href="userprofile.php">My Profile</a></li>
                           <li><a class="dropdown-item text-white fs-5" href="messages.php">Messages</a></li> 
                            <li><a class="dropdown-item text-white fs-5" href=" purchasehistory.php">History</a></li>

                        </ul>
                    </div>

                    <div class="col-1  col-lg-2 offset-1">
                        <!-- <span class="text-start label2" style="cursor: pointer;" onclick="goToAddProduct();">Sell</span> -->
                    </div>

                    <div class="col-2 col-md-1 offset-md-2 col-lg-2 offset-lg-4 carticon" style="cursor: pointer;" onclick="gotocart();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart"></div>

                </div>
            </div>
            <div class="col-2 col-lg-1 mt-lg-2">
                <?php
                if (isset($_SESSION["u"])) {
                    $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");

                    $pn = $profileimg->num_rows;
                    $pr = $profileimg->fetch_assoc();

                    if ($pn == 1) {
                ?>
                       <div>
                  
                       </div> <img class="rounded-circle mt-1 mb-2 mb-lg-0" src="<?php echo $pr["code"] ?>" width="60px" height="70px" onclick="gotoprofile();" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Profile">

                    <?php

                    } else {
                    ?>

                        <img class="rounded-circle mt-1" src="resources/user.svg" width="60px" height="80px" onclick="gotoprofile();" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Profile">

                    <?php
                    }
                } else {
                    ?>

                    <img class="rounded-circle mt-1" src="resources/user.svg" width="60px" height="80px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Profile">

                <?php
                }


                ?>

            </div>
        </div>
    </div>
    <!--header-->

    <script src="script.js"></script>
    
<script src="bootstrap.bundle.js"></script>
<script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
</script>

</body>

</html>