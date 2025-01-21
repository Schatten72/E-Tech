<?php session_start();

require "connection.php";



if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]["email"];



?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>E-Tech | Wishlist</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="icon" href="resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">



    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php require "header.php";  ?>


                <div class="col-12 border border-1 border-secondary">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">Wishlist &hearts;</label>
                        </div>



                        <div class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end  border-danger">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-white"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link active text-white bg-danger fs-5" aria-current="page" href="watchlist.php">My Wishlist</a>
                                <a class="nav-link text-dark fs-5" href="cart.php">My Cart</a>
                                <a class="nav-link text-dark fs-5" href="purchasehistory.php">History</a>
                                <a class="nav-link text-dark fs-5" href="userprofile.php">Profile</a>
                                <a class="nav-link text-dark fs-5" href="messages.php">Messages</a>
                                <!-- <a class="nav-link text-dark fs-5" href="sellerproductview.php">My Products</a> -->
                            </nav>
                        </div>

                        <?php

                        $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`= '" . $umail . "'");
                        $wn = $watchlistrs->num_rows;

                        if ($wn == 0) {
                        ?>
                            <!-- waithout items-->
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12 emptyview"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 mb-3 fw-bolder te">You have no items in your Wishlist.</label>
                                    </div>

                                </div>
                            </div>
                            <!-- waithout items-->

                        <?php

                        } else {

                        ?>


                            <div class="col-12 col-lg-9">
                                <div class="row">


                                    <?php
                                    for ($i = 0; $i < $wn; $i++) {
                                        $wr = $watchlistrs->fetch_assoc();
                                        $wid = $wr["product_id"];

                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $wid . "'");
                                        $pn = $productrs->num_rows;
                                        if ($pn == 1) {
                                            $pr = $productrs->fetch_assoc();
                                            $prodid = $pr["id"];
                                            if((int)$pr["status_id"] == 1){
                                    ?>

                                            <div class="card mb-3 mx-0 mx-lg-3 col-12">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <?php

                                                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $prodid . "'");
                                                        $in = $imagers->num_rows;

                                                        $arr;

                                                        for ($x = 0; $x < $in; $x++) {
                                                            $ir = $imagers->fetch_assoc();
                                                            $arr[$x] = $ir["code"];
                                                        }

                                                        ?><a href="<?php echo "singleProductview.php?id=" . ($pr['id']); ?>" style="cursor: pointer;">
                                                        <img src="<?php echo $arr[0]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
                                                        </a>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="card-body" >
                                                            <h3 class="card-title"><?php echo $pr["title"]; ?></h3>
                                                            <?php

                                                            // $colours = Database::search("SELECT `name` FROM `color` WHERE `id` ='" . $pr["color_id"] . "'");
                                                            // $clr = $colours->fetch_assoc();

                                                            ?>
                                                            <!-- <span class="fw-bold text-black-50">Colour : <?php echo $clr["name"] ?></span>&nbsp; -->
                                                            <?php

                                                            $conditionrs = Database::search("SELECT `name` FROM `condition` WHERE `id` ='" . $pr["condition_id"] . "'");
                                                            $cor = $conditionrs->fetch_assoc();

                                                            ?>
                                                            <?php
                                                            if ((int)$pr["status_id"] == 1) {
                                                                if ((int)$pr["qty"] > 0) {
                                                            ?>
                                                                    &nbsp; <span class="fw-bold text-black-50"> Condition : <?php echo $cor["name"] ?></span>
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                                    <span class="fw-bolder text-black fs-5">Rs.<?php echo $pr["price"]; ?></span>
                                                                    <br>
                                                                    <span class="fw-bold text-black-50 fs-5">Seller : </span>

                                                                    <?php
                                                                    $users = Database::search("SELECT * FROM `user` WHERE `email` = '" . $umail . "'");
                                                                    $ur = $users->fetch_assoc();


                                                                    ?>
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-5">Email : </span>
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $umail; ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <div class="card-body d-grid">
                                                        <input class="" type="number" value="1" id="qtytxt<?php echo  $pr['id']; ?>" hidden>
                                                            <a href="#" class="btn btn-outline-warning mb-2" onclick="addToCart(<?php echo  $pr['id'];  ?>);">Add Cart</a>
                                                            <a href="#" class="btn btn-outline-dark mb-2" onclick="deletefromwatchlist(<?php echo $wr['id']; ?>);">Remove</a>
                                                        </div>

                                                    <?php


                                                                } else {
                                                    ?>
                                                           &nbsp; <span class="fw-bold text-black-50"> Condition : <?php echo $cor["name"] ?></span>
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                                    <span class="fw-bolder text-black fs-5">Rs.<?php echo $pr["price"]; ?></span>
                                                                    <br>
                                                                    <span class="fw-bold text-black-50 fs-5">Seller : </span>

                                                                    <?php
                                                                    $users = Database::search("SELECT * FROM `user` WHERE `email` = '" . $umail . "'");
                                                                    $ur = $users->fetch_assoc();


                                                                    ?>
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-5">Email : </span>
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $umail; ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <div class="card-body d-grid">
                                                        <input class="" type="number" value="1" id="qtytxt<?php echo  $prod['id']; ?>" hidden>
                                                            <a href="#" class="btn btn-outline-warning mb-2 disabled" onclick="addToCart(<?php echo  $pr['id'];  ?>);">Add Cart</a>
                                                            <a href="#" class="btn btn-outline-dark mb-2" onclick="deletefromwatchlist(<?php echo $wr['id']; ?>);">Remove</a>
                                                        </div>

                                                    <?php
                                                                }
                                                            } else {
                                                    ?>
                                                     &nbsp; <span class="fw-bold text-black-50"> Condition : <?php echo $cor["name"] ?></span>
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                                    <span class="fw-bolder text-black fs-5">Rs.<?php echo $pr["price"]; ?></span>
                                                                    <br>
                                                                    <span class="fw-bold text-black-50 fs-5">Seller : </span>

                                                                    <?php
                                                                    $users = Database::search("SELECT * FROM `user` WHERE `email` = '" . $umail . "'");
                                                                    $ur = $users->fetch_assoc();


                                                                    ?>
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-5">Email : </span>
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $umail; ?></span>&nbsp;
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <div class="card-body d-grid">
                                                        <input class="" type="number" value="1" id="qtytxt<?php echo  $prod['id']; ?>" hidden>
                                                            <a href="#" class="btn btn-outline-warning mb-2 disabled" onclick="addToCart(<?php echo  $pr['id'];  ?>);">Add Cart</a>
                                                            <a href="#" class="btn btn-outline-dark mb-2 " onclick="deletefromwatchlist(<?php echo $wr['id']; ?>);">Remove</a>
                                                        </div>


                                                <?php
                                                            }
                                                ?>
                                                    </div>
                                                </div>
                                            </div>


                                <?php
                                            } 
                                     
                                        }?>

                                        <!-- <div class="col-12 ">
                                            <div class="row">
                                                <div class=" mt-4 text-center">
                                                    <h2 class=" fw-bolder text-danger">The Items In Your Wishlist Are No Loger Available</h2>
                                                    <a href="home.php" class="btn btn-outline-success">SHOP NOW!!</a>
                                                </div>
                                            </div>
                                        </div> -->
                                        <?php
                                    }
                                }

                                ?>

                                </div>
                            </div>



                    </div>
                </div>



                <?php require "footer.php";  ?>
            </div>
        </div>



        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>

<?php

}



?>