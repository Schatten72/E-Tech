<?php
require "connection.php";
session_start();
?>
<!DOCTYPE html>

<html>

<head>

    <title>E-Tech | User Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body class="bg-danger">

    <?php

    if (isset($_SESSION["u"])) {

    ?>

        <div class="container-fluid bg-white rounded  ">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="col-12">
                    <label class="form-label fs-1 fw-bolder">Userprofile <i class="bi bi-person-circle"></i></label>
                </div>



                <div class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end  border-dark">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link text-dark fs-5" aria-current="page" href="watchlist.php">My Wishlist</a>
                        <a class="nav-link text-dark fs-5" href="cart.php">My Cart</a>
                        <a class="nav-link text-dark fs-5" href="purchasehistory.php">History</a>
                        <a class="nav-link active text-white bg-danger fs-5" href="userprofile.php">Profile</a>
                        <a class="nav-link text-dark fs-5" href="messages.php">Messages</a>
                        <!-- <a class="nav-link text-dark fs-5" href="sellerproductview.php">My Products</a> -->
                    </nav>
                </div>

                <!-- <div class="col-md-3 border-end">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <?php


                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");

                        $pn = $profileimg->num_rows;

                        if ($pn == 1) {
                            $p = $profileimg->fetch_assoc();
                        ?>
                            <img class="rounded mt-5" width="150px" src="<?php echo $p["code"]; ?>" id="prev" />

                        <?php
                        } else {
                        ?>
                            <img class="rounded mt-5" width="150px" src="resources/user.svg" id="prev" />

                        <?php
                        }

                        $userdetails = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION["u"]["email"] . "'");

                        $u = $userdetails->fetch_assoc();
                        ?>

                        <span class="font-weight-bold"><?php echo $u["fname"] . " " . $u["lname"]; ?></span>
                        <span class="text-black-50"><?php echo $_SESSION["u"]["email"]; ?></span>
                        <input class="d-none" type="file" id="profileimg" accept="img/*">
                        <label class="btn btn-primary mt-3" for="profileimg" onclick="changeProfileImg();">Update Profile Image</label>
                    </div>
                </div> -->

                <div class="col-md-5 border-end">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="font-weight-bold">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input id="fname" type="text" class="form-control" placeholder="First Name" value="<?php echo $u["fname"]; ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Surname</label>
                                <input id="lname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $u["lname"]; ?>" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input id="mobile" type="text" class="form-control" placeholder="Enter phone number" value="<?php echo $u["mobile"]; ?>" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Enter password" readonly value="<?php echo $_SESSION["u"]["password"]; ?>" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input id="email" type="text" class="form-control" placeholder="Enter email ID" value="<?php echo $_SESSION["u"]["email"]; ?>" readonly />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Registered Date</label>
                                <input type="text" class="form-control" placeholder="Registered date" value="<?php echo $_SESSION["u"]["register_date"] ?>" readonly />
                            </div>

                            <?php



                            $usermail =  $_SESSION["u"]["email"];
                            $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $usermail . "'");
                            $n = $addressrs->num_rows;

                            if ($n == 1) {

                                $d = $addressrs->fetch_assoc();

                            ?>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address Line 01</label>
                                    <input id="line1" type="text" class="form-control" placeholder="Enter address line 01" value="<?php echo $d["line1"] ?>" />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address Line 02</label>
                                    <input id="line2" type="text" class="form-control" placeholder="Enter address line 02" value="<?php echo $d["line2"] ?>" />
                                </div>
                        </div>
                        <div class="row mt-2">
                            <?php

                                $cityid = $d["city_id"];
                                $ucity = Database::search("SELECT * FROM `city` WHERE `id`= '" . $cityid . "';");
                                $c = $ucity->fetch_assoc();

                                $districtid = $c["district_id"];
                                $udist = Database::search("SELECT * FROM `district` WHERE `id` = '" . $districtid . "'");
                                $k = $udist->fetch_assoc();

                                $provinceid = $k["province_id"];
                                $uprovince = Database::search("SELECT * FROM `province` WHERE `id` = '" . $provinceid . "'");
                                $l = $uprovince->fetch_assoc();

                            ?>
                            <div class="col-md-6">
                                <label class="form-label">Province</label>
                                <Select id="province" class="form-control" disabled>
                                    <option value="<?php echo $l["id"]; ?>"><?php echo $l["name"]; ?></option>

                                    <?php

                                    $provincers = Database::search("SELECT * FROM `province` WHERE `id`!='" . $l["id"] . "'");
                                    $pn = $provincers->num_rows;

                                    for ($i = 0; $i < $pn; $i++) {
                                        $pr = $provincers->fetch_assoc();
                                        // if($l["id"]!=$pr["id"]){


                                    ?>

                                        <option value="<?php echo $pr["id"]; ?>"><?php echo $pr["name"]; ?></option>

                                    <?php
                                        // }
                                    }


                                    ?>
                                </Select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">District</label>
                                <select id="district" class="form-control">
                                    <option value="<?php echo $k["id"]; ?>"><?php echo $k["name"]; ?></option>


                                    <?php

                                    $districtrs = Database::search("SELECT * FROM `district` WHERE `id`!='" . $k["id"] . "'");
                                    $dn = $districtrs->num_rows;

                                    for ($i = 0; $i < $dn; $i++) {
                                        $dr = $districtrs->fetch_assoc();
                                        // if($l["id"]!=$pr["id"]){


                                    ?>

                                        <option value="<?php echo $dr["id"]; ?>"><?php echo $dr["name"]; ?></option>

                                    <?php
                                        // }
                                    }


                                    ?>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input id="city" type="text" class="form-control" placeholder="City" value="<?php echo $c["name"]; ?>" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Postal Code</label>
                                <input id="postalcode" type="text" class="form-control" placeholder="postalcode (Optional)" value="<?php echo $c["postal_code"]; ?>"/>
                            </div>




                        <?php

                            } else {
                        ?>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 01</label>
                                <input id="line1" type="text" class="form-control" placeholder="Enter address line 01" value="" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address Line 02</label>
                                <input id="line2" type="text" class="form-control" placeholder="Enter address line 02" value="" />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="form-label">Province</label>
                                <Select id="province" class="form-control" disabled>
                                    <option value="">Western</option>
                                    <option value="">Central</option>
                                    <option value="">North</option>
                                    <option value="">NorthWestern</option>
                                    <option value="">South</option>
                                </Select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">District</label>
                                <select id="district" class="form-control">
                                    <option value="">Colombo</option>
                                    <option value="">Kaluthara</option>
                                    <option value="">Galle</option>
                                    <option value="">Kandy</option>
                                    <option value="">Kurunegala</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input id="city" type="text" class="form-control" placeholder="City" value="" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Postal Code</label>
                                <input id="postalcode" type="text" class="form-control" placeholder="Enter your postalcode (Optional)" value="" />
                            </div>

                        <?php
                            }

                        ?>

                        <div class="col-md-6">
                            <label class="form-label">Gender</label>

                            <?php

                            $genderid = $_SESSION["u"]["gender_id"];
                            $ugender = Database::search("SELECT * FROM `gender` WHERE `id` = '" . $genderid . "'");
                            $g = $ugender->fetch_assoc();

                            ?>
                            <input type="text" class="form-control" placeholder="Gender" value="<?php echo $g["name"]; ?>" readonly />
                        </div>
                      
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <?php


                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");

                        $pn = $profileimg->num_rows;

                        if ($pn == 1) {
                            $p = $profileimg->fetch_assoc();
                        ?>
                            <img class="rounded mt-5" width="350px" src="<?php echo $p["code"]; ?>" id="prev" />

                        <?php
                        } else {
                        ?>
                            <img class="rounded mt-5" width="350px" src="resources/user.svg" id="prev" />

                        <?php
                        }

                        $userdetails = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION["u"]["email"] . "'");

                        $u = $userdetails->fetch_assoc();
                        ?>

                        <span class="font-weight-bold"><?php echo $u["fname"] . " " . $u["lname"]; ?></span>
                        <span class="text-black-50"><?php echo $_SESSION["u"]["email"]; ?></span>
                        <input class="d-none" type="file" id="profileimg" accept="img/*">
                        <label class="btn btn-outline-dark mt-3" for="profileimg" onclick="changeProfileImg();">Add Image Preview</label>

                    </div>
                    <div class="col-8 offset-2 text-center d-grid">
                            <button class="btn btn-outline-success" onclick="updateProfile();">Update Profile</button>
                        </div>
                </div>

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
            <!-- <div class="col-md-4">
                <div class="row">
                    <div class="p-3 py-5">
                        <div class="col-md-12">
                            <span class="header font-weight-bold">User Ratings</span>
                            <span class="fa fa-star fs-4  text-warning"></span>
                            <span class="fa fa-star fs-4  text-warning"></span>
                            <span class="fa fa-star fs-4  text-warning"></span>
                            <span class="fa fa-star fs-4  text-warning"></span>
                            <span class="fa fa-star fs-4 text-secondary"></span>
                            <p>4.1 average based on 254 reviews</p>
                            <hr style="border: 3px solid #f1f1f1" />
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div>5 star</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="text-end">150</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>4 star</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="text-end">63</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>3 star</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="text-end">15</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>2 star</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="text-end">6</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>1 star</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="text-end">20</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div> -->
            <?php

            require "footer.php";

            ?>

            </div>

        </div>


        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>