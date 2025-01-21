<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];

    $pageno;
?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>E-Tech |Seller's Products</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/logo.svg">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body >

        <div class="container-fluid">
       
            <div class="row">
           
                <!-- Head -->


                <div class="col-12 rm-bg-accent px-4 px-lg-5">
                    <div class="row">
                 
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 col-lg-1 mt-1 mb-1">
                                    <?php

                                    $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $user["email"] . "'");

                                    $pn = $profileimg->num_rows;
                                    $pr = $profileimg->fetch_assoc();

                                    if ($pn == 1) {
                                    ?>
                                        <img class="rounded-circle" src="<?php echo $pr["code"] ?>">

                                    <?php

                                    } else {
                                    ?>

                                        <img class="rounded-circle" src="resources/user.svg">

                                    <?php
                                    }

                                    ?>

                                </div>
                                <div class="col-12 col-lg-8" style="margin: auto;">
                                    <div class="row">
                                        <div class="col-12 mt-0">
                                            <span class="fw-bold text-white" style="text-transform: capitalize;"><?php echo $user["fname"] . " " . $user["lname"]; ?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-white"><?php echo $user["email"]; ?></span>
                                        </div>
                                    </div>
                                </div>
              
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="row">
                                <div class="col-12 mx-auto mt-lg-2">
                                    <h1 class="text-white fw-bold offset-6 offset-lg-2">My Products</h1>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <!-- Head -->


                <div class="col-12 ">

                    <div class="row">
                

                        <div class="col-12 mt-5 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end  border-danger">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-white"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link text-dark fs-5" aria-current="page" href="watchlist.php">My Watchlist</a>
                                <a class="nav-link text-dark fs-5" href="cart.php">My Cart</a>
                                <a class="nav-link text-dark fs-5" href="purchasehistory.php">History</a>
                                <a class="nav-link text-dark fs-5" href="userprofile.php">Profile</a>
                                <a class="nav-link active text-white bg-danger fs-5" href="sellerproductview.php">My Products</a>
                            </nav>
                        </div>




                        <!-- product -->

                        <div class="col-12 col-lg-10 mt-3 mb-3">
                            <div class="row">
                                <div class="offset-1 col-9 text-center">
                                    <div class="row">

                                        <?php
                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {

                                            $pageno = 1;
                                        }

                                        $products = Database::search("SELECT * FROM `product` WHERE `user_email` = '" . $user["email"] . "'");
                                        $d = $products->num_rows;
                                        $row = $products->fetch_assoc();

                                        $results_per_page = 6;

                                        $number_of_pages = ceil($d / $results_per_page);

                                        //   echo $d;
                                        //     echo "<br/>";
                                        //   echo $results_per_page;


                                        $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                        $selectedrs = Database::search("SELECT * FROM `product` WHERE `user_email`= '" . $user["email"] . "' 
                                        LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");

                                        $srn = $selectedrs->num_rows;

                                        if ($d < 1) {
                                        ?>

                                            <div class="col-12 mb-4">
                                                <img src="resources/sellerempty.svg" height="400px" />
                                                <h2>You Have No Item To Sell</h2>
                                                <br>
                                                <div class="col-6 offset-3 d-grid">
                                                    <a href="addproduct.php" class="btn btn-outline-success">Add a item Now!!</a>
                                                </div>

                                            </div>


                                            <?php
                                        } else {



                                            while ($srow = $selectedrs->fetch_assoc()) {

                                                //   for ($i = 0; $i < $srn; $i++) {


                                            ?>

                                                <div class="card mb-3 col-12 col-lg-5 mx-2 mt-3" style="width: 35rem;">
                                                    <div class="row g-0">

                                                        <?php

                                                        $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "'");
                                                        $pir = $pimgrs->fetch_assoc();

                                                        ?>
                                                        <div class="col-md-4 mt-4">
                                                            <img src="<?php echo $pir["code"]; ?>" class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title fw-bold"><?php echo $srow["title"]; ?></h5>
                                                                <span class="card-text fw-bold">Rs. <?php echo $srow["price"]; ?>.00</span>
                                                                <br />
                                                                <span class="card-text fw-bold"><?php echo $srow["qty"]; ?> Items Left</span>
                                                                <div class="form-check form-switch mb-2 mt-2 fs-5 text-primary">
                                                                    <input class="form-check-input" type="checkbox" id="check<?php echo $srow['id']; ?>" onchange="changeStatus(<?php echo $srow['id']; ?>);" <?php if ($srow["status_id"] == 2) {
                                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                                }

                                                                                                                                                                                                                ?> />
                                                                    <label class="form-check-label  fw-bold text-" style="cursor: pointer;" id="checklabel<?php echo $srow['id']; ?>" for="check<?php echo $srow['id']; ?>">
                                                                        <?php
                                                                        if ($srow["status_id"] == 2) {

                                                                            echo "Make Your Product Active";
                                                                        } else {

                                                                            echo "Make Your Product Deactive";
                                                                        }

                                                                        ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <div class="col-12 col-lg-6">
                                                                            <a href="#" class="btn btn-outline-dark d-grid" onclick="sendid(<?php echo $srow['id']; ?>);">Update</a>
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                                                            <a href="#" class="btn btn-outline-danger d-grid" onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal<?php echo $srow['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bolder text-warning" id="exampleModalLabel">Warning...</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Deleting this item from database will lost all data related to this item.<br/>
                                                                Are You Sure You Want To Delete This Product?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                                                <button type="button" class="btn btn-danger" onclick="deleteproduct(<?php echo $srow['id']; ?>);">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Modal -->


                                            <?php

                                            }
                                            ?>




                                    </div>
                                </div>

                                <!-- PAgination-->
                                <div class="col-12 mb-3 mt-3">
                                    <div class="d-flex justify-content-center">
                                        <div class="pagination">
                                            <a href="<?php
                                                        if ($pageno <= 1) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno - 1);
                                                        }
                                                        ?>">&laquo;</a>

                                            <?php

                                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                                if ($page == $pageno) {
                                            ?>
                                                    <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 active"><?php echo $page; ?></a>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo "?page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>
                                            <?php
                                                }
                                            }

                                            ?>
                                            <a href="<?php

                                                        if ($pageno >= $number_of_pages) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno + 1);
                                                        }

                                                        ?>">&raquo;</a>

                                        </div>
                                    </div>
                                </div>
                                <!-- PAgination-->
                            <?php   } ?>
                            </div>
                        </div>
                        <!-- product -->


                        <!--Sortings-->
                        <!-- 
                        <div class="col-12 col-lg-2 mx-0 mx-lg-3 my-1">
                            <div class="row">
                                <div class="col-12 mt-3 ms-3 fs-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold fs-4">Filters</label>
                                        </div>
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input class="form-control" type="text" id="s" placeholder="Search...." />
                                                </div>
                                                <div class="col-1">
                                                    <label class="form-label fs-4 bi bi-search"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="forn-label fw-bold">Active Time</label>
                                        </div>
                                        <div class="col-12">
                                            <hr width="80%">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input fs-6" type="radio" name="flexRadioDefault" id="n" />
                                                <label class="form-check-label fs-6" for="n">
                                                    Newest To Oldest
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="o" />
                                                <label class="form-check-label" for="o">
                                                    Oldest To Newest
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="forn-label fw-bold">By Quantity</label>
                                        </div>
                                        <div class="col-12">
                                            <hr width="80%">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input fs-6" type="radio" name="flexRadioDefault1" id="l" />
                                                <label class="form-check-label fs-6" for="flexRadioDefault3">
                                                    Low To High
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault1" id="h" />
                                                <label class="form-check-label" for="flexRadioDefault4">
                                                    High To Low
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="forn-label fw-bold">By Condition</label>
                                        </div>
                                        <div class="col-12">
                                            <hr width="80%">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input fs-6" type="radio" name="flexRadioDefault2" id="b" />
                                                <label class="form-check-label fs-6" for="b">
                                                    BrandNew
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="u" />
                                                <label class="form-check-label" for="u">
                                                    Used
                                                </label>
                                            </div>
                                        </div>
                                        <div class="offset-0 offset-lg-1 col-12 col-lg-8 mb-3 mt-3 d-grid">
                                            <div class="row">
                                                <button class="col-11 btn btn-success fw-bold mb-3" onclick="addFilters();">Search</button>
                                                <button class="col-11 btn btn-primary fw-bold">Clear Filters</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!--Sortings-->

                    </div>
                </div>
                <!--footer-->
                <?php
                require "footer.php";
                ?>

                <!--footer-->

            </div>


        </div>


        <script src="script.js"></script>
        <script src="bootstrap.js"></script>

    </body>

    </html>


<?php
} else {


?>

    <script>
        alert("Please SignIn or SignUp First");

        window.location = "index.php";
    </script>
<?php
}

?>