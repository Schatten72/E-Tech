<?php
session_start();

require "connection.php";
if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]["email"];
    $total = "0";
    $subtotal = "0";
    $shipping = "0";

?>




    <!DOCTYPE html>

    <html>

    <head>
        <title>E-Tech | Cart</title>

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
                <?php require "header.php"; ?>

                <!-- <div class="col-12" style="background-color: #E3E5E4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Cart</li>
                        </ol>
                    </nav>
                </div> -->
                <div class="col-12 border border-1 border-secondary">
                    <div class="row">

                        <div class="col-12 ">
                            <label class="form-label fs-1 fw-bolder">Shopping Cart <i class="bi bi-cart2"></i></label>
                        </div>

                        <div class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end  border-danger">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-white"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="watchlist.php">My Watchlist</a>
                                <a class="nav-link active text-white bg-danger fs-5" href="cart.php">My Cart</a>
                                <a class="nav-link text-dark fs-5" href="purchasehistory.php">History</a>
                                <a class="nav-link text-dark fs-5" href="userprofile.php">Profile</a>
                                <a class="nav-link text-dark fs-5" href="messages.php">Messages</a>
                                <!-- <a class="nav-link text-dark fs-5" href="sellerproductview.php">My Products</a> -->
                            </nav>
                        </div>






                        <div class="col-12 col-lg-9   mb-3">
                            <div class="row">


                                <?php

                                $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $umail . "'");
                                $cn = $cartrs->num_rows;

                                if ($cn == 0) {
                                ?>

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12 text-center">
                                                <a href="home.php" style="cursor: pointer;">
                                                    <img src="resources/etech_logo.png" height="200px" class="mt-5"><br>
                                                </a> <label class="form-label fs-1 fw-bolder">You have no items in your Shopping Cart.</label>
                                            </div>
                                            <div class="offet-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">


                                                <a class="btn btn-outline-danger fs-3">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>


                                <?php
                                } else {
                                    $sum = 0;
                                    $deliverySum = 0;

                                ?>
                                    <div class="col-12 col-lg-9 ">
                                        <div class="row">

                                            <?php
                                            $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "'");
                                            $noad = $addressrs->num_rows;

                                            if ($noad == 0) {
                                            ?>

                                                <div class="col-12 ">
                                                    <div class="row">
                                                        <div class=" mt-4 text-center">
                                                            <h2 class=" fw-bolder text-danger">Please add your Address first</h2>
                                                            <a href="userprofile.php" class="btn btn-outline-warning">ADD Your Address</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php

                                            } else {
                                              
                                                for ($i = 0; $i < $cn; $i++) {
                                                    $cr = $cartrs->fetch_assoc();

                                                    $productrs = Database::search("SELECT * FROM `product` WHERE `id` ='" . $cr["product_id"] . "'");
                                                    $productSNr = $productrs->num_rows;
                                                  
                                                  
                                                    if ($productSNr == 1) {
                                                    $pr = $productrs->fetch_assoc();
                                                    if((int)$pr["status_id"] == 1){

                                                    $pid = $pr["id"];
                                                    $total = $total + ($pr["price"] * $cr["qty"]);

                                                    $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "'");
                                                    $ar = $addressrs->fetch_assoc();

                                                    $cityid = $ar["city_id"];

                                                    $districtrs  = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityid . "'");
                                                    $xr = $districtrs->fetch_assoc();
                                                    $districtid = $xr["district_id"];

                                                    $ship = "0";

                                                    if ($districtid == "2") {

                                                        $ship = $pr["delivery_fee_colombo"];

                                                        $shipping =  $shipping + $pr["delivery_fee_colombo"];
                                                    } else {

                                                        $ship = $pr["delivery_fee_other"];

                                                        $shipping =  $shipping + $pr["delivery_fee_other"];
                                                    }

                                                    //  echo $total;
                                                    //  echo $shipping;

                                                    $sellers = Database::search("SELECT * FROM `user` WHERE `email` ='" . $pr["user_email"] . "'");
                                                    $sn = $sellers->fetch_assoc();

                                                ?>


                                                    <div class="card mb-3  col-12">
                                                        <div class="row g-0">
                                                            <div class="col-md-12 mt-3 mb-3">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="fw-bold text-black-50 fs-6">Seller :</span>&nbsp;
                                                                        <span class="fw-bolder text-black fs-6"><?php echo $sn["fname"] . " " . $sn["lname"]; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr />
                                                            <div class="col-md-4">

                                                                <?php

                                                                $imagers = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $pr["id"] . "'");
                                                                $in = $imagers->num_rows;

                                                                $arr;

                                                                for ($x = 0; $x < $in; $x++) {
                                                                    $ir = $imagers->fetch_assoc();
                                                                    $arr[$x] = $ir["code"];
                                                                }

                                                                ?>

                                                                <img src="<?php echo $arr[0]; ?>" class="img-fluid rounded-start d-inline-block
                                                    " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="<?php echo $pr["title"] ?>
                                                    " data-bs-content="<?php echo $pr["description"] ?>" style="height: 200px;" />

                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="card-body">
                                                                    <h3 class="card-title fs-4 fw-bolder"><?php echo $pr["title"]; ?></h3>
                                                                    <?php

                                                                    // $colours = Database::search("SELECT `name` FROM `color` WHERE `id` ='" . $pr["color_id"] . "'");
                                                                    // $clr = $colours->fetch_assoc();

                                                                    ?>
                                                                    <!-- <span class="fw-bold text-black-50">Colour : <?php echo $clr["name"] ?></span>&nbsp; | -->

                                                                    <?php

                                                                    $conditionrs = Database::search("SELECT `name` FROM `condition` WHERE `id` ='" . $pr["condition_id"] . "'");
                                                                    $cor = $conditionrs->fetch_assoc();

                                                                    ?>

                                                                    <span class="fw-bold text-black-50"> Condition : <?php echo $cor["name"] ?></span>
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-6">Price :</span>&nbsp;
                                                                    <span class="fw-bolder text-black fs-6">Rs.<?php echo $pr["price"]; ?>.00</span>
                                                                    <br>
                                                                    <span class="fw-bold text-black-50 fs-6">Quantity :</span>&nbsp;
                                                                    <input type="number" value="<?php echo  $cr["qty"] ?>" class="mt-3 border border-1 border-secondary fs-5 fw-bold px-3 cardqtytxt" pattern="[0-9]*" value="<?php echo $catrProducts['qty'] ?>" id="qtyInput<?php echo $pr['id'] ?>" min="1" max="<?php echo $pr['qty'] ?>" disabled />
                                                                    <br />
                                                                    <span class="fw-bold text-black-50 fs-6">Delivery :</span>&nbsp;
                                                                    <span class="fw-bolder text-black fs-6">Rs.<?php echo $ship; ?>.00</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mt-5">
                                                                <div class="card-body d-grid">
                                                                    <a href="<?php echo "singleProductview.php?id=" . ($pr['id']); ?>"  class="btn btn-outline-success mb-2" >Buy Now</a>

                                                                  <button class="btn btn-lght" value="<?php echo $pr["id"] ?>" id="btn<?php echo $i ?>"></button>

                                                                    <a class="btn btn-outline-danger mb-2" onclick="deletefromCart(<?php echo $cr['id']; ?>);">Remove</a>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-12 mt-3 mb-3">
                                                                <div class="row">
                                                                    <div class="col-6 col-md-6">
                                                                        <span class="fw-bold text-black-50 fs-5">Requested Total <i class="bi bi-info-circle"></i></span>&nbsp;
                                                                    </div>
                                                                    <div class="col-6 col-md-6 text-end">
                                                                        <span class="fw-bold text-black-50 fs-5">Rs. <?php echo ($pr["price"] * $cr["qty"]) + $shipping; ?>.00</span>&nbsp;
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    <?php

                                                    $sum = $pr["price"] * $cr["qty"] + $sum;


                                                    $deliverySum = $shipping + $deliverySum;

                                                }
                                                    ?>


                                            <?php
                                                }
                                                ?>

                                                <!-- <div class="col-12 ">
                                                    <div class="row">
                                                        <div class=" mt-4 text-center">
                                                            <h2 class=" fw-bolder text-danger">The Items In Your Cart Are No Loger Available</h2>
                                                            <a href="home.php" class="btn btn-outline-success">SHOP NOW!!</a>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php
                                         
                                            }
                                            ?>

                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fs-2 fw-bolder">Summary</label>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-6">
                                                <span class="fs-6 fw-bold">Items (<?php echo $cn ?>)</span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <span class="fs-6 fw-bold">Rs. <?php echo $total ?>.00</span>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <span class="fs-6 fw-bold">Shipping :</span>
                                            </div>
                                            <div class="col-6 text-end mt-2">
                                                <span class="fs-6 fw-bold">Rs.<?php echo $shipping ?>.00</span>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <hr>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <span class="fs-3 fw-bolder">Total :</span>
                                            </div>
                                            <div class="col-6 text-end mt-2">
                                                <span class="fs-3 fw-bolder">Rs.<?php echo $total + $shipping ?>.00</span>
                                            </div>
                                            <div class="col-12 mt-3 mb-3 d-grid">
                                                <button class="btn btn-danger fs-5 fw-bolder" onclick="checkOut();" value="<?php echo $i ?>" id="checkBtn">CHECKOUT</button>
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

                <?php require "footer.php"; ?>
            </div>
        </div>




        <script src="https://unpkg.com/@popperjs/core@2"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </body>

    </html>


<?php
} else {

?>
    <script>
        alert("Please SignIn First");
        window.location = "index.php";
    </script>
<?php
}

?>