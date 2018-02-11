<?php
session_start();
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
if (isset($_POST["checkIn"]) && !empty($_POST["checkIn"]) && isset($_POST["checkOut"]) && !empty($_POST["checkOut"])) {
    $_SESSION['checkin_date'] = date('M d, Y', strtotime($_POST['checkIn']));
    $_SESSION['checkout_date'] = date('M d, Y', strtotime($_POST['checkOut']));
    $_SESSION['checkin_db'] = date('y-m-d', strtotime($_POST['checkIn']));
    $_SESSION['checkout_db'] = date('y-m-d', strtotime($_POST['checkOut']));
    $_SESSION['datetime1'] = new DateTime($_SESSION['checkin_db']);
    $_SESSION['datetime2'] = new DateTime($_SESSION['checkout_db']);
    $_SESSION['checkin_unformat'] = $_POST["checkIn"];
    $_SESSION['checkout_unformat'] = $_POST["checkOut"];
    $_SESSION['interval'] = $_SESSION['datetime1']->diff($_SESSION['datetime2']);

    $_SESSION['total_night'] = $_SESSION['interval']->format('%d');
    if ($_SESSION['total_night'] == 0) {
        $_SESSION['total_night'] = 1;
    }
} else {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Reservation Step</title>

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

        <!-- fancyBox files -->
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
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
    <!-- <div id="preloader">
        <span class="preloader-dot"></span>
    </div> -->
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    <div id="page-wrap">

        <!-- HEADER -->
         <header id="header" class="header-v2">


            <!-- HEADER LOGO & MENU -->
            <div class="header_content" id="header_content">

                <div class="container">

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
                        <h2>RESERVATION</h2>
                    </div>
                </div>

            </div>

        </section>
        <!-- END / SUB BANNER -->

        <!-- RESERVATION -->
        <section class="section-reservation-page bg-white">

            <div class="container">
                <div class="reservation-page">

                    <!-- STEP -->
                    <div class="reservation_step">
                        <ul>
                            <li><a href="sessiondestroy.php"><span>1.</span>  Choose Date</a></li>
                            <li class="active"><a href="#"><span>2.</span> Choose Room</a></li>
                            <li><a href="#"><span>3.</span> Make a Reservation</a></li>
                            <li><a href="#"><span>4.</span> Confirmation</a></li>
                        </ul>
                    </div>
                    <!-- END / STEP -->

                    <div class="row">

                        <!-- SIDEBAR -->
                        <div class="col-md-3">

                            <div class="reservation-sidebar">

                                <!-- SIDEBAR AVAILBBILITY -->
                                <div class="reservation-sidebar_availability bg-gray">

                                    <!-- HEADING -->
                                    <h2 class="reservation-heading">YOUR RESERVATION</h2>
                                    <!-- END / HEADING -->

                                    <h6 class="check_availability_title">your stay dates</h6>

                                    <div class="check_availability-field">
                                        <label>Arrive</label>
                                        <?php echo $_SESSION['checkin_date']; ?>
                                    </div>

                                    <div class="check_availability-field">
                                        <label>Depature</label>
                                        <?php echo $_SESSION['checkout_date']; ?>
                                    </div>

                                    <form action="sessiondestroy.php" method="post">
                                    <button class="awe-btn awe-btn-13" type='submit'>EDIT RESERVATION</button>
                                    </form>
                                </div>

                                <!-- END / SIDEBAR AVAILBBILITY -->
                            </div>

                        </div>
                        <!-- END / SIDEBAR -->

                        <!-- CONTENT -->
                        <div class="col-md-6">

                            <div class="reservation_content">

                                <!-- RESERVATION ROOM -->
                                <div class="reservation-room">


                                <?php
                                    include './dbconnect.php';
                                    // check available room
                                    $datestart = date('y-m-d', strtotime($_SESSION['checkin_unformat']));
                                    $dateend   = date('y-m-d', strtotime($_SESSION['checkout_unformat']));
                                    $result    = mysql_query("SELECT
                                            r.room_id,
                                            (r.total_room - br.total) AS availableroom,
                                            isCocoylandia
                                        FROM room AS r
                                        LEFT JOIN (SELECT
                                            roombook.room_id,
                                            SUM(roombook.totalroombook) AS total
                                        FROM roombook
                                        WHERE roombook.booking_id IN (SELECT
                                            b.booking_id AS bookingID
                                        FROM booking AS b
                                        WHERE isCocoylandia = 0 AND ((b.checkin_date BETWEEN '" . $datestart . "' AND '" . $dateend . "')
                                        OR (b.checkout_date BETWEEN '" . $dateend . "' AND '" . $datestart . "')))
                                        
                                        GROUP BY roombook.room_id) AS br
                                            ON r.room_id = br.room_id
                                        WHERE isCocoylandia = 0");
                                    echo mysql_error();
                                    if (mysql_num_rows($result) > 0) {
                                        echo '<p><b>Choose Your Room</b></p><hr class="line">';
                                        print '<form action="billing-details.php" method="post" id="choose-room"><div class="availability-form">';
                                        while ($row = mysql_fetch_array($result)) {
                                            if ($row['availableroom'] != null && $row['availableroom'] > 0) {
                                                $sub_result = mysql_query("SELECT room.* from room where room.room_id = " . $row['room_id'] . " ");
                                                if (mysql_num_rows($sub_result) > 0) {
                                                    while ($sub_row = mysql_fetch_array($sub_result)) {
                                                        echo '<div class="reservation-room_item">
                                                                <h2 class="reservation-room_name">
                                                                <a href="#">' . $sub_row['room_name'] . '</a>
                                                                </h2>
                                                                <div class="reservation-room_img">
                                                                    <a data-fancybox="gallery" href="' . $sub_row['imgpath'] . '"><img src="' . $sub_row['imgpath'] . '"></a>
                                                                </div>
                                                                <div class="reservation-room_text">
                                                                    <div class="reservation-room_desc">
                                                                        <p>' . $sub_row['descriptions'] . '</p>
                                                                    </div><p></p>
                                                                    <b><span class="reservation-room_amout">' . $row['availableroom'] . ' room available</span></b>
                                                                    <div class="clear"></div>
                                                                    <p class="reservation-room_price">
                                                                        <span class="reservation-room_amout">₱ ' . $sub_row['rate'] . '</span> / days
                                                                    </p>
                                                                    <br/><br/>
                                                            <span><b>No. of room: </b></span>
                                                            <select class="form-control" name="qtyroom' . $sub_row['room_id'] . '" id="room' . $sub_row['room_id'] . '" onChange="selection(' . $sub_row['room_id'] . ')"  style="width:100%; color:black;" ;">
                                                            <option  value="0">0</option>';
                                                        $i = 1;
                                                        while ($i <= $row['availableroom']) {
                                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                                            $i = $i + 1;
                                                        }
                                                        echo '</select><br/>
                                                                </div>
                                                                <input type=hidden name="selectedroom' . $sub_row['room_id'] . '"  id="selectedroom' . $sub_row['room_id'] . '" value="' . $sub_row['room_id'] . '">
                                                                <input type=hidden name="room_name' . $sub_row['room_id'] . '" id="room_name' . $sub_row['room_id'] . '" value="' . $sub_row['room_name'] . '">
                                                                </div><hr/>';
                                                    }
                                                }
                                            } 
                                            else if ($row['availableroom'] == null) {
                                                $sub_result2 = mysql_query("SELECT room.* from room where room.room_id = " . $row['room_id'] . " ");
                                                if (mysql_num_rows($sub_result2) > 0) {
                                                    while ($sub_row2 = mysql_fetch_array($sub_result2)) {
                                                        echo '<div class="reservation-room_item">
                                                        <h2 class="reservation-room_name">
                                                        <a href="#">' . $sub_row2['room_name'] . '</a>
                                                        </h2>
                                                        <div class="reservation-room_img">
                                                            <a data-fancybox="gallery" href="' . $sub_row2['imgpath'] . '"><img src="' . $sub_row2['imgpath'] . '"></a>
                                                        </div>
                                                        <div class="reservation-room_text">
                                                            <div class="reservation-room_desc">
                                                                <p>' . $sub_row2['descriptions'] . '</p>
                                                            </div><p></p>
                                                            <b><span class="reservation-room_amout">' . $sub_row2['total_room'] . ' room available</span></b>
                                                            <div class="clear"></div>
                                                            <p class="reservation-room_price">
                                                                <span class="reservation-room_amout">₱ ' . $sub_row2['rate'] . '</span> / days
                                                            </p>
                                                            <br/><br/>
                                                            <span><b>No. of room: </b></span>
                                                            <select class="form-control" name="qtyroom' . $sub_row2['room_id'] . '" id="room' . $sub_row2['room_id'] . '" onChange="selection(' . $sub_row['room_id'] . ')"  style="width:100%; color:black;" ;">
                                                            <option  value="0">0</option>';
                                                        $i = 1;
                                                        while ($i <= $sub_row2['total_room']) {
                                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                                            $i = $i + 1;
                                                        }
                                                        echo '</select><br/>
                                                        </div>
                                                        <input type=hidden name="selectedroom' . $sub_row2['room_id'] . '"  id="selectedroom' . $sub_row2['room_id'] . '" value="' . $sub_row2['room_id'] . '">
                                                        <input type=hidden name="room_name' . $sub_row2['room_id'] . '" id="room_name' . $sub_row2['room_id'] . '" value="' . $sub_row2['room_name'] . '">
                                                        </div> <hr/>';
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        echo '<p><b>No room available</b></p><hr>';
                                    }
                                    print '</form></div>';

                                ?>

                                </div>
                                <!-- END / RESERVATION ROOM -->

                            </div>

                        </div>
                        <!-- END / CONTENT -->
                        <div class="col-md-3">
                                    <div class="reservation-sidebar_availability bg-gray" id="roomselected" style="display:none;">
                                    <!-- <label for="submit-form" class="awe-btn awe-btn-13" onClick="submitForm()">Proceed To Book
                                    </label> -->
                                    <button name="submit" class="awe-btn awe-btn-13">BOOK NOW</button>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- END / RESERVATION -->

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
    function selection(id) {
        debugger;
        if(this.value!=0){
            var e = document.getElementById('roomselected').style.display='block';
        }
        else
            var e = document.getElementById('roomselected').style.display='hidden';
    }
    function submitForm() {
        var x= document.getElementById("chooseroom");
        x.submit();
    }
    </script>

    <!-- LOAD JQUERY -->

    <!-- <script type="text/javascript" src="js/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery-ui.min.js"></script> -->
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