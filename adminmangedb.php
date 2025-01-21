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
                    <div class="app-header-right" >
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
                                    <a href="adminmanageProd.php">
                                        <i class="material-icons metismenu-icon">search</i>
                                        View Products
                                    </a>
                                </li>
                                <li>
                                    <a href="adminproductview.php" >
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
                                    <a href="adminmangedb.php"  class="mm-active">
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
                                    <div>Manage Your Database
                                        <div class="page-title-subheading">Manage your inventory here.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                
         

                                    <div class="col-12">
                                        <h3 class="text-danger">Manage Categories</h3>
                                    </div>

                            

                                    <div class="col-12 mb-3">
                                        <div class="row g-1">

                                            <?php
                                            $categoryrs = Database::search("SELECT * FROM `category`");
                                            $num = $categoryrs->num_rows;


                                            for ($i = 0; $i < $num; $i++) {
                                                $row = $categoryrs->fetch_assoc();

                                            ?>
                                                <div class="col-12 col-lg-3 ">
                                                    <div class="row g-1 px-1 ">
                                                        <div class="col-12 text-center bg-body border border-2 border-dark shadow rounded " onclick="deletec('<?php echo $row['id'] ?>')" style="cursor: pointer;">
                                                            <label class="form-label fs-4 fw-bold py-3 text-danger " style="cursor: pointer;"><?php echo $row["name"] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--delete model Modal -->
                                                <div class="modal fade" id="deletecat<?php echo $row['id'] ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                                                    <div class=" modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Are you sure you want to Delete this Category</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success col-5" data-bs-dismiss="modal">No</button>
                                                                <button type="button" class="btn btn-danger  col-5" onclick="deletecategory('<?php echo $row['id'] ?>');">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            <div class="col-12 col-lg-3">
                                                <div class="row g-1 px-1">
                                                    <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                                        <div class="row" onclick="addnewmodal();" style="cursor: pointer;">
                                                            <div class="col-3 mt-3 addnewimg"></div>
                                                            <div class="col-9">
                                                                <label class="form-label fs-4 fw-bold py-3 text-black-50">Add New Category</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <h3 class="text-success">Manage Brands</h3>
                                    </div>

                                 

                                    <div class="col-12 mb-3">
                                        <div class="row g-1">

                                            <?php
                                            $brandrs = Database::search("SELECT * FROM `brand`");
                                            $num = $brandrs->num_rows;


                                            for ($i = 0; $i < $num; $i++) {
                                                $brow = $brandrs->fetch_assoc();

                                            ?>
                                                <div class="col-12 col-lg-3">
                                                    <div class="row g-1 px-1">
                                                        <div class="col-12 text-center bg-body border border-2 border-dark shadow rounded" onclick="deleteb('<?php echo $brow['id'] ?>')" style="cursor: pointer;">
                                                            <label class="form-label fs-4 fw-bold py-3 text-success" style="cursor: pointer;"><?php echo $brow["name"] ?></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--delete model Modal -->
                                                <div class="modal fade" id="deletebrand<?php echo $brow['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class=" modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Are you sure you want to Delete this Brand</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success col-5" data-bs-dismiss="modal">No</button>
                                                                <button type="button" class="btn btn-danger  col-5" onclick="deletebrand('<?php echo $brow['id'] ?>');">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            <div class="col-12 col-lg-3">
                                                <div class="row g-1 px-1">
                                                    <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                                        <div class="row" onclick="addnewmodalb();" style="cursor: pointer;">
                                                            <div class="col-3 mt-3 addnewimg"></div>
                                                            <div class="col-9">
                                                                <label class="form-label fs-4 fw-bold py-3 text-black-50">Add New Brand</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                               

                                    <div class="col-12">
                                        <h3 class="text-primary">Manage Models</h3>
                                    </div>

                                 

                                    <div class="col-12 mb-3">
                                        <div class="row g-1">

                                            <?php
                                            $modelrs = Database::search("SELECT * FROM `model`");
                                            $num = $modelrs->num_rows;


                                            for ($i = 0; $i < $num; $i++) {
                                                $mrow = $modelrs->fetch_assoc();

                                            ?>
                                                <div class="col-12 col-lg-3">
                                                    <div class="row g-1 px-1">
                                                        <div class="col-12 text-center bg-body border border-2 border-dark shadow rounded" onclick="deletem('<?php echo $mrow['id'] ?>')" style="cursor: pointer;">
                                                            <label class="form-label fs-4 fw-bold py-3 text-primary" style="cursor: pointer;"><?php echo $mrow["name"] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--delete model Modal -->
                                                <div class="modal fade" id="deletemodel<?php echo $mrow['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class=" modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel">Are you sure you want to Delete this Model</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success col-5" data-bs-dismiss="modal">No</button>
                                                                <button type="button" class="btn btn-danger  col-5" onclick="deletemodel('<?php echo $mrow['id'] ?>');">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            <div class="col-12 col-lg-3">
                                                <div class="row g-1 px-1">
                                                    <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                                        <div class="row" onclick="addnewmodalm();" style="cursor: pointer;">
                                                            <div class="col-3 mt-3 addnewimg"></div>
                                                            <div class="col-9">
                                                                <label class="form-label fs-4 fw-bold py-3 text-black-50">Add New Model</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Modal category-->
                                    <div class="modal fade" id="addnewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add new Category</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label">Category</label>
                                                    <input type="text" class="form-control" id="categorytxt">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="savecategory();">Save Category</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal brand-->
                                    <div class="modal fade" id="addnewmodalb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add new Brand</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label">Brand</label>
                                                    <input type="text" class="form-control" id="brandtxt">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="savebrand();">Save Brand</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal model-->
                                    <div class="modal fade" id="addnewmodalm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add new Model</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label">Model</label>
                                                    <input type="text" class="form-control" id="modeltxt">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="savemodel();">Save Model</button>
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