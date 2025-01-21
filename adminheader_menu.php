<div class="app-header header-shadow">
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
      
        <a href="adminp.php">
            <button type="button" class="btn-icon btn-icon-only btn btn-success btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper ">
                  Dashboard
                </span>
            </button>
            </a> 
       
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
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="adminp.php" class="nav-link">
                        Dashboard
                    </a>
                </li>
           
                
            </ul>
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
                            <div class="widget-heading text-success fw-bolder">
                              <?php echo $_SESSION["a"]["email"] ?>
                            </div>
                            <div class="widget-subheading text-primary fw-bold">
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