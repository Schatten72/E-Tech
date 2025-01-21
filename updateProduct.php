<?php

session_start();

require "connection.php";


$product = $_SESSION["p"];

if(isset($_SESSION["p"])){

?>

<!DOCTYPE html>

<html>

<head>
    <title>E-Tech |Update Product</title>
    <link rel="icon" href="resources/logo.svg">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>E-Tech | Admin | Manage Users</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="stylesheet" href="bootstrap.css">
        <link href="style.css" rel="stylesheet">
        <link href="dashboard.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body class="bg-light">

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <?php
            require_once "adminheader_menu.php";
            ?>
            <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="adminp.php">
                                        <i class="material-icons metismenu-icon">dashboard</i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="adminmanageUsers.php">
                                        <i class="material-icons metismenu-icon">supervisor_account</i>
                                        Manage Users
                                    </a>
                                </li>
                                <li>
                                    <a href="adminmanageProd.php">
                                        <i class="material-icons metismenu-icon">search</i>
                                        View Products
                                    </a>
                                </li>
                                <li>
                                    <a href="adminproductview.php" class="mm-active">
                                        <i class="material-icons metismenu-icon">store</i>
                                        Manage Products
                                    </a>
                                </li>
                                <li>
                                    <a href="adminaddproduct.php" >
                                        <i class="material-icons metismenu-icon">add</i>
                                        Add New Products
                                    </a>
                                </li>
                                <li>
                                    <a href="adminmangedb.php">
                                        <i class="material-icons metismenu-icon">store</i>
                                        Manage Database
                                    </a>
                                </li>
                                <li>
                                    <a href="messagesA.php">
                                        <i class="material-icons metismenu-icon">message</i>
                                        Messages
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <!-- <div class="page-title-icon">
                                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                        </i>
                                    </div> -->
                                    <div>UPDATE PRODUCT
                                        <div class="page-title-subheading">Add your new items here.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        <h3 class="h2  text-primary">Fill in the Details</h3>
                                        <div class="btn-actions-pane-right">

                                        </div>
                                    </div>





            <!-- heading -->

            <div id="updateproductbox" class=" col-12 col-lg-8 offset-lg-2 bg-white rounded">


                <div class="col-12 mb-2">
                    <h3 class="h2 text-center text-primary">Update Product</h3>
                </div>
                <!-- heading -->

                <!-- search field -->

                <!-- <div class="col-12 mb-2 mt-4">
                    <div class="row">
                        <div class="offest-0 offset-lg-1 col-12 col-lg-6">
                            <input type="text" class="form-control text-center" id="searchToUpdate" placeholder="Search Product You Want To Update">
                        </div>
                        <div class="col-12 col-lg-4 d-grid">
                            <button class="btn btn-primary mt-sm-2 mt-lg-0 searchbtn" onclick="searchtoupdate();" style="height: 40px;">Search Product</button>
                        </div>
                    </div>
                </div> -->

                <!-- search field -->
                <hr class="hrbreak1" />
                <!-- category,brand,modal -->

                <div class="col-lg-12">
                    <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Category</label>
                                </div>
                                <div class="col-12 mb-3">
                                    <select class="form-select" id="ca" disabled>

                                        <?php

                                        $category = Database::search("SELECT * FROM `category` WHERE `id`= '" . $product["category_id"] . "'");

                                        $cd = $category->fetch_assoc();



                                        ?>

                                        <option value="0"><?php echo  $cd["name"] ?></option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-8 offset-lg-2">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Brand</label>
                                </div>
                                <div class="col-12 mb-3">
                                    <select class="form-select" id="br" disabled>

                                        <?php

                                  

                                        $prod =  Database::search("SELECT `product`.`id`,`product`.`status_id`,`product`.`description`,`product`.`qty`,`product`.`title`,`product`.`price`,`brand`.`name`AS `b_name`,`model`.`name`AS `m_name`,`product`.`qty` FROM `product` 
                                        INNER JOIN `model_has_brand` ON `product`.`model_has_brand_id`=`model_has_brand`.`id` INNER JOIN `brand` ON `brand`.`id`=`model_has_brand`.`brand_id` 
                                        INNER JOIN `model` ON `model_has_brand`.`model_id`=`model`.`id` WHERE model_has_brand_id = '" . $product["model_has_brand_id"] . "'  ORDER BY `product`.`datetime_added` DESC LIMIT 5 OFFSET 0;");
                                       
                                      

                                            $pr = $prod->fetch_assoc();



                                        ?>
                                        <option value="0"><?php echo  $pr["b_name"] ?></option>

                                    </select>

                                </div>
                            </div>
                        </div>



                      
                        <div class="col-12 col-lg-8  offset-lg-2">
                            <div class="row ">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Models</label>
                                </div>
                                <div class="col-12 mb-3">
                                    <select class="form-select" id="mo" disabled>
                                        <option value="0"><?php echo  $pr["m_name"] ?></option>

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- category,brand,modal -->

              
                <!--title-->

            
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-12">

                        
                            <label class="form-label lbl1">Add a Title to your Product</label>
                        </div>
                        <div class=" col-12 col-lg-12">
                            <input class="form-control" type="text" id="ti" value="<?php echo  $product["title"] ?>">
                        </div>
                    </div>
                </div>
                <!--title-->



                <!--condition,color,qty-->

                <div class="col-12">
                    <div class="row">
                    <div class="col-12 col-lg-8  offset-lg-2">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Condition</label>
                                </div>
                                <div class="offset-1 col-10 offset-lg-1 col-12 col-lg-3 form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked disabled />
                                    <label class="form-check-label text-black-50 fs-5"  for="bn">
                                        Brandnew
                                    </label>
                                </div>
                                <div class="offset-1 col-10 offset-lg-1 col-12 col-lg-3 form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="us" disabled />
                                    <label class="form-check-label text-black-50 fs-5" for="us">
                                        Used
                                    </label>
                                </div>
                            </div>
                        </div>
<!-- 
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Colour</label>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr1" disabled />
                                            <label class="form-check-label" for="clr1">
                                                Gold
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr2" disabled />
                                            <label class="form-check-label" for="clr2">
                                                Silver
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr3" disabled />
                                            <label class="form-check-label" for="clr3">
                                                Graphite
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr4" disabled />
                                            <label class="form-check-label" for="clr4">
                                                Pasicif Blue
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr5" disabled />
                                            <label class="form-check-label" for="clr5">
                                                Jet Black
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6" disabled />
                                            <label class="form-check-label" for="clr6">
                                                Rose Gold
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-12 col-lg-8 offset-lg-2 mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1  text-black-50">Add Product Quantity</label>
                                    <input class="form-control" type="number" value="<?php echo  $product["qty"] ?>" min="0" id="qty" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--condition,color,qty-->

                <hr class="hrbreak1" />

                <!--cost,Payment method-->

                <div class="col-12">
                    <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2 mt-2">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1 text-black-50">Cost Per Item</label>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost" value="<?php echo  $product["price"] ?>"/>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Approved Payment Methods</label>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-2 col-2 pm1"></div>
                                        <div class="col-2 pm2"></div>
                                        <div class="col-2 pm3"></div>
                                        <div class="col-2 pm4"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!--cost,Payment method-->


                <hr class="hrbreak1" />

                <!--Delivery cost-->

                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Delivery Cost</label>
                        </div>
                        <div class="offset-lg-1 col-12 col-lg-3">
                            <label class="form-label">Delivery Cost Within Colombo</label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs.</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc" value="<?php echo  $product["delivery_fee_colombo"] ?>"/>
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1"></label>
                        </div>
                        <div class="offset-lg-1 col-12 col-lg-3  mt-lg-3">
                            <label class="form-label">Delivery Cost Out ofColombo</label>
                        </div>
                        <div class="col-12 col-lg-6  mt-lg-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rs.</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc" value="<?php echo  $product["delivery_fee_other"] ?>"/>
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Delivery cost-->
                <hr class="hrbreak1" />

                <!--description-->

               
                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Product Description</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" cols="100" rows="30" style="background-color: whitesmoke;" id="desc"><?php echo  $product["description"] ?></textarea>
                        </div>
                    </div>
                </div>

                <!--description-->
                <hr class="hrbreak1" />

                <!--Product Img-->

                <!-- <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Add Product Image</label>
                        </div>
                        <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="resources/addproductimg.svg" id="prev">
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-lg-6  mt-2">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <input class="d-none" type="file" accept="img/*" id="imguploader" />
                                            <label class="btn btn-primary col-5 col-lg-8" for="imguploader" onclick="changeImg();">Upload</label>
                                        </div>
                                           <div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
                         <button class="btn btn-primary">Upload</button>
                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label lbl1"> Add product Image</label>
                        </div>
                        <div class="col-4 col-lg-4 d-inline">

                            <img src="resources/no_image.jpg" alt="" class="img-thumbnail col-12" id="prev1" style="height: 220px;">
                            <div class="col-12">

                                <div class="row">

                                    <div class="col-12 col-lg-12  mt-2">
                                        <input type="file" accept="image/*" class="form-control d-none" id="imgUploader1">
                                        <label for="imgUploader1" class="btn btn-primary col-12 col-lg-4 d-grid" onclick="changeImg1();">Upload</label>
                                    </div>
                              
                                </div>

                            </div>

                        </div>

                        <div class="col-4 col-md-4 d-inline">

                            <img src="resources/no_image.jpg" alt="" class="img-thumbnail col-12" id="prev2" style="height: 220px;">
                            <div class="col-12">

                                <div class="row">

                                    <div class="col-12 col-lg-12  mt-2">
                                        <input type="file" accept="image/*" class="form-control d-none" id="imgUploader2">
                                        <label for="imgUploader2" class="btn btn-primary col-12 col-lg-4 d-grid" onclick="changeImg2();">Upload</label>
                                    </div>
                                   
                                </div>

                            </div>

                        </div>

                        <div class="col-4 col-md-4 d-inline">

                            <img src="resources/no_image.jpg" alt="" class="img-thumbnail col-12" id="prev3" style="height: 220px;">
                            <div class="col-12">

                                <div class="row">

                                    <div class="col-12 col-lg-12 mt-2">
                                        <input type="file" accept="image/*" class="form-control d-none" id="imgUploader3">
                                        <label for="imgUploader3" class="btn btn-primary col-12 col-lg-4 d-grid" onclick="changeImg3();">Upload</label>
                              
                                </div>

                            </div>

                        </div>
                

                    </div>

                    </div>
                </div> -->

                <!--Product Img-->


                <!--Notice-->

             
                <!-- <div class="col-12 col-lg-8 offset-lg-2 mt-2">
                    <label class="form-label lbl1">Notice...</label>
                    <br />
                    <label>We are taking 5% of the product price from every product as a service charge.</label>
                </div> -->

                <!--Notice-->

                <!--save button-->
                <div class="col-12 mt-5 mb-5">
                    <div class="row">

                    <div class="offset-0 offset-lg-7 col-12 col-lg-3 d-grid">
                            <button class="btn btn-success " onclick=" updateProduct('<?php echo $product['id']  ?>');">Update Product</button>
                        </div>
                        <!-- <div class="col-12 col-lg-4 d-grid mt-2 mt-lg-0">
                            <button class="btn btn-dark searchbtn" onclick="changeProductView();">Add Product</button>
                        </div> -->

                    </div>
                </div>
                <!--save button-->

            </div>






            </div>
                            </div>


                        </div>
                    </div>
                    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
                </div>
            </div>


            <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
        <script src="adminscript.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>

    
        <?php
}else{
    ?>

    <script>
        window.location ="adminsignin.php";
    </script>
    <?php
    
}

?>
</body>



</html>
