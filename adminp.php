<?php

session_start();

require "abs_path.php";     // Defined absolute path
require "connection.php";
require "admin_func.php";   // Admin Functions


if (isset($_SESSION["a"])) {
    $useremail  = $_SESSION["a"]["email"];
    

?>

    <!doctype html>
    <html lang="en">

    <head>

        <link rel="icon" href="resources/logo.svg">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>E-Tech | Admin | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link href="style.css" rel="stylesheet">
        <link href="dashboard.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>

    <body>
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
                    <?php
                    require_once "adminsidebar_menu.php";
                    ?>

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
                                    <div>Main Dashboard
                                        <div class="page-title-subheading">Find how your business is performing in a glimpse.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-card-1">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Daily Earnings</div>
                                            <!-- <div class="widget-subheading">Last year expenses</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-white"><span>Rs: <?php echo $a; ?>.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-card-2">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Monthly Earnings</div>
                                            <!-- <div class="widget-subheading">Total Clients Profit</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-white"><span>Rs: <?php echo $b; ?>.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-card-3">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Today Sellings</div>
                                            <!-- <div class="widget-subheading">People Interested</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-white"><span><?php echo $c ?> Items</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-card-3">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Monthly Sellings</div>
                                            <!-- <div class="widget-subheading">Revenue streams</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-warning"><span><?php echo $e ?> Items</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-card-4">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Monthly Sellings</div>
                                            <!-- <div class="widget-subheading">Last year expenses</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-white"><span><?php echo $e ?> Items</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-card-5">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Totals Sellings</div>
                                            <!-- <div class="widget-subheading">Total Clients Profit</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-white"><span><?php echo $f ?> Items</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-card-6">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Total Engagement</div>
                                            <!-- <div class="widget-subheading">People Interested</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-white"><span><?php echo $un; ?> Members</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-premium-dark">
                                    <div class="widget-content-wrapper text-white" style="flex-direction: column;">
                                        <div>
                                            <div class="widget-heading">Products Sold</div>
                                            <!-- <div class="widget-subheading">Revenue streams</div> -->
                                        </div>
                                        <div>
                                            <div class="widget-numbers text-warning"><span>$14M</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        $orders = Database::search("SELECT * FROM  `invoice`");
                        $norders = $orders->num_rows;
                        ?>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Orders</div>
                                                <div class="widget-subheading">Last year expenses</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success"><?php echo $norders ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php

                            $prs = Database::search("SELECT * FROM  `product`");
                            $nprs = $prs->num_rows;
                            ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Products</div>
                                                <div class="widget-subheading">Revenue streams</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"><?php echo $nprs ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php

                            $users = Database::search("SELECT * FROM  `user`");
                            $nousers = $users->num_rows;
                            ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Users</div>
                                                <div class="widget-subheading">People Interested</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger"><?php echo $nousers ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Income</div>
                                                <div class="widget-subheading">Expected totals</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-focus">$147</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Expenses</div>
                                                <div class="sub-label-right">100%</div>
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
        </div>
        <script src="adminscript.js"></script>
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
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