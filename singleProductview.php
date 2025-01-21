<?php
session_start();

require "connection.php";

if (isset($_GET["id"])) {


    $pid = $_GET["id"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
    $pn = $productrs->num_rows;

    $full = Database::search("SELECT `product`.`id`,`product`.`title`,`product`.`description`,`product`.`price`,`brand`.`name`AS `b_name`,`model`.`name`AS `m_name`,`product`.`qty` FROM `product` INNER JOIN `model_has_brand` ON `product`.
    `model_has_brand_id`=`model_has_brand`.`id` INNER JOIN `brand` ON `brand`.`id`=`model_has_brand`.`brand_id` INNER JOIN `model` ON `model_has_brand`.`model_id`=`model`.`id`
    WHERE product.`id` = '" . $pid . "';");


    if ($pn == 1) {

        $pd = $productrs->fetch_assoc();
        $f = $full->fetch_assoc();
    }


?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>E-Tech|Single Product View</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="icon" href="resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

        <link rel="stylesheet" href="style.css">

    </head>

    <body onload="" style="background-color: #4b0d0d;;">


        <div class="container-fluid">
            <div class="row">

                <?php
                require "header.php";
                ?>

                <div class="col-12 col-lg-10 offset-lg-1 mt-0 singleproduct">
                    <div class="row">

                        <div class="bg-white" style="padding: 11px;">
                            <div class="row">
                                <div class="col-lg-2 order-lg-1 order-2 mt-5">
                                    <ul>

                                        <?php

                                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $pid . "'");

                                        $in = $imagers->num_rows;

                                        $img1;

                                        if (!empty($in)) {

                                            for ($x = 0; $x < $in; $x++) {

                                                $d = $imagers->fetch_assoc();

                                                if ($x == 0) {
                                                    $img1 = $d["code"];
                                                }




                                        ?>


                                                <li class="d-flex flex-column justify-content-center align-items-center border border-2 border-light mb-1 rounded p-1">
                                                    <img src="<?php echo $d["code"]; ?>" height="150px" width="200px" class="mt-1 
                                                    mb-1" id="pimg<?php echo $x; ?>" onclick="loadmainimg(<?php echo $x; ?>);" onmouseover="loadmainimg(<?php echo $x; ?>);" style="cursor: pointer;" />
                                                </li>

                                            <?php


                                            }
                                        } else {
                                            ?>
                                            <li class="d-flex flex-column justify-content-center align-items-center border border-3 border-danger mb-1 rounded">
                                                <img src="resources//no_image.jpg" height="150px" class="mt-1 mb-1" />
                                            </li>

                                            <li class="d-flex flex-column justify-content-center align-items-center border border-3 border-danger mb-1 rounded">
                                                <img src="resources//no_image.jpg" height="150px" class="mt-1 mb-1" />
                                            </li>
                                            <li class="d-flex flex-column justify-content-center align-items-center border border-3 border-danger mb-1 rounded">
                                                <img src="resources//no_image.jpg" height="150px" class="mt-1 mb-1" />
                                            </li>
                                        <?php
                                        }



                                        ?>
                                    </ul>
                                </div>
                                <div class="col-lg-4  order-2 order-lg-1 d-none d-lg-block mt-5">
                                    <div class="align-items-center border border-2 border-light mt-1 rounded p-3">
                                        <div style="background-image: url('<?php echo $img1; ?>'); background-repeat: no-repeat; 
                                        background-size: contain; height: 480px;" id="mainimg"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 order-3">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <nav>
                                                        <ol class="d-flex flex-wrap mb-0 list-unstyled bg-white rounded">
                                                            <li class="breadcrumb-item">
                                                                <a href="home.php">Home</a>
                                                            </li>
                                                            <li class="breadcrumb-item">
                                                                <a href="home.php">Products</a>
                                                            </li>
                                                            <li class="breadcrumb-item active">
                                                                <a class="text-black-50 text-decoration-none" href="#">Single View</a>
                                                            </li>
                                                        </ol>
                                                    </nav>
                                                </div>

                                                <div class="col-12">
                                                    <label class="form-label fs-3 mb-0 fw-bolder"><?php echo $pd["title"]; ?></label>
                                                    <i class="fa fa-heart mt-2 fs-3 text-danger mx-3" onclick="addToWatchlist(<?php echo  $pd['id'];  ?>);" style="cursor: pointer;"></i>

                                                </div>

                                                <div class="col-12 mt-1">
                                                    <!-- <span class="badge badge-success">
                                                        <i class="fa fa-star mt-1 text-warning fs-6"></i>
                                                        <label class="text-dark fs-6">4.5 star </label>
                                                        <label class="text-dark fs-6">| 35 Ratings & 45 Reviews</label>
                                                    </span> -->
                                                </div>

                                                <div class=" d-inline-block col-12 ">
                                                    <label class=" fw-bold mt-1 fs-3 fw-bolder">Rs.<?php echo $pd["price"]; ?>.00</label>
                                                    <label class=" fw-bold mt-1 fs-6 text-danger"> <del> Rs. <?php $a = $pd["price"];
                                                                                                                $newval = ($a / 100) * 5;
                                                                                                                $val = $a + $newval;
                                                                                                                echo $val; ?>.00</del></label>
                                                </div>

                                                <hr class="hrbreak1" />

                                                <div class="col-12">
                                                    <label class="text-primary fs-6"><b>Warranty : </b>06 months Warranty</label><br />
                                                    <label class="text-primary fs-6"><b>Return Policy: </b>01 month return policy</label><br />
                                                    <label class="text-primary fs-6"><b>In Stock : </b><?php echo $pd["qty"]; ?> items left</label><br />
                                                    <a href="messages.php" class="btn btn-primary mt-3 mb-3"><i class="bi bi-chat-left-text-fill"></i> Contact Seller </a>
                                                </div>

                                                <hr class="hrbreak1" />

                                                <div class="col-12 mb-1">
                                                    <label class="text-dark fs-3 fw-bolder">Seller Details</label><br />
                                                    <?php
                                                    $users = Database::search("SELECT * FROM `user` WHERE `email` = '" . $pd["user_email"] . "'");
                                                    $userd = $users->fetch_assoc();
                                                    ?>
                                                    <label class="text-success fs-6 fw-bold"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></label><br />
                                                    <label class="text-success fs-6 "><?php echo $userd["email"]; ?></label><br />
                                                    <label class="text-success fs-6 "><?php echo $userd["mobile"]; ?></label>
                                                </div>

                                                <!-- <hr class="hrbreak1" />

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-8 rounded border border-1 border-success mt-1">
                                                            <div class="row">
                                                                <div class="col-md-3 col-sm-3 col-lg-1 ">
                                                                    <img src="resources/singleview/pricetag.png" />
                                                                </div>
                                                                <div class="col-md-9 col-sm-9 mt-1 pe-4 col-lg-11">
                                                                    <label class="text-black-50">Stand a chance to get instant 5% discount by using VISA.</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div> -->

                                                <!-- <div class="col-12">
                                                    <div class="row" style=" margin-top: 15px;">
                                                        <div class="col-md-6 mb-1" style="margin-top: 15px;">
                                                            <label class="fs-6 mt-1 fw-bold">Colour Options :</label><br />
                                                            <button class="btn btn-primary btn-sm">Black</button>
                                                            <button class="btn btn-primary btn-sm">Gold</button>
                                                            <button class="btn btn-primary btn-sm">Blue</button>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label fs-5 mt-3 fw-bolder">Payment Methods :</label>
                                                        </div>
                                                        <div class="col-9">
                                                            <div class="row">
                                                                <div class=" col-2 pm1"></div>
                                                                <div class="col-2 pm2"></div>
                                                                <div class="col-2 pm3"></div>
                                                                <div class="col-2 pm4"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="hrbreak1" />

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="offset-2 col-10 offset-lg-0 col-md-6" style="margin-top: 15px;">
                                                            <div class="row">
                                                                <div class="border border-1 border-secondary rounded overflow-hidden float-start product_qty d-inline-block position-relative">
                                                                    <span class="mt-2">QTY :</span>
                                                                    <input class="border-0 fs-6 fw-bold text-start mt-2" type="text" pattern="[0-9]*" value="1" id="qtyinput" />
                                                                    <div class="qty-buttons position-absolute ">
                                                                        <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-inc">
                                                                            <i class="fas fa-chevron-up" onclick="qty_inc(<?php echo $pd['qty']; ?>);"></i>
                                                                        </div>
                                                                        <div class="d-flex flex-column align-items-center border border-1 border-secondary qty-dec">
                                                                            <i class="fas fa-chevron-down" onclick="qty_dec();"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-12">
                                                            <div class="row">
                                                                <div class="offset-1 offset-lg-0 col-10 col-lg-3 mb-1 mb-lg-0 d-grid">
                                                                    <a class="btn btn-outline-danger" onclick="addToCart(<?php echo  $pid;  ?>);">Add Cart</a>
                                                                </div>
                                                                <div class="offset-1 offset-lg-0 col-10 col-lg-3 d-grid ">
                                                                    <button class="btn btn-outline-success" id="payhere-payment" type="submit" onclick="paynow(<?php echo $pid; ?>);">Buy Now</button>
                                                                </div>
                                                                <!-- <div class="offset-5 col-12 offset-lg-0 col-lg-2 d-grid mt-sm-2 mt-lg-0">
                                                                    <i class="fa fa-heart mt-2 fs-4 text-danger"></i>
                                                                </div> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                  

                        <div class="col-12 bg-white">
                            <div class="row d-block me-0 ms-0 mt-5 mb-3 border-start-0 border-end-0 border border-bottom-1 border-top-1 border-secondory">
                                <div class="col-md-6">
                                    <span class="fs-3 fw-bold">Prodcuct Details</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 bg-white">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-label fs-5 fw-bold">Brand</label>
                                        </div>
                                        <div class="col-10">
                                            <label class="form-label"><?php echo $f["b_name"] ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-label fs-5 fw-bold">Model</label>
                                        </div>
                                        <div class="col-10">
                                            <label class="form-label"><?php echo $f["m_name"] ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-label fs-5 fw-bold">Description</label>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <textarea class="form-control bg-light" cols="60" rows="40" readonly><?php echo $f["description"] ?></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-12 bg-white">
                    <div class="row d-block me-0 ms-0 mt-5 mb-3 border-start-0 border-end-0 border border-1 border-top-1 border-secondory">
                        <div class="col-md-6">
                            <span class="fs-3 fw-bold">Feedbacks...</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2 bg-white ">
                    <div class="row">
                        <div class="col-11 col-lg-11 offset-lg-1 mb-5">

                            <div class="row">


                                <?php
                                $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $pid . "'");
                                $feed = $feedbackrs->num_rows;

                                if ($feed == 0) {
                                ?>
                                    <div class="col-12 text-center ">
                                        <label class="form-label fs-2 text-black-50 mt-5">There are no feedbacks to this product</label>
                                    </div>


                                    <?php
                                } else {

                                    for ($a = 0; $a < $feed; $a++) {
                                        $feedrow = $feedbackrs->fetch_assoc();



                                        $userrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $feedrow["user_email"] . "'");
                                        $fduser = $userrs->fetch_assoc();

                                    ?>

                                        <div class="col-12 col-lg-10  rounded  p-lg-3 mt-3 border-start-0 border-end-0 border border-1 border-top-0 border-secondory">
                                            <div class="row ">
                                                <div class="col-5">
                                                    <span class="fs-5 fw-bold text-start text-secondary">by <?php echo $fduser["fname"] . " " . $fduser["lname"];  ?></span>

                                                </div>
                                              
                                                <div class="col-5 text-end">
                                                    <span class="fs-6 text-black-50 fw-bold"><?php echo $feedrow["date"]; ?></span>

                                                </div>
                                                <div class="col-10">
                                                    <span class="fs-5 text-dark"><?php echo $feedrow["feed"]; ?></span>

                                                </div>
  
                                       
                                            </div>
                                        </div>


                                <?php

                                    }
                                }

                                ?>

                            </div>
                        </div>


                    </div>
                </div>

                        <div class="col-12 bg-white">
                            <div class="row d-block me-0 ms-0 mt-5 mb-3 border-start-0 border-end-0 border border-1 border-top-1 border-secondory ">
                                <div class="col-md-6 ">
                                    <span class="fs-3 fw-bold">Related Items</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 bg-white">
                            <div class="row">
                                <div class="offset-1 col-11 relateditems">
                                    <div class="row p-2 mb-5">

                                        <?php

                                        // Database::search("SELECT * FROM `product` LEFT JOIN `model_has_brand` ON product.model_has_brand_id = model_has_brand.id AS mid WHERE model_has_brand_id = '" . $pd["model_has_brand_id"] . "' LIMIT 4 ");
                                        $brandsid =  Database::search("SELECT `product`.`id`,`product`.`title`,`product`.`status_id`,`product`.`price`,`brand`.`name`AS `b_name`,`model`.`name`AS `m_name`,`product`.`qty` FROM `product` 
                                        INNER JOIN `model_has_brand` ON `product`.`model_has_brand_id`=`model_has_brand`.`id` INNER JOIN `brand` ON `brand`.`id`=`model_has_brand`.`brand_id` 
                                        INNER JOIN `model` ON `model_has_brand`.`model_id`=`model`.`id` WHERE category_id = '" . $pd["category_id"] . "'  ORDER BY `product`.`datetime_added` DESC LIMIT 4 OFFSET 0;");
                                        $bds = $brandsid->num_rows;
                                        for ($g = 0; $g < $bds; $g++) {

                                            $bdf = $brandsid->fetch_assoc();


                                            $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $bdf["id"] . "'");
                                            $imgrow = $pimage->fetch_assoc();



                                        ?>


                                            <!-- <div class="card me-1  " style="width: 20rem;">
                                                <img src="<?php echo $imgrow["code"] ?>" class="card-img-top cardTopImg" />
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $bdf["title"]; ?></h5>
                                                    <p class="card-text">Rs.<?php echo $bdf["price"]; ?> .00</p>
                                                    <a class="btn btn-primary" onclick="addToCart(<?php echo  $pid; ?>);">Add Cart</a>
                                                    <a href="<?php echo "singleProductview.php?id=" . ($bdf['id']); ?>" class="btn btn-success">Buy Now</a>
                                                    <a href="#" class="me-1 mt-2 fs-5"><i class="fa fa-heart mt-2 fs-4 text-black-50"></i></a>
                                                </div>
                                            </div>

 -->
                                            <div class="card card1 col-10 col-lg-4  mt-1 mb-1 ms-4 sgl-pd" style="width: 18rem;">

                                                <?php

                                                $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $bdf["id"] . "'");
                                                $imgrow = $pimage->fetch_assoc();

                                                ?><a href="<?php echo "singleProductview.php?id=" . ($bdf['id']); ?>" style="cursor: pointer;">
                                                    <img src="<?php echo $imgrow["code"] ?>" class="card-img-top cardTopImg" style="height: 180px;">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold"><?php echo $bdf["title"] ?> <span class="badge bg-info">New</span></h5>
                                                    <span class="card-text text-primary fw-bold">Rs.<?php echo $bdf["price"] ?></span><br>

                                                    <?php
                                                    if ((int)$bdf["status_id"] == 1) {
                                                        if ((int)$bdf["qty"] > 0) {
                                                    ?>
                                                            <span class="card-text text-warning fw-bold">In stock</span><br>

                                                            <input class="form-control mb-2" type="number" value="1" id="qtytxt<?php echo  $bdf['id']; ?>">
                                                            <a href="<?php echo "singleProductview.php?id=" . ($bdf['id']); ?>" class="btn btn-outline-success ">Buy Now</a>
                                                            <a class="btn btn-outline-danger" onclick="addToCart(<?php echo  $bdf['id'];  ?>);">Add Cart</a>
                                                            <a class="btn btn-secondary rm-love" onclick="addToWatchlist(<?php echo  $bdf['id'];  ?>);"><i class="bi bi-heart-fill"></i></a>


                                                        <?php


                                                        } else {
                                                        ?>
                                                            <span class="card-text text-danger fw-bold">Out of stock</span><br>
                                                            <input class="form-control mb-2" type="number" value="1" disabled>
                                                            <a href="#" class="btn btn-outline-success  disabled">Buy Now</a>
                                                            <a href="#" class="btn btn-danger  disabled">Add To Cart</a>
                                                            <a class="btn btn-secondary rm-love" onclick="addToWatchlist(<?php echo  $bdf['id'];  ?>);"><i class="bi bi-heart-fill"></i></a>


                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <span class="card-text text-danger fw-bold">Product Not Available</span><br>
                                                        <input class="form-control mb-2" type="number" value="1" disabled>
                                                        <a href="#" class="btn btn-outline-success  disabled">Buy Now</a>
                                                        <a href="#" class="btn btn-danger  disabled">Add To Cart</a>
                                                        <a class="btn btn-secondary rm-love" onclick="addToWatchlist(<?php echo  $bdf['id'];  ?>);"><i class="bi bi-heart-fill"></i></a>


                                                    <?php
                                                    }
                                                    ?>


                                                </div>
                                            </div>


                                        <?php

                                        }




                                        ?>


                                        <!-- <div class="card me-1" style="width: 20rem;">
                                            <img src="resources/mobile images/htc_u.jpg" class="card-img-top" />
                                            <div class="card-body">
                                                <h5 class="card-title">HTC</h5>
                                                <p class="card-text">Rs. 100000 .00</p>
                                                <a href="#" class="btn btn-primary">Add to Cart</a>
                                                <a href="#" class="btn btn-success">Buy Now</a>
                                                <a href="#" class="me-1 mt-2 fs-5"><i class="fa fa-heart mt-2 fs-4 text-black-50"></i></a>
                                            </div>
                                        </div>
                                        <div class="card me-1" style="width: 20rem;">
                                            <img src="resources/mobile images/htc_u.jpg" class="card-img-top" />
                                            <div class="card-body">
                                                <h5 class="card-title">HTC</h5>
                                                <p class="card-text">Rs. 100000 .00</p>
                                                <a href="#" class="btn btn-primary">Add to Cart</a>
                                                <a href="#" class="btn btn-success">Buy Now</a>
                                                <a href="#" class="me-1 mt-2 fs-5"><i class="fa fa-heart mt-2 fs-4 text-black-50"></i></a>
                                            </div>
                                        </div>
                                        <div class="card me-1" style="width: 20rem;">
                                            <img src="resources/mobile images/htc_u.jpg" class="card-img-top" />
                                            <div class="card-body">
                                                <h5 class="card-title">HTC</h5>
                                                <p class="card-text">Rs. 100000 .00</p>
                                                <a href="#" class="btn btn-primary">Add to Cart</a>
                                                <a href="#" class="btn btn-success">Buy Now</a>
                                                <a href="#" class="me-1 mt-2 fs-5"><i class="fa fa-heart mt-2 fs-4 text-black-50"></i></a>
                                            </div>
                                        </div> -->


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            

                <?php
                require "footer.php";
                ?>

            </div>
        </div>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>


<?php
}
?>