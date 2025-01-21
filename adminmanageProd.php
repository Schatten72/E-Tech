<?php

session_start();

require "abs_path.php";     // Defined absolute path
require "connection.php";
require "admin_func.php";   // Admin Functions


if (isset($_SESSION["a"])) {

?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


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
        <link rel="icon" href="resources/logo.svg">

    </head>

    <body>
        <div class="app-container body-tabs-shadow fixed-sidebar fixed-header">
            <div class="app-header header-shadow" style="z-index: 15;">
                <div class="app-header__logo">
                    <div class="logo"></div>
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
                <div class="app-header__content">
                    <div class="app-header-left">
                        <!-- <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div> -->
                        <!-- <ul class="header-menu nav">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    Statistics
                                </a>
                            </li>
                            <li class="btn-group nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    Projects
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    Settings
                                </a>
                            </li>
                        </ul> -->
                    </div>
                    <div class="app-header-right">
                        <div class="header-btn-lg pr-0">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="btn-group">
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                <?php
                                                if (isset($_SESSION["a"])) {
                                                    $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["a"]["email"] . "'");

                                                    $pn = $profileimg->num_rows;
                                                    $pr = $profileimg->fetch_assoc();

                                                    if ($pn == 1) {
                                                ?>
                                                        <div>

                                                        </div> <img class="rounded-circle" src="<?php echo $pr["code"] ?>" width="42px" height="70px" onclick="gotoprofile();" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Profile">

                                                    <?php

                                                    } else {
                                                    ?>

                                                        <img class="rounded-circle " src="resources/user.svg" width="42px" height="80px" onclick="gotoprofile();" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Profile">

                                                    <?php
                                                    }
                                                } else {
                                                    ?>

                                                    <img class="rounded-circle" src="resources/user.svg" width="42px" height="80px" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Profile">

                                                <?php
                                                }


                                                ?>
                                                <!-- 
                                    <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""> -->
                                                <!-- <i class="fa fa-angle-down ml-2 opacity-8"></i> -->
                                            </a>
                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                                <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                                <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                                <div tabindex="-1" class="dropdown-divider"></div>
                                                <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left  ml-3 header-user-info">
                                        <div class="widget-heading">
                                            <?php echo $_SESSION["a"]["email"] ?>
                                        </div>
                                        <div class="widget-subheading">
                                            Manager
                                        </div>
                                    </div>
                                    <!-- <div class="widget-content-right header-user-info ml-3">
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button>
                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-main">
                <div class="app-sidebar sidebar-shadow" style="z-index: 10;">
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
                                    <a href="adminmanageProd.php" class="mm-active">
                                        <i class="material-icons metismenu-icon">search</i>
                                        View Status
                                    </a>
                                </li>
                                <li>
                                    <a href="adminproductview.php">
                                        <i class="material-icons metismenu-icon">store</i>
                                        Manage Products
                                    </a>
                                </li>
                                <li>
                                    <a href="adminaddproduct.php">
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
                                <li>
                                    <a href="adminsoldproducts.php">
                                        <i class="material-icons metismenu-icon">tag_faces</i>
                                        Sold Item List
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
                                    <div>Change Product Status
                                        <div class="page-title-subheading">Manage your inventory here.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Active Users
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="active btn btn-focus">Last Week</button>
                                                <button class="btn btn-focus">All Month</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Product</th>
                                                    <th class="text-center">Title</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Quantitiy</th>
                                                    <th class="text-center">Reg Date</th>
                                                    <th class="text-center">X</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                                    if (isset($_GET["page"])) {
                                        $pageno = $_GET["page"];
                                    } else {

                                        $pageno = 1;
                                    }

                                    $productrs = Database::search("SELECT * FROM `product`");
                                    $d =  $productrs->num_rows;
                                    $row = $productrs->fetch_assoc();

                                    $results_per_page = 7;

                                    $number_of_pages = ceil($d / $results_per_page);

                                    //   echo $d;
                                    //     echo "<br/>";
                                    //   echo $results_per_page;


                                    $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                    $selectedrs = Database::search("SELECT * FROM `product` ORDER BY `datetime_added` DESC LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");

                                    $srn = $selectedrs->num_rows;
                                    $c = "0";

                                    while ($srow = $selectedrs->fetch_assoc()) {

                                        $c = $c + 1;

                                        $soldrs = Database::search("SELECT * FROM `invoice` WHERE `product_id` ='" . $srow["id"] . "'");
                                        $nsold = $soldrs->num_rows;
                                        $sold = $soldrs->fetch_assoc();
                                        //   for ($i = 0; $i < $srn; $i++) {


                                    ?>

                                        <div class="col-12  mb-2">
                                            <div class="row" style="cursor: pointer;">

                                                <div class="col-2 col-lg-1 bg-dark pt-2 pb-2 text-end">
                                                    <span class="fs-5 fw-bold text-white"><?php echo $c; ?></span>
                                                </div>

                                                <?php

                                                $profileimg = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "'");

                                                $pn = $profileimg->num_rows;

                                                ?>
                                                <div class="col-2 bg-light pb-2 d-none d-lg-block" onclick="singleviewmodal('<?php echo $srow['id']; ?>');">
                                                    <?php



                                                    if ($pn >= 1) {
                                                        $p = $profileimg->fetch_assoc();
                                                    ?>
                                                        <img class="rounded-circle mt-1" src="<?php echo $p["code"]; ?>" style="height: 70px; margin-left: 100px;" />
                                                    <?php

                                                    } else {
                                                    ?>
                                                        <img class="rounded-circle mt-1" src="resources/no_image.jpg" style="height: 70px; margin-left: 100px;" />
                                                    <?php
                                                    }


                                                    ?>

                                                </div>
                                                <div class="col-6 col-lg-2 bg-success pt-2 pb-2 ">
                                                    <span class="fs-5 fw-bold  text-white"><?php echo $srow["title"]; ?></span>
                                                </div>
                                                <div class="col-2 col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                                    <span class="fs-5 fw-bold"><?php echo $srow["price"]; ?></span>
                                                </div>
                                                <div class="col-2 bg-success pt-2 pb-2 d-none d-lg-block">
                                                    <span class="fs-5 fw-bold text-white"><?php echo $srow["qty"]; ?></span>
                                                </div>
                                                <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                                    <span class="fs-5 fw-bold"><?php
                                                                                $rd = $srow["datetime_added"];
                                                                                $splitrd = explode(" ", $rd);
                                                                                echo $splitrd[0];
                                                                                ?></span>
                                                </div>


                                                <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">

                                                    <?php


                                                    $s = $srow["status_id"];

                                                    if ($s == "1") {
                                                    ?>

                                                        <button id="blockbtn<?php echo  $srow['id']; ?>" class="btn btn-danger" onclick="blockproduct('<?php echo $srow['id']; ?>');">Block</button>

                                                    <?php
                                                    } else {
                                                    ?>

                                                        <button class="btn btn-success" onclick="blockproduct('<?php echo  $srow['id']; ?>');">Unblock</button>

                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- single productview Modal -->
                                        <div class="modal fade mt-5" id="singleproductview<?php echo $srow['id']; ?>" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div id="singleproduct<?php echo $srow['id']; ?>">

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $srow["title"]; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <?php
                                                            $profileimg = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $srow["id"] . "'");
                                                            $p = $profileimg->fetch_assoc();

                                                            $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $srow["user_email"] . "'");
                                                            $ud = $user->fetch_assoc();
                                                            ?>
                                                            <div class="text-center">
                                                                <img src="<?php echo $p["code"]; ?>" style="width: 200px; height: 200px;">
                                                            </div>
                                                            <div class="text-start">
                                                                <span class="fs-4 fw-bold">Price :</span>&nbsp;
                                                                <span class="fs-4 fw-bold">Rs.<?php echo $srow["price"]; ?> .00</span><br />
                                                                <span class="fs-4 fw-bold">Quantity :</span>&nbsp;
                                                                <span class="fs-4 "><?php echo $srow["qty"]; ?> Items Remaining</span><br />
                                                                <span class="fs-5 fw-bold">Sellings :</span>&nbsp;
                                                                <span class="fs-5 "><?php echo $nsold; ?></span><br />
                                                                <span class="fs-5 fw-bold">Total income :</span>&nbsp;
                                                                <?php
                                                                if ($nsold == 0) {
                                                                ?>
                                                                    <span class="fs-5 ">Rs.00.00</span><br />
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="fs-5 ">Rs.<?php echo $sold["total"]; ?>.00</span><br />
                                                                <?php
                                                                }

                                                                ?>

                                                    
                                                                <span class="fs-5 fw-bold">Number of items Sold :</span>&nbsp;
                                                                <?php
                                                                if ($nsold == 0) {
                                                                ?>
                                                                    <span class="fs-5 ">0</span><br />
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="fs-5 ">Rs.<?php echo $sold["qty"]; ?>.00</span><br />
                                                                <?php
                                                                }

                                                                ?>

                                                                <span class="fs-5 fw-bold">Description :</span>&nbsp;
                                                                <span class="fs-5"><?php echo $srow["description"]; ?></span><br />
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">

                                                        <div class="text-start">
                                                            <button class="btn btn-dark me-2" onclick=" printpr(<?php echo $srow['id']; ?>);"><i class="bi bi-printer-fill"></i> Print</button>
                                                            <button class="btn btn-danger" onclick=" printpr(<?php echo $srow['id']; ?>);"><i class="bi bi-file-pdf-fill"></i> Save as PDF</button>
                                                        </div>

                                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-12 d-flex justify-content-center fs-5 fw-bold mt-4 mb-4">
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
                            </div>
                        </div>

                    </div>



                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>

        <script src="adminscript.js"></script>
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>

        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="bootstrap.bundle.min.js"></script>

    </body>

    </html>

<?php
} else {

?>
    <script>
        alert("Please SignIn First");
        window.location = "adminsignin.php";
    </script>
<?php
}
?>