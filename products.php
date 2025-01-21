<?php

session_start();
require "connection.php";

if (isset($_GET["id"])) {
    $cat = $_GET["id"];
}else{
    $cat ="x";
}



if ($cat == "x") {
    $stxt = "";
    $stxt1 = "";
} else {
    $stxt = Database::search("SELECT * FROM `prodduct` WHERE `id`='" . $cat . "';");
    $stxt1 = Database::search("SELECT * FROM `prodduct` WHERE `category_id`='" . $cat . "'");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>E-tech | Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body class="bg-light">

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

    <div class="container-fluid " >


        <?php

        $catS =  Database::search("SELECT * FROM `category` " . $stxt . ";");
        $catSD = $catS->fetch_assoc();



        ?>
        <div class="col-12">
            <div class="row  g-3">

                <?php
                require "header.php"
                ?>
            </div>
        </div>

        <div class="row ">

        <div class="col-10 offset-1 bg-white" >

        <div class="row">
         
            <div class="col-6 mt-2 offset-1 text-start"><span class="text-dark  fs-3"><a href="home.php" class="text-decoration-none text-center text-dark"> <i class="bi bi-arrow-left-circle-fill"></i> Go to home  </a></span></div>
        </div>
        <?php

        if ($cat == "x") {
        ?>

            <div class="row text-center mb-4">
            <div class="offset-0 offset-lg-5 col-1 logoimg " style="background-position: center;"> 
            <h1 class="text-danger fw-bolder offset-1 mx-3 mt-5" style="color: maroon;"> Store</h1></div>
          
               
            </div>
        <?php

        } else {

        ?>
            <div class="row">
                <h1 class="text-white text-center"><?php echo  $catSD["name"] ?></h1>
            </div>
        <?php
        }


        ?>



 
        <?php
            $selectProducts = Database::search("SELECT * FROM `Product` " . $stxt1 . " ");
            $selectProductsNr = $selectProducts->num_rows;
            if ($selectProductsNr > 0) {

            ?>

                <div class="col-12 mb-5 pb-2">
                    <div class="row">
                        <div class="offset-lg-1 col-12 col-lg-10 mt-2">
                            <div class="row justify-content-center justify-content-lg-start">

                                <?php
                                $resultSet = Database::search("SELECT * FROM   `product` " . $stxt1 . "  ORDER BY `datetime_added` DESC;");
                                $nr = $resultSet->num_rows;

                                if ($nr == 0) {
                                ?><div class=" text-center">
                                        <h1 class="text-white-50">No Products Yet</h1>
                                    </div>

                                <?php
                                }

                                for ($i = 0; $i < $nr; $i++) {
                                    $prod = $selectProducts->fetch_assoc();


                                    if((int)$prod["status_id"] == 1){
                                ?>
                                    <!-- This is Sigble product section start-->

                                    <?php

                                    $pImage = Database::search("SELECT * from `images` WHERE `product_id`='" . $prod["id"] . "'; ");
                                    $imgRow = $pImage->fetch_assoc();


                                    ?>



                                    <div class="card card1 col-10 col-lg-5 mx-1 mt-1 mb-1 ms-1 sgl-pd" style="width: 18rem;">

                                    <a href="<?php echo "singleProductview.php?id=" . ($prod['id']); ?>" style="cursor: pointer;">
                                             <img src="<?php echo $imgRow["code"] ?>" class="card-img-top cardTopImg">
                                             </a>

                                        <div class="card-body">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="card-title text-center mb-1"><?php echo $prod["title"] ?> <br />
                                                            <div class="row justify-content-center mt-2">
                                                                
                                                            </div>

                                                        </h5>




                                                        <div class="row text-center">
                                                            <div class="col-12 d-inline"> <span class="text-primary fs-5">Rs <?php echo $prod["price"] ?> .00</span><br>
                                                            </div>

                                                            <?php

                                                            if (isset($_SESSION[""])) {
                                                                $wish = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `product_id`='" . $prod["id"] . "' ;");
                                                                if ($wish->num_rows == 1) {
                                                                    $codeC = "text-danger";
                                                                } else {
                                                                    $codeC = "text-white";
                                                                }
                                                            }

                                                                if ((int)$prod["qty"] > 0) {
                                                                ?>
                                                                 <span class="card-text text-warning fw-bold">In stock</span><br>
            
                                                              
                                                                 <a href="<?php echo "singleProductview.php?id=" . ($prod['id']); ?>" class="btn btn-outline-success mb-2">Buy Now</a>
                                                                 <a class="btn btn-outline-danger" onclick="addToCart(<?php echo  $prod['id'];  ?>);">Add Cart</a>
                                                                 <a class="btn btn-secondary rm-love text-end" onclick="addToWatchlist(<?php echo  $prod['id'];  ?>);"><i class="bi bi-heart-fill"></i></a>
                                                               
            
                                                             <?php
            
            
                                                                } else {
                                                                ?>
                                                                 <span class="card-text text-danger fw-bold">Out of stock</span><br>
                                                              
                                                                 <a href="#" class="btn btn-outline-success  disabled  mb-2">Buy Now</a>
                                                                 <a href="#" class="btn btn-danger  disabled">Add To Cart</a>
                                                                 <a class="btn btn-secondary rm-love text-end" onclick="addToWatchlist(<?php echo  $prod['id'];  ?>);"><i class="bi bi-heart-fill"></i></a>
            
            
                                                             <?php
                                                                }
                                                           
                                                                ?>



                                                        </div>

                                                    </div>

                                                </div>
                                            </div>






                                        </div>
                                    </div>

                                    
                                    <!-- This is Sigble product section end-->
                                <?php
                                }
                            }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>

            <?php



            }


            ?>


        </div>
    



        </div>

        <div class="row">
            <?php
            require "footer.php";

            ?>
        </div>


    </div>

<script src="script,.js"></script>

</body>

</html>