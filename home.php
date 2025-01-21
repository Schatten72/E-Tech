<?php
session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <title>E-Tech Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">



</head>

<body class="bg-fade">

<!-- Messenger Chat plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "107296961772102");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

    <div class="container-fluid">

        <div class="row">
            <!--header-->
            <?php

            require "header.php";

            ?>
            <!--header-->
            <hr class="hrbreak1" />

            <!--search bar-->
            <div class="col-12 justify-content-center">
                <div class="row mb-3">
                    <div class="offset-0 offset-lg-1 col-12 col-lg-1 logoimg mt-3 mt-lg-0" style="background-position: center; cursor: pointer;" onclick="gotohome();"></div>
                    <div class="offset-1 offset-lg-0 col-11 col-lg-6">
                        <div class="input-group input-group-lg-2 mt-3 mb-3">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" id="basic_search_text" placeholder="Search for your products...">
                            <select class=" form-control btn btn-outline-primary" id="basic_search_category">

                                <option value="0">Category</option>




                                <?php

                                $rs = Database::search("SELECT * FROM `category`");

                                $n = $rs->num_rows;

                                for ($i = 1; $i <= $n; $i++) {
                                    $cat = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $cat["id"] ?>"><?php echo $cat["name"] ?></option>



                                <?php
                                }

                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="offset-2 offset-lg-0 col-6 col-lg-1 d-grid gap-2">
                        <button class="btn btn-primary  searchbtn" onclick="basicSearch(1);"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg></button>
                    </div>
                    <div class="col-4 col-lg-2 mt-1 mt-lg-4">
                        <a href="advancedSearch.php" class="link-secondary link1">Advanced</a>

                    </div>
                </div>
            </div>
            <!--search bar-->
            <!-- <hr class="hrbreak1" /> -->

            <!--slide-->
            <div class="col-12">
                <div class="row">
                    <div class="col-12  d-none d-md-block d-lg-block" style="overflow-x: hidden;">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="resources/slider images/slide1.jpg" class="d-block posterimg1">
                                    <!-- <div class="carousel-caption d-none d-md-block postercaption">
                                     <h5 class="postertitle">Welcome to eShop</h5>
                                     <p class="postertext">The World's Best Online Store By One Click</p>
                                 </div> -->
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/slider images/slider2.jpg" class="d-block posterimg1">
                                    <!-- <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p class="postertext">Some representative placeholder content for the second slide.</p>
                                </div> -->
                                </div>
                                <div class="carousel-item">
                                    <img src="resources/slider images/slide3.jpg" class="d-block posterimg1">
                                    <!-- <div class="carousel-caption d-none d-md-block postercaption1">
                                     <h5 class="postertitle">Be Free....</h5>
                                     <p class="postertext">Experience the Lowest Delivery Costs With Us</p>
                                 </div> -->
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!--slide-->

            <!--product title view-->
            <div class="row" id="product_view_div">
                <div class="col-11 text-end mt-4">
                    <div class="row">
                        <a href="products.php" class="link-dark link2">Store <i class="bi bi-bag-check-fill"></i></a>&nbsp;&nbsp;
                    </div>
                </div>

                <?php
                $rs = Database::search("SELECT * FROM `category`");

                $n = $rs->num_rows;


                for ($x = 0; $x < $n; $x++) {
                    $c = $rs->fetch_assoc();
                    $resultset = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $c["id"] . "' ORDER BY `datetime_added` DESC  LIMIT 5 OFFSET 0");
                      $prn = $resultset->num_rows;

                    if($prn == 0){



                    }else{

                   
                ?>
                
                    <div class="offset-1 col-12 col-lg-6 mt-2 align-self-start">
                        <a href="products.php?id=<?php echo $c["id"] ?>" class="link-dark link2"><?php echo $c["name"] ?></a>&nbsp;&nbsp;
                        <a href="products.php?id=<?php echo $c["id"] ?>" class="link-dark link3"> &rightarrow;</a>
                    </div>


                    <?Php

                    $resultset = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $c["id"] . "' ORDER BY `datetime_added` DESC  LIMIT 5 OFFSET 0");

                    ?>

                    <!--product view-->

                    <div class="col-11 mb-5 offset-1">
                        <div class="row ">
                            <div class="mx-5 offset-lg-1 offset-2 col-10 col-md-11 col-lg-11 ">
                                <div class="row" id="pdetails">

                                    <?php

                                    $nr = $resultset->num_rows;
                                    for ($y = 0; $y < $nr; $y++) {
                                        $prod = $resultset->fetch_assoc();
                                        if ((int)$prod["status_id"] == 1) {

                                    ?>
                                        <div class="card card1 col-10 col-lg-4  mt-1 mb-1 ms-4 sgl-pd" style="width: 20rem;">

                                            <?php

                                            $pimage = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $prod["id"] . "'");
                                            $imgrow = $pimage->fetch_assoc();

                                            ?><a href="<?php echo "singleProductview.php?id=" . ($prod['id']); ?>" style="cursor: pointer;">
                                                <img src="<?php echo $imgrow["code"] ?>" class="card-img-top cardTopImg">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold"><?php echo $prod["title"] ?> <span class="badge bg-info">New</span></h5>
                                                <span class="card-text text-primary fw-bold">Rs.<?php echo $prod["price"] ?></span><br>

                                                <?php
                                            
                                                    if ((int)$prod["qty"] > 0) {
                                                ?>
                                                        <span class="card-text text-warning fw-bold">In stock</span><br>

                                                        <input class="form-control mb-2" type="number" value="1" id="qtytxt<?php echo  $prod['id']; ?>">
                                                        <a href="<?php echo "singleProductview.php?id=" . ($prod['id']); ?>" class="btn btn-outline-success ">Buy Now</a>
                                                        <a class="btn btn-outline-danger" onclick="addToCart(<?php echo  $prod['id'];  ?>);">Add Cart</a>
                                                        <a class="btn btn-secondary rm-love" onclick="addToWatchlist(<?php echo  $prod['id'];  ?>);"><i class="bi bi-heart-fill"></i></a>


                                                    <?php


                                                    } else {
                                                    ?>
                                                        <span class="card-text text-danger fw-bold">Out of stock</span><br>
                                                        <input class="form-control mb-2" type="number" value="1" disabled>
                                                        <a href="#" class="btn btn-outline-success  disabled">Buy Now</a>
                                                        <a href="#" class="btn btn-danger  disabled">Add To Cart</a>
                                                        <a class="btn btn-secondary rm-love" onclick="addToWatchlist(<?php echo  $prod['id'];  ?>);"><i class="bi bi-heart-fill"></i></a>


                                                    <?php
                                                    }
                                                
                                                ?>


                                            </div>
                                        </div>



                                    <?php
                                    }else {
                                           
                                    }
                                } 
                                    ?>



                                </div>

                            </div>
                        </div>
                    </div>


                    <!--product view-->




                <?php
                }
            }
                ?>

            </div>
            <!--product title view-->


            <!--footer-->

            <?php
            require "footer.php";

            ?>
            <!--footer-->
        </div>
    </div>

    <script src="script.js"></script>
  
</body>

</html>