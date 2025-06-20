
<?php


require "connection.php";



?>
<!DOCTYPE html>

<html>

<head>
    <title>E-Tech |Admin Signin</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
 

</head>

<body style="background-color: #74EBD5; background-image: linear-gradient(90deg,black 0%,maroon 100%); min-height: 100px;">

    <div class="container-fluid justify-content-center" style="margin-top: 20px;">
        <div class="row align-content-center">

            <div class="col-12">
                <div class="row">
                    <div class="col-12"></div>
                    <div class="col-12">
                        <p class="text-center title1 text-white">Hi,Welcome to E-tech Admins</p>
                    </div>
                </div>
            </div>

            <div class="col-12 p-5">
                <div class="row">
                    <div class="col-6 offset-2 d-none d-lg-block mb-4 " style="height: 250px;">
                <img src="<?php echo 'resources/etech_logo.png'; ?>" alt="">
                </div>
                    <div class="col-12 col-lg-8 offset-lg-2 d-block mt-5">
                        <div class="row g-3">
                            <div class="col-12">
                                <p class="title2 text-white">Sign In to Your Account</p>
                            </div>
                            <div class="col-12">
                                <label class="forn-label text-white fs-4">Email </label>
                                <input type="email" class="form-control" id="e" />
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-outline-light" onclick="adminverfication();">Send verification code to Log In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger">Back User's to Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="verificationmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter the Verfication code</label>
                            <input type="text" class="form-control" id="v"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->

            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center">&copy;2021 eShop.lk All Rights Reserved.</p>
            </div>

        </div>
    </div>


    <script src="adminscript.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>