<?php
ob_start();
session_start();
session_destroy();
session_start();
require_once 'dbconnect.php';

// select loggedin users detail
$res = mysql_query("SELECT * FROM admin WHERE adminID=" . $_SESSION['user']);
$userRow = mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Index</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/favicon.png" />

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
    <link rel="stylesheet" type="text/css" href="css/lib/devStyle.css">
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
<!--[if (gt IE 9)|!(IE)]><!-->

<body>
    <!--<![endif]-->


    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
        <header id="header" class="header-v2">


            <!-- HEADER LOGO & MENU -->
            <div class="header_content" id="header_content">
                <div class="container">
                    <!-- HEADER LOGO -->

                    <!-- END / HEADER LOGO -->

                    <!-- HEADER MENU -->
                    <nav class="header_menu">
                    <ul class="menu">
                        <li class="current-menu-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>

                        <li>
                            <a href="rooms.php">Rooms</a>
                        </li>
                        <li>
                            <a href="cottages.php">Cottages</a>
                        </li>
                        <li>
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

        <!-- BANNER SLIDER -->
        <section class="section-slider">
            <h1 class="element-invisible">Slider</h1>
            <div id="slider-revolution">
                <ul>
                    <li data-transition="fade">
                        <img src="images/slider/img-1.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center"
                            alt="">

                        <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500"
                            data-easing="easeOutBack">
                            <img src="images/slider/hom1-slide1.png" alt="icons">
                        </div>

                        <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500"
                            data-easing="easeOutBack">
                            WELCOME TO
                        </div>

                        <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"
                            data-start="2000"><div class='row' style='text-align: center;'>Montalban Waterpark <br/>and<br/> Garden ResortS</div></div>

                        <!-- <a href="#" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider" data-x="center" data-y="380" data-easing="easeOutBack"
                            data-speed="700" data-start="2200">VIEW NOW</a> -->
                    </li>

                    <li data-transition="fade">
                        <img src="images/slider/img-1.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center"
                            alt="">

                        <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                            <img src="images/icon-slider-1.png" alt="">
                        </div>

                        <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700"
                            data-start="1500" data-easing="easeOutBack">
                            <!-- EACH HOTEL IS -->
                            COME AND
                        </div>

                        <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"
                            data-start="2000">
                            <!-- UNIQUE 60% -->
                            VISIT US
                        </div>

                        <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack"
                            data-speed="700" data-start="2200">
                            RIGHT NOW
                        </div>

                        <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack"
                            data-speed="700" data-start="2400">
                            <img src="images/icon-slider-2.png" alt="">
                        </div>
                    </li>

                </ul>
            </div>

        </section>
        <!-- END / BANNER SLIDER -->

        <!-- CHECK AVAILABILITY -->
        <section class="section-check-availability">
            <div class="container">
                <div class="check-availability">
                    <div class="row">
                        <div class="col-md-3">
                            <h2>ROOMS & RATES</h2>
                        </div>
                        <form name="form" action="choose-room.php" method="post" onSubmit="return validateForm(this);">
                        <div class="col-md-9">
                        <!-- <div class="col-lg-3"> -->
                            
                        <!-- </div> -->
                            <div class="availability-form">
                            <a href="deposit.php" class='awe-btn awe-btn-13' style="margin-right: 10px"> Upload Deposit slip </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <!-- </div> -->
                        <!-- <div class="col-lg-3"> -->
                            <a href="cancellation.php" class='awe-btn awe-btn-13' style="margin-right: 50px"> Cancel reservation </a>&nbsp;&nbsp;&nbsp;&nbsp;
                            
                                <input type="text" name='checkIn' id='checkIn' required class="awe-calendar from" placeholder="Arrival Date">
                                <input type="text" name='checkOut' id='checkOut' required class="awe-calendar from" placeholder="Departure Date">
                                <div class="vailability-submit">
                                    <button name="submit" href="#" class="awe-btn awe-btn-13">BOOK NOW</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / CHECK AVAILABILITY -->
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
    <script>
	function validateForm(form) {
		var checkIn = form.checkIn.value;
		var checkOut = form.checkOut.value;
		var totalAdults = form.totalAdults.value;
		var totalChildren = form.totalChildren.value;
	}
    </script>

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
