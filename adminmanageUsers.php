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

        <link rel="icon" href="resources/logo.svg">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>E-Tech | Admin | Manage Users</title>
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
                                    <a href="adminmanageUsers.php" class="mm-active">
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
                                    <div>Manage Users
                                        <div class="page-title-subheading">Manage you valuble customers here.
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
                                                    <th class="text-center">User</th>
                                                    <th class="text-center">Mobile</th>
                                                    <th class="text-center">Reg Date</th>
                                                </tr>
                                            </thead>
                                            <?php

                                            if (isset($_GET["page"])) {
                                                $pageno = $_GET["page"];
                                            } else {
                                                $pageno = 1;
                                            }


                                            $usersrs = Database::search("SELECT * FROM `user` ");
                                            $d = $usersrs->num_rows;
                                            $srow = $usersrs->fetch_assoc();
                                            $result_per_page = 20;
                                            $number_of_pages = ceil($d / $result_per_page);
                                            $page_first_result = ((int)$pageno - 1) * $result_per_page;
                                            $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                            $srn = $selectedrs->num_rows;

                                            $c = 0;
                                            ?>
                                            <tbody>
                                                <?php
                                                while ($srow = $selectedrs->fetch_assoc()) {
                                                    $c = $c + 1;
                                                ?>
                                                    <tr>
                                                        <td class="text-center text-muted"><?php echo $c; ?></td>
                                                        <?php
                                                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $srow["email"] . "' ");
                                                        $profileimgnr = $profileimg->num_rows;
                                                        $pcode = $profileimg->fetch_assoc();
                                                        ?>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left mr-3">
                                                                        <div class="widget-content-left">
                                                                            <?php
                                                                            if ($profileimgnr == 1) {
                                                                            ?>
                                                                                <img src=" <?php echo $pcode["code"]; ?>" class="rounded-circle mx-2" style="height: 40px; margin-left: 80px;">
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <img src="resources/user.svg" class="rounded-circle mx-2" style="height: 40px; margin-left: 80px;">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading"><?php echo $srow["fname"] . " " . $srow["lname"]; ?></div>
                                                                        <div class="widget-subheading opacity-7"><?php echo $srow["email"]; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><?php echo $srow["mobile"]; ?></td>
                                                        <?php
                                                        $rd = $srow["register_date"];
                                                        $splitrd = explode(" ", $rd);
                                                        $regDate = $splitrd[0];
                                                        ?>
                                                        <td class="text-center"><?php echo $regDate; ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            $s = $srow["status_id"];
                                                            if ($s == "1") {
                                                            ?>
                                                                <button class="btn btn-danger" onclick="blockuser('<?php echo $srow['email']; ?>');">Block</button>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <button class="btn btn-success" onclick="blockuser('<?php echo $srow['email']; ?>');">Unblock</button>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>

                                                    </tr>
                                                <?php } ?>




                                            </tbody>
                                        </table>
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