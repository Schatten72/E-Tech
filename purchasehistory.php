<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $mail = $_SESSION["u"]["email"];

    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $mail . "'");

    $in  = $invoicers->num_rows;


?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>E-Tech |Transaction History</title>

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

                <div class="col-12 border border-1 border-secondary">
                    <div class="row">

                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">Transaction History <i class="bi bi-hourglass-split"></i></label>
                        </div>

                        <div class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end  border-dark">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-white"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="watchlist.php">My Watchlist</a>
                                <a class="nav-link text-dark fs-5" href="cart.php">My Cart</a>
                                <a class="nav-link  active  text-white bg-danger fs-5" href="purchasehistory.php">History</a>
                                <a class="nav-link text-dark fs-5" href="userprofile.php">Profile</a>
                                <a class="nav-link text-dark fs-5" href="messages.php">Messages</a>
                                <!-- <a class="nav-link text-dark fs-5" href="sellerproductview.php">My Products</a> -->
                            </nav>
                        </div>

                        <?php

                        if ($in == 0) {
                        ?>
                            <div class="col-12 col-lg-9 text-center bg-light" style="height: 550px;">
                                <a href="home.php" style="cursor: pointer;">
                                    <img src="resources/etech_logo.png" height="200px" class="mt-5">
                                </a>

                                <span class="fs-1 fw-bold text-black-50 d-block" style="margin-top: 50px;">You hava no items in your Transaction History yet.....</span>
                            </div>

                        <?php
                        } else {
                        ?>


                            <div class="col-12 col-lg-10">
                                <div class="row">

                                    <div class="col-12 d-none d-lg-block">
                                        <div class="row">
                                            <!-- <div class="col-1 bg-light">
                                        <label class="form-label fw-bold">#</label>
                                    </div> -->
                                            <div class="col-5 bg-dark">
                                                <label class="form-label fw-bold text-light">Order Details</label>
                                            </div>
                                            <div class="col-1 bg-dark text-end">
                                                <label class="form-label fw-bold text-light ">Quantity</label>
                                            </div>
                                            <div class="col-2 bg-dark text-end">
                                                <label class="form-label fw-bold text-white">Amount</label>
                                            </div>
                                            <div class="col-2 bg-dark text-end">
                                                <label class="form-label fw-bold text-white">Purchased Date & Time</label>
                                            </div>
                                            <div class="col-3 bg-light"> </div>
                                            <!-- <div class="col-12">
                                        <hr>
                                    </div> -->


                                        </div>
                                    </div>

                                    <?php

                                    for ($i = 0; $i < $in; $i++) {
                                        $ir = $invoicers->fetch_assoc();

                                    ?>
                                        <div class="col-12">
                                            <div class="row">
                                                <!-- <div class="col-12 col-lg-1 bg-secondary">
                                            <p class=" text-white fs-6 py-5"><?php echo $ir["order_id"]; ?></p>
                                         
                                        </div> -->
                                                <div class="col-12 col-lg-5 ">
                                                    <div class="row">
                                                        <div class="card mx-lg-2 my-3" style="max-width: 590px;">
                                                            <div class="row g-0">
                                                                <div class="col-md-3 mt-2">

                                                                    <?php

                                                                    $pid = $ir["product_id"];
                                                                    $array;
                                                                    $imagesrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $pid . "'");
                                                                    $n = $imagesrs->num_rows;

                                                                    for ($x = 0; $x < $n; $x++) {
                                                                        $f = $imagesrs->fetch_assoc();
                                                                        $array[$x] = $f["code"];
                                                                    }

                                                                    ?>
                                                                    <img src="<?php echo $array[0]; ?>" class="img-fluid rounded-start" style="height: 100px;" />
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="card-body">

                                                                        <?php

                                                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
                                                                        $pr = $productrs->fetch_assoc();

                                                                        ?>
                                                                        <h5 class="card-title"><?php echo $pr["title"]; ?></h5>

                                                                        <?php
                                                                        $sm = $pr["user_email"];
                                                                        $sellerrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $sm . "'");
                                                                        $sr = $sellerrs->fetch_assoc();

                                                                        ?>
                                                                        <p class="cart-text"><b>Seller :</b><?php echo $sr["fname"] . " " . $sr["lname"]; ?></p>
                                                                        <p class="cart-text"><b>Price :</b> Rs. <?php echo $pr["price"]; ?> .00</p>
                                                                        <p class="cart-text"><b>Order_ID :</b><?php echo $ir["order_id"]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-1 text-center text-lg-end">
                                                    <label class="form-label fs-4 pt-5"><?php echo $ir["qty"]; ?></label>
                                                </div>

                                                <div class="col-12 col-lg-2 text-center text-lg-end ">
                                                    <label class="form-label text-black fs-6 px-3 py-5 fw-bold">Rs. <?php echo $ir["total"]; ?> .00</label>
                                                </div>

                                                <div class="col-12 col-lg-2 text-center text-lg-end ">
                                                    <label class="form-label fs-6 pt-2 pt-5"><?php echo $ir["date"]; ?></label>
                                                </div>

                                                <div class="col-12 col-lg-2">
                                                    <div class="row">
                                                        <div class="col-12 d-grid">
                                                            <button class="btn btn-outline-success rounded  mt-5 fs-5" onclick="addFeedback(<?php echo $pid; ?>);"><i class="bi bi-info-circle-fill"></i> Feedback</button>
                                                        </div>
                                                        <div class="col-12 d-grid">
                                                            <button class="btn btn-outline-dark rounded mt-5 fs-5" onclick="removefromhistory(<?php echo  $ir['id']; ?>);"><i class="bi bi-trash-fill"></i> Remove</button>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <hr style="height: 4px;"/>
                                                </div>


                                                <!-- modal -->

                                                <div class="modal fade" id="feedbackModal<?php echo  $pid; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel"><?php echo $pr["title"]; ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <textarea id="feedtxt<?php echo  $pid; ?>" cols="56" rows="10 fs-5"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-outline-success" onclick="saveFeedback(<?php echo $pid; ?>)">Save Feedback</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--                                    modal -->

                                            </div>
                                        </div>
                                        <?php

}

?>

                                </div>
                            </div>
                       


                        <!-- <div class="col-12">
                            <hr />
                        </div> -->

                        <!-- <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-lg-10 d-none d-lg-block"></div>
                            <div class="col-12 col-lg-2 d-grid">
                                <button class="btn btn-danger fs-5"><i class="bi bi-trash-fill"></i> Delete All</button>
                            </div>
                        </div>
                    </div> -->



                    <?php


                        }

                    ?>
  <?php require "footer.php"; ?>
                    </div>
                </div>

              

            </div>
        </div>



        <script src="script.js"></script>

        <script src="bootstrap.js"></script>

        <script src="bootstrap.bundle.js"></script>
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

?>