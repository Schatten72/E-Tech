
<?php

require "connection.php";

$seachText = $_GET["t"];
$seachSelect = $_GET["s"];

$results_per_page = 4;

$pageno = $_GET["p"];
// $pageno = 1;

if (!empty($seachText) && $seachSelect == 0) {
    $product = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $seachText . "%' ");
    $d = $product->num_rows;
    $row =  $product->fetch_assoc();
    $result_per_page = 4;
    $number_of_pages = ceil($d / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $textSearch = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $seachText . "%' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n = $textSearch->num_rows;

    ?>


<div class="col-12 mt-2">
    <div class="row mb-5">
        <div class="mx-5 offset-lg-0 offset-2 col-10 col-lg-11" id="pdiv">
            <div class="row" id="pdeatails">
                <?php
                for ($i = 0; $i < $n; $i++) {
                    $pdeatail = $textSearch->fetch_assoc();
                ?>
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="card col-10 col-lg-4  mt-1 mb-1 ms-4  sgl-pd" style="width: 20rem;">
                            <?php
                            $pimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pdeatail["id"] . "' ");
                            $imgd = $pimg->fetch_assoc();
                            ?>
                            <img src="<?php echo $imgd["code"] ?>" class="card-img-top  cardTopImg">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $pdeatail["title"]; ?><span class="badge bg-info ">New</span></h5>
                                <span class="card-text text-primary fw-bold">Rs. <?php echo $pdeatail["price"]; ?></span>
                                <br />
                                <?php
                                // $pstatus = Database::search("SELECT * FROM `status` WHERE `id`='" . $pdeatail["status_id"] . "'");
                                // $statusrow = $pstatus->fetch_assoc();
                                if((int)$pdeatail["status_id"] == 1){
                                if ((int)$pdeatail["qty"] > 0) {
                                ?>

                                    <span class="card-text text-warning fw-bold">In Stock</span>
                                    <input type="number" class="form-control mb-2" value="<?php echo $pdeatail["qty"] ?>" />
                                    <a href="<?php echo "singleproductview.php?id=" . ($pdeatail['id']); ?>" class="btn btn-outline-success">Buy Now</a>
                                    <a href="#" class="btn btn-outline-danger">Add Cart</a>
                                    <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                <?php
                                } else {
                                ?>
                                    <span class="card-text text-danger"><b>Out of Stock</b></span>
                                    <br />
                                    <input type="number" class="form-control mb-1 d disabled" value="0" disabled />
                                    <a href="#" class="btn btn-success disabled">Buy Now</a>
                                    <a href="#" class="btn btn-danger disabled">Add Cart</a>
                                    <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                <?php
                                } 
                            }else {
                                    ?>
                                     <span class="card-text text-danger fw-bold">Product Not Available</span><br>
                                     <input class="form-control mb-2" type="number" value="1" disabled>
                                     <a href="#" class="btn btn-outline-success  disabled">Buy Now</a>
                                     <a href="#" class="btn btn-danger  disabled">Add To Cart</a>
                                     <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                 <?php
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php

                }

                ?>
                <!-- pagination -->
                <div class="col-12 mb-3 mt-3">
                    <div class="pagination d-flex justify-content-center">
                        <?php
                        if ($pageno != 1) {
                        ?>
                            <button class=" btn btn-danger" onclick="basicSearch(<?php echo $pageno - 1; ?>);">&laquo;</button>
                            <?php
                        }

                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            if ($page == $pageno) {
                            ?>
                                <button class="ms-1 btn btn-dark active" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                            <?php
                            } else {
                            ?>
                                <button class="ms-1 btn btn-danger" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if ($pageno < $number_of_pages) {
                        ?>
                            <button class="ms-1 btn btn-danger" onclick="basicSearch(<?php echo $pageno + 1; ?>);">&raquo;</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- pagination -->
            </div>
        </div>
    </div>
</div>



<?php
} else if ($seachSelect != 0 && empty($seachText)) {
    $product = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $seachSelect . "' ");
    $d = $product->num_rows;
    $row =  $product->fetch_assoc();
    $result_per_page = 4;
    $number_of_pages = ceil($d / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $textSearch = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $seachSelect . "' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n = $textSearch->num_rows;

    ?>

<div class="col-12 mt-2">
    <div class="row mb-5">
        <div class="mx-5 offset-lg-0 offset-2 col-10 col-lg-11" id="pdiv">
            <div class="row" id="pdeatails">
                <?php
                for ($i = 0; $i < $n; $i++) {
                    $pdeatail = $textSearch->fetch_assoc();
                ?>
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="card col-10 col-lg-4  mt-1 mb-1 ms-4  sgl-pd" style="width: 20rem;">
                            <?php
                            $pimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pdeatail["id"] . "' ");
                            $imgd = $pimg->fetch_assoc();
                            ?>
                            <img src="<?php echo $imgd["code"] ?>" class="card-img-top  cardTopImg">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $pdeatail["title"]; ?><span class="badge bg-info ">New</span></h5>
                                <span class="card-text text-primary fw-bold">Rs. <?php echo $pdeatail["price"]; ?></span>
                                <br />
                                <?php
                                // $pstatus = Database::search("SELECT * FROM `status` WHERE `id`='" . $pdeatail["status_id"] . "'");
                                // $statusrow = $pstatus->fetch_assoc();
                                if((int)$pdeatail["status_id"] == 1){
                                if ((int)$pdeatail["qty"] > 0) {
                                ?>

                                    <span class="card-text text-warning fw-bold">In Stock</span>
                                    <input type="number" class="form-control mb-2" value="<?php echo $pdeatail["qty"] ?>" />
                                    <a href="<?php echo "singleproductview.php?id=" . ($pdeatail['id']); ?>" class="btn btn-outline-success">Buy Now</a>
                                    <a href="#" class="btn btn-outline-danger">Add Cart</a>
                                    <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                <?php
                                } else {
                                ?>
                                    <span class="card-text text-danger"><b>Out of Stock</b></span>
                                    <br />
                                    <input type="number" class="form-control mb-1 d disabled" value="0" disabled />
                                    <a href="#" class="btn btn-success disabled">Buy Now</a>
                                    <a href="#" class="btn btn-danger disabled">Add Cart</a>
                                    <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                <?php
                                } 
                            }else {
                                    ?>
                                     <span class="card-text text-danger fw-bold">Product Not Available</span><br>
                                     <input class="form-control mb-2" type="number" value="1" disabled>
                                     <a href="#" class="btn btn-outline-success  disabled">Buy Now</a>
                                     <a href="#" class="btn btn-danger  disabled">Add To Cart</a>
                                     <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                 <?php
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php

                }

                ?>
                <!-- pagination -->
                <div class="col-12 mb-3 mt-3">
                    <div class="pagination d-flex justify-content-center">
                        <?php
                        if ($pageno != 1) {
                        ?>
                            <button class=" btn btn-danger" onclick="basicSearch(<?php echo $pageno - 1; ?>);">&laquo;</button>
                            <?php
                        }

                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            if ($page == $pageno) {
                            ?>
                                <button class="ms-1 btn btn-dark active" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                            <?php
                            } else {
                            ?>
                                <button class="ms-1 btn btn-danger" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if ($pageno < $number_of_pages) {
                        ?>
                            <button class="ms-1 btn btn-danger" onclick="basicSearch(<?php echo $pageno + 1; ?>);">&raquo;</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- pagination -->
            </div>
        </div>
    </div>
</div>



<?php
} else if (!empty($seachText) && $seachSelect != 0) {
    $product = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $seachSelect . "' AND `title` LIKE '%" . $seachText . "%' ");
    $d = $product->num_rows;
    $row =  $product->fetch_assoc();
    $result_per_page = 4;
    $number_of_pages = ceil($d / $result_per_page);
    $page_first_result = ((int)$pageno - 1) * $result_per_page;
    $textSearch = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $seachSelect . "' AND `title` LIKE '%" . $seachText . "%' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
    $n = $textSearch->num_rows;

    ?>


<div class="col-12 mt-2">
    <div class="row mb-5">
        <div class="mx-5 offset-lg-0 offset-2 col-10 col-lg-11" id="pdiv">
            <div class="row" id="pdeatails">
                <?php
                for ($i = 0; $i < $n; $i++) {
                    $pdeatail = $textSearch->fetch_assoc();
                ?>
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="card col-10 col-lg-4  mt-1 mb-1 ms-4  sgl-pd" style="width: 20rem;">
                            <?php
                            $pimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pdeatail["id"] . "' ");
                            $imgd = $pimg->fetch_assoc();
                            ?>
                            <img src="<?php echo $imgd["code"] ?>" class="card-img-top  cardTopImg">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $pdeatail["title"]; ?><span class="badge bg-info ">New</span></h5>
                                <span class="card-text text-primary fw-bold">Rs. <?php echo $pdeatail["price"]; ?></span>
                                <br />
                                <?php
                                // $pstatus = Database::search("SELECT * FROM `status` WHERE `id`='" . $pdeatail["status_id"] . "'");
                                // $statusrow = $pstatus->fetch_assoc();
                                if((int)$pdeatail["status_id"] == 1){
                                if ((int)$pdeatail["qty"] > 0) {
                                ?>

                                    <span class="card-text text-warning fw-bold">In Stock</span>
                                    <input type="number" class="form-control mb-2" value="<?php echo $pdeatail["qty"] ?>" />
                                    <a href="<?php echo "singleproductview.php?id=" . ($pdeatail['id']); ?>" class="btn btn-outline-success">Buy Now</a>
                                    <a href="#" class="btn btn-outline-danger">Add Cart</a>
                                    <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                <?php
                                } else {
                                ?>
                                    <span class="card-text text-danger"><b>Out of Stock</b></span>
                                    <br />
                                    <input type="number" class="form-control mb-1 d disabled" value="0" disabled />
                                    <a href="#" class="btn btn-success disabled">Buy Now</a>
                                    <a href="#" class="btn btn-danger disabled">Add Cart</a>
                                    <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                <?php
                                } 
                            }else {
                                    ?>
                                     <span class="card-text text-danger fw-bold">Product Not Available</span><br>
                                     <input class="form-control mb-2" type="number" value="1" disabled>
                                     <a href="#" class="btn btn-outline-success  disabled">Buy Now</a>
                                     <a href="#" class="btn btn-danger  disabled">Add To Cart</a>
                                     <a href="#" class="btn btn-secondary rm-love"><i class="bi bi-heart-fill" onclick='addToWatchList(<?php echo $prod["id"] ?>)'></i></a>

                                 <?php
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                <?php

                }

                ?>
                <!-- pagination -->
                <div class="col-12 mb-3 mt-3">
                    <div class="pagination d-flex justify-content-center">
                        <?php
                        if ($pageno != 1) {
                        ?>
                            <button class=" btn btn-danger" onclick="basicSearch(<?php echo $pageno - 1; ?>);">&laquo;</button>
                            <?php
                        }

                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            if ($page == $pageno) {
                            ?>
                                <button class="ms-1 btn btn-dark active" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                            <?php
                            } else {
                            ?>
                                <button class="ms-1 btn btn-danger" onclick="basicSearch(<?php echo $page; ?>);"><?php echo $page; ?></button>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        if ($pageno < $number_of_pages) {
                        ?>
                            <button class="ms-1 btn btn-danger" onclick="basicSearch(<?php echo $pageno + 1; ?>);">&raquo;</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- pagination -->
            </div>
        </div>
    </div>
</div>



<?php
}else if (empty($seachText) && $seachSelect == 0) {

?>
<div class="text-center mt-5 mb-5">
<h1>No Item Found</h1>
</div>
 
<?php

}else{
    echo "empty";
}



