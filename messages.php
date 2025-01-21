<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
    $uemail = $_SESSION["u"]["email"];
    $semail = "oshadhamega@gmail.com";

    //echo $semail;

    // if(isset($email)){



?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>eShop | Messages</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body style="background-color: #74EBD5; background-image: linear-gradient(90deg,maroon 0%,black 100%);" onload="refresher('<?php echo $semail; ?>');">

        <div class="container-fluid">
            <div class="row">

                <!-- Header -->
                <?php require "header.php"; ?>
                <!-- Header -->

                <hr />


                <div class="col-12">
                    <div class="row rounded-lg overflow-hidden shadow">
                        <div class="col-12 col-lg-3 px-0 ">
                            <div class="bg-white">

                                <div class=" px-4 py-2 bg-light">
                                    <p class="h4 mb-0 py-1">Seller</p>
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
                                                    <button id="sendbtn" class="btn btn-link fs-3" onclick="sendmessage('<?php echo $semail; ?>');"><i class="bi bi-cursor-fill fs-2"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Message typing area -->
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
        <script src="script,.js"></script>
    </body>

    </html>

    <?php
    //    }else {
    //     
    ?>
    <script>
        //             window.location = "home.php";
        //         
    </script>
<?php
    // }

} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>