<?php

session_start();

if(isset($_SESSION["u"])){
    ?>
   <script>
       alert("There is an active session already running")
   window.location = "home.php"</script>
    <?php
}else{


?>



<!DOCTYPE html>

<html>

<head>
    <title>E-Tech</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signup.css">
</head>

<body style="background-color: white;">
   <!-- header -->
   <div class="header">
                <div class="inner-header flex">
                    <h1 class="fw-bolder">Welcome to E-Tech</h1>
                </div>

                <div>
                    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                        </g>
                    </svg>
                </div>


            </div>
            <!-- header -->

    <div class="container-fluid vh-100 justify-content-center" >

        <div class="row  align-content-center">

         

            <!-- content -->
            <div class="col-10 offset-1 col-lg-2 d-none d-xl-block">
                <div class="row">
                    <div class="col-12">
                    <img src="resources/etech_logo.png" alt="" width="700px" style="margin-top: 150px;">
                    </div>
                </div>
                
            </div>

            <div class="col-10 offset-1 offset-lg-1 col-lg-6 p-3">

                <div class="row">
                    <div class="col-6 d-none d-lg-block background">

                    </div>
                    <div class="col-12 col-lg-8 offset-lg-4 mt-5 d-none" id="signUpBox">
                        <div class="row g-3">

                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                                <p id="msg" class="text-danger"></p>
                            </div>

                            <div class="col-6">
                                <label class="form-label fw-bold">First Name</label>
                                <input class="form-control" type="text" id="fname">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Last Name</label>
                                <input class="form-control" type="text" id="lname">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email</label>
                                <input class="form-control" id="email" type="email">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Password</label>
                                <input class="form-control" id="password" type="password">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Mobile</label>
                                <input class="form-control" id="mobile" type="text">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Gender</label>
                                <Select class="form-select" id="gender">

                                    <?php
                                    require "connection.php";

                                    $r = Database::search("SELECT * FROM `gender`");

                                    $n = $r->num_rows;
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                    <?php

                                    }
                                    ?>
                                </Select>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-danger" onclick="signUp();"> Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-dark" onclick="changeView();"> Already have a account? Sign In</button>
                            </div>

                        </div>

                    </div>
                    <div class="col-12 col-lg-8 offset-lg-4 mt-5" id="signInBox">
                        <div class="row g-3">

                            <div class="col-12">
                                <p class="title2">Sign In To Your Account</p>
                                <p id="msg2" class="text-danger fw-bolder fs-5"></p>
                            </div>


                            <div class="col-12 col-lg-10">

                                <?php

                                $e = "";
                                $p = "";

                                if (isset($_COOKIE["e"])) {
                                    $e = $_COOKIE["e"];
                                }

                                if (isset($_COOKIE["p"])) {
                                    $p = $_COOKIE["p"];
                                }
                                ?>
                                <label class="form-label fw-bold">Email</label>
                                <input class="form-control" value="<?php echo $e; ?>" type="email" id="email2">
                            </div>
                            <div class="col-12 col-lg-10">
                                <label class="form-label fw-bold">Password</label>
                                <input class="form-control" value="<?php echo $p; ?>" type="password" id="password2">
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label fw-bold">Remember Me</label>
                                </div>

                            </div>

                            <div class="col-5">
                                <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                            </div>

                            <div class="col-12 col-lg-5 d-grid">
                                <button class="btn btn-outline-danger" onclick="signIn();"> Sign In</button>
                            </div>

                            <div class="col-12 col-lg-5 d-grid">
                                <button class="btn btn-outline-dark" onclick="changeView();">Join Now to E-tech</button>
                            </div>

                        </div>

                    </div>


                </div>

            </div>
            <!-- content -->


            <!--footer-->

            <div class="col-12 d-none d-lg-block fixed-bottom">

                <p class="text-center">&copy; 2021 E-tech.lk All Rights Reseverd</p>

            </div>

            <!--footer-->

            <!--Modal-->
            <div class="modal fade" tabindex="-1" id="forgetPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Password Reset</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">

                                <div class="col-12 mb-1">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" id="np">
                                        <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();">Show</button>
                                    </div>

                                </div>


                                <div class="col-12">
                                    <label class="form-label">Re-Type Password</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" id="rnp">
                                        <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="form-label text-danger fw-bold">Verification Code</label>
                                    <input class="form-control" type="text" id="vc">
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal-->
        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>

<?php 

}
?>