<?php session_start();
require "connection.php"; ?>

<!DOCTYPE html>

<html>

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

    <div>

        <!-- Navbar (sit on top) -->
        <div class="w3-top">
            <?php require "header.php";
            ?>
            <div class="w3-bar w3-white w3-card bg-dark" id="myNavbar">
                <a href="#home" class="w3-bar-item w3-button w3-wide text-white">E-Tech</a>
                <!-- Right-sided navbar links -->
                <div class="w3-right w3-hide-small">
                    <a href="#about" class="w3-bar-item w3-button text-white">ABOUT</a>
                    <a href="#team" class="w3-bar-item w3-button text-white"><i class="fa fa-user text-white"></i> TEAM</a>
                    <a href="#work" class="w3-bar-item w3-button text-white"><i class="fa fa-th text-white"></i> ITEMS</a>
                    <!-- <a href="#pricing" class="w3-bar-item w3-button"><i class="fa fa-usd"></i> PRICING</a> -->
                    <a href="#contact" class="w3-bar-item w3-button text-white"><i class="fa fa-envelope text-white"></i> CONTACT</a>
                </div>
                <!-- Hide right-floated links on small screens and replace them with a menu icon -->

                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
                    <i class="fa fa-bars text-white"></i>
                </a>
            </div>
        </div>

        <!-- Sidebar on small screens when clicking the menu icon -->
        <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
            <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
            <a href="#team" onclick="w3_close()" class="w3-bar-item w3-button">TEAM</a>
            <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">WORK</a>
            <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
        </nav>

        <!-- Header with full-height image -->
        <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
            <div class="w3-display-left w3-text-white" style="padding:48px">
                <span class="w3-jumbo w3-hide-small">Start something that matters</span><br>
                <span class="w3-xxlarge w3-hide-large w3-hide-medium">Start something that matters</span><br>
                <span class="w3-large">Stop wasting valuable time with projects that just isn't you.</span>
                <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Learn more and start today</a></p>
            </div>
            <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
                <i class="fa fa-facebook-official w3-hover-opacity"></i>
                <i class="fa fa-instagram w3-hover-opacity"></i>
                <i class="fa fa-snapchat w3-hover-opacity"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity"></i>
                <i class="fa fa-twitter w3-hover-opacity"></i>
                <i class="fa fa-linkedin w3-hover-opacity"></i>
            </div>
        </header>

        <!-- About Section -->
        <div class="w3-container mt-4" style="padding:128px 16px" id="about">
            <h3 class="w3-center">ABOUT E-TECH</h3>
            <p class="w3-center w3-large">Join us to share the future.</p>
            <div class="w3-row-padding w3-center" style="margin-top:64px">
                <div class="w3-quarter">
                    <!-- <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i> -->
                    <i class="bi bi-bag-fill w3-margin-bottom w3-jumbo w3-center"></i>
                    <p class="w3-large">Purchase</p>
                    <p>All computer and computer accessories to Purchase according to your desires.</p>
                </div>
                <div class="w3-quarter">
                    <!-- <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i> -->
                    <i class="bi bi-emoji-laughing-fill w3-margin-bottom w3-jumbo"></i>
                    <p class="w3-large">Trade</p>
                    <p>Auction your computer and computer accessories according to your desires.</p>
                </div>
                <div class="w3-quarter">
                    <!-- <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i> -->
                    <i class="bi bi-share-fill w3-margin-bottom w3-jumbo"></i>
                    <p class="w3-large">Sharing</p>
                    <p>We are making a platform for information regarding new technologies.Share your knowledge with us.</p>
                </div>
                <div class="w3-quarter">
                    <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>

                    <p class="w3-large">Support</p>
                    <p>We support you to discover your future dreams.</p>
                </div>
            </div>
        </div>

        <!-- Promo Section - "We know design" -->
        <div class="w3-container w3-light-grey" style="padding:128px 16px">
            <div class="w3-row-padding">
                <div class="w3-col m6">
                    <h3>ABOUT US</h3>
                    <p>We are the pioneers of e-marketing.We deal with all the Computer Hardware related accessories since 2018.</p>
                    <p><a href="home.php" class="w3-button w3-black"><i class="fa fa-th"> </i> View Our Store</a></p>
                </div>
                <div class="w3-col m6">
                    <img class="w3-image w3-round-large" src="resources/rpg.jpg" alt="Buildings" width="900" height="600">
                </div>
            </div>
        </div>

        <!-- Team Section -->
        <div class="w3-container" style="padding:128px 16px" id="team">
            <h3 class="w3-center">OUR TEAM</h3>
            <p class="w3-center w3-large">The ones who make your computer dreams come true.</p>
            <div class="w3-row-padding " style="margin-top:64px">
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card">
                        <img src="resources/aboutus/p2.jpg" alt="John" style="width:100%;">
                        <div class="w3-container">
                            <h3>John Kelly</h3>
                            <p class="w3-opacity">CEO & Founder</p>
                            <!-- <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p> -->
                            <p><a href="#contact" class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</a></p>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card">
                        <img src="resources/aboutus/p1.JPG" alt="Jane" style="width:100%">
                        <div class="w3-container">
                            <h3>Susan Kelly</h3>
                            <p class="w3-opacity">Managing Director</p>
                            <!-- <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p> -->
                            <p><a href="#contact" class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</a></p>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card">
                        <img src="resources/aboutus/p3.JPG" alt="Mike" style="width:100%">
                        <div class="w3-container">
                            <h3>Adam Ross</h3>
                            <p class="w3-opacity">Director</p>
                            <!-- <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p> -->
                            <p><a href="#contact" class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</a></p>
                        </div>
                    </div>
                </div>
                <div class="w3-col l3 m6 w3-margin-bottom">
                    <div class="w3-card">
                        <img src="resources/aboutus/p4.JPG" alt="Dan" style="width:100%">
                        <div class="w3-container">
                            <h3>Daniel Knight</h3>
                            <p class="w3-opacity">Director</p>
                            <!-- <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p> -->
                            <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promo Section "Statistics" -->
        <div class="w3-container w3-row w3-center w3-dark-grey bg-danger w3-padding-64" style="background-color: #74EBD5; background-image: linear-gradient(90deg,maroon 0%,black 100%);">
            <div class="w3-quarter">
                <span class="w3-xxlarge">08+</span>
                <br>Partners
            </div>
            <div class="w3-quarter">
                <span class="w3-xxlarge">500+</span>
                <br>Sellers
            </div>
            <div class="w3-quarter">
                <span class="w3-xxlarge">2k+</span>
                <br>Happy Buyers
            </div>
            <div class="w3-quarter">
                <span class="w3-xxlarge">3k+</span>
                <br>Users
            </div>
        </div>

        <!-- Work Section -->
        <div class="w3-container" style="padding:128px 16px" id="work">
            <h3 class="w3-center">Related Products</h3>
            <p class="w3-center w3-large">What we've provide for people</p>

            <div class="w3-row-padding" style="margin-top:64px">
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/10.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A microphone">
                </div>
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/4.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A phone">
                </div>
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/3.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A drone">
                </div>
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/9.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="Soundbox">
                </div>
            </div>

            <div class="w3-row-padding w3-section">
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/5.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A tablet">
                </div>
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/6.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A camera">
                </div>
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/7.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A typewriter">
                </div>
                <div class="w3-col l3 m6">
                    <img src="resources/aboutus/8.jpg" style="width:100%; height: 250px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A tableturner">
                </div>
            </div>
        </div>

        <!-- Modal for full size images on click-->
        <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
            <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
            <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
                <img id="img01" class="w3-image">
                <p id="caption" class="w3-opacity w3-large"></p>
            </div>
        </div>

        <!-- Skills Section -->
        <div class="w3-container w3-light-grey w3-padding-64">
            <div class="w3-row-padding">
                <div class="w3-col m6">
                    <h2>Our Vision</h2>
                    <p>Think about the brands you purchase from over and over. Why do you choose the ones you do, even when cheaper options exist?

                        Do you usually fly with a particular airline? Do you buy your coffee from the same place every morning? Do you recommend a specific restaurant whenever out-of-towners ask for suggestions?


                        <br>

                        Well, there's a good reason for it.
                    </p>
                    <p>The reason we stay loyal to brands is because of their values. The best brands combine physical, emotional, and logical elements into one exceptional customer (and employee) experience that you value as much as they do.<br>
                        </p>
                </div>
                <!-- <div class="w3-col m6">
                    <p class="w3-wide"><i class="fa fa-camera w3-margin-right"></i>Photography</p>
                    <div class="w3-grey">
                        <div class="w3-container w3-dark-grey w3-center" style="width:90%">90%</div>
                    </div>
                    <p class="w3-wide"><i class="fa fa-desktop w3-margin-right"></i>Web Design</p>
                    <div class="w3-grey">
                        <div class="w3-container w3-dark-grey w3-center" style="width:85%">85%</div>
                    </div>
                    <p class="w3-wide"><i class="fa fa-photo w3-margin-right"></i>Photoshop</p>
                    <div class="w3-grey">
                        <div class="w3-container w3-dark-grey w3-center" style="width:75%">75%</div>
                    </div>
                </div> -->
            </div>
        </div>

        <!-- Pricing Section -->
        <!-- <div class="w3-container w3-center w3-dark-grey" style="padding:128px 16px" id="pricing">
    <h3>PRICING</h3>
    <p class="w3-large">Choose a pricing plan that fits your needs.</p>
    <div class="w3-row-padding" style="margin-top:64px">
        <div class="w3-third w3-section">
            <ul class="w3-ul w3-white w3-hover-shadow">
                <li class="w3-black w3-xlarge w3-padding-32">Basic</li>
                <li class="w3-padding-16"><b>10GB</b> Storage</li>
                <li class="w3-padding-16"><b>10</b> Emails</li>
                <li class="w3-padding-16"><b>10</b> Domains</li>
                <li class="w3-padding-16"><b>Endless</b> Support</li>
                <li class="w3-padding-16">
                    <h2 class="w3-wide">$ 10</h2>
                    <span class="w3-opacity">per month</span>
                </li>
                <li class="w3-light-grey w3-padding-24">
                    <button class="w3-button w3-black w3-padding-large">Sign Up</button>
                </li>
            </ul>
        </div>
        <div class="w3-third">
            <ul class="w3-ul w3-white w3-hover-shadow">
                <li class="w3-red w3-xlarge w3-padding-48">Pro</li>
                <li class="w3-padding-16"><b>25GB</b> Storage</li>
                <li class="w3-padding-16"><b>25</b> Emails</li>
                <li class="w3-padding-16"><b>25</b> Domains</li>
                <li class="w3-padding-16"><b>Endless</b> Support</li>
                <li class="w3-padding-16">
                    <h2 class="w3-wide">$ 25</h2>
                    <span class="w3-opacity">per month</span>
                </li>
                <li class="w3-light-grey w3-padding-24">
                    <button class="w3-button w3-black w3-padding-large">Sign Up</button>
                </li>
            </ul>
        </div>
        <div class="w3-third w3-section">
            <ul class="w3-ul w3-white w3-hover-shadow">
                <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
                <li class="w3-padding-16"><b>50GB</b> Storage</li>
                <li class="w3-padding-16"><b>50</b> Emails</li>
                <li class="w3-padding-16"><b>50</b> Domains</li>
                <li class="w3-padding-16"><b>Endless</b> Support</li>
                <li class="w3-padding-16">
                    <h2 class="w3-wide">$ 50</h2>
                    <span class="w3-opacity">per month</span>
                </li>
                <li class="w3-light-grey w3-padding-24">
                    <button class="w3-button w3-black w3-padding-large">Sign Up</button>
                </li>
            </ul>
        </div>
    </div>
</div> -->

        <!-- Contact Section -->
        <div class="col-12 bg-dark">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="w3-container " style="padding:128px 16px" id="contact">
                        <h3 class="w3-center text-white">CONTACT US</h3>
                        <p class="w3-center w3-large text-white">Lets get in touch. Send us a message:</p>
                        <div style="margin-top:48px">
                            <p class="text-white"><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right text-white"></i> No.7 Negombo Road,Kurunegala.</p>
                            <p class="text-white"><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right text-white"></i> Phone: +94115116117</p>
                            <p class="text-white"><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right text-white"> </i> Email: etech@gmail.com</p>
                            <br>
                            <form action="/action_page.php" target="_blank">
                                <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
                                <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
                                <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject"></p>
                                <!-- <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p> -->
                                <textarea name="" id="" cols="30" rows="10" class="w3-input w3-border mb-4" type="text" placeholder="Message" required name="Message"></textarea>
                                <p>
                                    <button class="w3-button w3-black bg-white text-black" type="submit">
                                        <i class="fa fa-paper-plane bg-white text-black"></i> SEND MESSAGE
                                    </button>
                                </p>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-6" style="padding:128px 16px">

                    <!-- Image of location/map -->
                    <div class="col-12 0ffset-2">
                        <h3 class="w3-center text-white">FIND US</h3>
                        <img src="resources/map.png" class="w3-image " style=" width:100%;margin-top:78px;padding:80px 16px;">
                    </div>

                </div>
            </div>
        </div>


        <!-- Footer -->
        <!-- <footer class="w3-center w3-black w3-padding-64">
    <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
    <div class="w3-xlarge w3-section">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer> -->

        <?php require "footer.php"; ?>

    </div>


    <script src="aboutus.js"></script>
</body>



</html>