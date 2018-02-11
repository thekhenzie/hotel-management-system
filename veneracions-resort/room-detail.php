<?php
session_start();
include_once 'dbconnect.php';

$id = $_GET['id'];

// select loggedin users detail
$res = mysql_query("SELECT * FROM room WHERE room_id=" . $id);
$roomRow = mysql_fetch_array($res);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Room Detail</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/favicon.png"/>

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="css/lib/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/font-lotusicon.css">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/lib/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/lib/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/lib/settings.css">
    <link rel="stylesheet" type="text/css" href="css/lib/bootstrap-select.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->


    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
         <header id="header" class="header-v2">

            <!-- END / HEADER TOP -->

            <!-- HEADER LOGO & MENU -->
            <div class="header_content" id="header_content">

                <div class="container">


                    <!-- HEADER MENU -->
                <nav class="header_menu">
                    <ul class="menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>

                        <li class="current-menu-item">
                            <a href="rooms.php">Rooms</a>
                        </li>
                        <li>
                            <a href="cottages.php">Cottages</a>
                        </li>
                        <li >
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                </nav>
                    <!-- END / HEADER MENU -->

                    <!-- MENU BAR -->
                    <span class="menu-bars">
                        <span></span>
                    </span>
                    <!-- END / MENU BAR -->

                </div>
            </div>
            <!-- END / HEADER LOGO & MENU -->

        </header>
        <!-- END / HEADER -->

        <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2><?php echo $roomRow['room_name'] ?></h2>
                        <p><?php echo $roomRow['descriptions'] ?></p>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- ROOM DETAIL -->
        <section class="section-room-detail bg-white">
            <div class="container">

                <!-- DETAIL -->
                <div class="room-detail">
                    <div class="row">
                        <div class="col-lg-9">

                            <!-- LAGER IMGAE -->
                            <div class="room-detail_img">
                                <div class="room_img-item">
                                    <img src="<?php echo $roomRow['imgpath'] ?>" style="height:496px;width:870px;"alt="">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="images/room/detail/lager/img-1.jpg" alt="">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="images/room/detail/lager/img-1.jpg" alt="">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="images/room/detail/lager/img-1.jpg" alt="">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="images/room/detail/lager/img-1.jpg" alt="">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="images/room/detail/lager/img-1.jpg" alt="">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                                <div class="room_img-item">
                                    <img src="images/room/detail/lager/img-1.jpg" alt="">
                                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                                </div>
                            </div>
                            <!-- END / LAGER IMGAE -->

                            <!-- THUMBNAIL IMAGE -->
                            <div class="room-detail_thumbs">
                                <a href="#"><img src="<?php echo $roomRow['imgpath'] ?>" alt=""></a>
                                <a href="#"><img src="images/room/detail/img-2.jpg" alt=""></a>
                                <a href="#"><img src="images/room/detail/img-2.jpg" alt=""></a>
                                <a href="#"><img src="images/room/detail/img-2.jpg" alt=""></a>
                                <a href="#"><img src="images/room/detail/img-2.jpg" alt=""></a>
                                <a href="#"><img src="images/room/detail/img-2.jpg" alt=""></a>
                                <a href="#"><img src="images/room/detail/img-2.jpg" alt=""></a>
                                <a href="#"><img src="images/room/detail/img-2.jpg" alt=""></a>
                            </div>
                            <!-- END / THUMBNAIL IMAGE -->

                        </div>

                        <div class="col-lg-3">

                            <!-- FORM BOOK -->
                            <div class="room-detail_book">

                                <div class="room-detail_total">
                                    <img src="images/icon-logo.png" alt="" class="icon-logo">

                                    <h6>STARTING ROOM FROM</h6>

                                    <p class="price">
                                        <span class="amout">₱<?php echo $roomRow['rate']?><span> /12hrs
                                    </p>
                                </div>

                                <div class="room-detail_form">
                                    <!-- <label>Arrive</label>
                                    <input type="text" class="awe-calendar from" placeholder="Arrive Date">
                                    <label>Depature</label>
                                    <input type="text" class="awe-calendar to" placeholder="Departure Date">
                                    <button class="awe-btn awe-btn-13">Book Now</button> -->
                                </div>

                            </div>
                            <!-- END / FORM BOOK -->

                        </div>
                    </div>
                </div>
                <!-- END / DETAIL -->

            </div>
        </section>
        <!-- END / SHOP DETAIL -->

        <!-- FOOTER -->
        <footer id="footer">

            <!-- FOOTER BOTTOM -->
            <div class="footer_bottom">
                <div class="container">
                    <p>&copy; 2017 Montalban Waterpark and Garden Resort All rights reserved.</p>
                </div>
            </div>
            <!-- END / FOOTER BOTTOM -->

        </footer>
        <!-- END / FOOTER -->

    </div>
    <!-- END / PAGE WRAP -->


    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="js/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lib/bootstrap-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
    <script type="text/javascript" src="js/lib/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/lib/owl.carousel.js"></script>
    <script type="text/javascript" src="js/lib/jquery.appear.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/lib/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/lib/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/lib/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
