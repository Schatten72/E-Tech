<?php
session_start();
require "connection.php";

if (isset($_SESSION["a"])) {
    $uemail = $_SESSION["a"]["email"];
    //$semail = $_GET["e"];

    if (isset($_GET["e"])) {
       $nameCode = $_GET["e"];
    }else{
        $nameCode = "";
    }
    //echo $semail;

    ?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>eShop | Admin Messages</title>

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
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body style="background-color: #74EBD5; background-image: linear-gradient(90deg,maroon 0%,black 100%);"  onload="refresher('<?php echo $nameCode?>');">

        <div class="container-fluid">
            <div class="row">

                <!-- Header -->
                <?php require "adminheader_menu.php"; ?>
                <!-- Header -->

                <hr />

           
                <div class="col-12">
                    <div class="row rounded-lg overflow-hidden shadow">
                        <div class="col-12 col-lg-3 px-0 ">
                            <div class="bg-white">

                                <div class=" px-4 py-2 bg-light">
                                    <p class="h4 mb-0 py-1">Recent</p>
                                </div>

                                <div class="message-box">
                                    <div class="list-group rounded-0" id="rcv">



                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-lg-7">
                            <!-- massage box -->

                            <div class="col-12  offset-lg-2 col-lg-10 px-0">
                                <div class="row  px-4 py-5 chatbox text-white" id="chatrow">
                                    <!-- massage load venne methana -->


                                </div>
                            </div>

                            <div class="col-12 offset-lg-5 col-lg-5 mb-5">
                                <div class="row bg-white">

                                    <!-- text -->
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="input-group">
                                                <input type="text" id="msgtxt" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                                <div class="input-group-append">
                                                        <button id="sendbtn" class="btn btn-link fs-3" onclick="sendmessage('<?php echo $nameCode; ?>',1);">  <i class="material-icons metismenu-icon" >send</i></button>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- text -->

                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            
            </div>
        </div>

        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <!-- <script src="script,.js"></script> -->
        <script src="admin.js"></script>
    </body>

    </html>

    <?php
} else {
    ?>
        <script>
            window.location = "adminsignin.php";
        </script>
    <?php
}
?>