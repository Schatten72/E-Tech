<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {

    $recever = $_POST["e"];

    ///*if(isset($_POST["ad"])) {
    //$sender = $_SESSION["a"]["email"];
    //} else {
    $sender = $_SESSION["a"]["email"];
    //}*/

 

    // echo $sender."\n".$recever;

    // $senderrs = Database::s("SELECT * FROM `chat` WHERE `from`='" . $sender . "' OR `to`='" . $sender . "'");

    $senderrs = Database::search("SELECT * FROM `chat` WHERE (`from`='" . $sender . "' AND `to`='" . $recever . "') OR (`to`='" . $sender . "' AND `from`='" . $recever . "') ORDER BY `date` ASC;");

    $n = $senderrs->num_rows;

    if ($n == 0) {
?>

        <!-- empty message -->
        <div class="col-12 mb-3 text-center">
            <div class="msgbodyimg"></div>
            <p class="fs-4 mt-3 fw-bold text-white">No Messages To Show.</p>
        </div>
        <!-- empty message -->

        <?php
    } else {
        for ($x = 0; $x < $n; $x++) {
            //echo $sender;
            $f = $senderrs->fetch_assoc();

            $fdatetime = $f["date"];
            $datetime = explode(" ", $fdatetime);
            $ctime = date("g:i a", strtotime($datetime[1]));
            $date = $datetime[0];

            if ($f["from"] == $sender) {
        ?>
                   <!-- sender message -->
                   <div class="col-5"></div>
                <div class="col-7 media ml-auto mb-3">
                    <div class="media-body">
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white"><?php echo $f["content"]; ?></p>
                        </div>
                        <p class="small text-end text-white">
                            <?php
                        $d = $f["date"];
                         $splitdate = explode(" |",$d);
                         $pdate = $splitdate[0];
                         $splitmonth  = explode("-",$d);
                         $pmonth = $splitmonth[1];
                         $day = $splitmonth[2];

                         echo $pmonth . "/" . $day; ?></p>
                    </div>
                </div>
                <!-- sender message -->

            <?php
            } else {
            ?>

             
             <!-- Reciever Message--> 
             <div class="col-7 media mb-3">
                <?php
                $img = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '".$recever."'");
              
                if ($img->num_rows == 1){
                      $i =    $img->fetch_assoc();  
                      ?>
                      <img src="<?php echo $i["code"]?>" alt="user" width="50" class="rounded-circle">
                      <?php
                }else{
                    ?>
                    <img src="resources/user.svg" alt="user" width="50" class="rounded-circle">
                    <?php
                }

                
                ?>


                    <div class="media-body ml-3">
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted"><?php echo $f["content"]; ?></p>
                        </div>
                        <p class="small text-white"><?php echo $f["date"]?></p>
                    </div>
                </div>
                <div class="col-5"></div>
                         <!-- Reciever Message-->

<?php
            }
        }
    }
}

?>