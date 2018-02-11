<?php
session_start();
include './dbconnect.php';
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
console_log($_POST);
if (!isset($_SESSION['room_id'])) {
    $_SESSION['room_id'] = array();
    $_SESSION['roomname'] = array();
    $_SESSION['roomqty'] = array();
    $_SESSION['guestqty'] = array();
    $_SESSION['ind_rate'] = array();
    $_SESSION['total_amount'] = 0;
    $_SESSION['deposit'] = 0;
}

$result = mysql_query("SELECT * from room AND isCocoylandia=0");
if (mysql_num_rows($result) > 0) {
    $count = 0;
    while ($row = mysql_fetch_array($result)) {
        if (isset($_POST["qtyroom" . $row['room_id'] . ""]) && !empty($_POST["qtyroom" . $row['room_id'] . ""])) {
            // if (isset($_POST["qtyguest" . $row['room_id'] . ""]) && !empty($_POST["qtyguest" . $row['room_id'] . ""])) {
            $_SESSION['room_id'][$count] = $_POST["selectedroom" . $row['room_id'] . ""];
            $_SESSION['roomqty'][$count] = $_POST["qtyroom" . $row['room_id'] . ""];
            $_SESSION['guestqty'][$count] = 1;
            $_SESSION['roomname'][$count] = $_POST["room_name" . $row['room_id'] . ""];
            $_SESSION['ind_rate'][$count] = $row['rate'] * $_POST["qtyroom" . $row['room_id'] . ""];
            $_SESSION['total_amount'] = ($row['rate'] * $_POST["qtyroom" . $row['room_id'] . ""] * $_SESSION['total_night']) + $_SESSION['total_amount'];
            $_SESSION['deposit'] = $_SESSION['total_amount'] * 0.20;
            $count = $count + 1;
            // }
        }
    }

}
console_log($_SESSION);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <!-- TITLE -->
        <title>Reservation Step 5</title>

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

        <!-- MAIN STYLE -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    </head>


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
                                <li>
                                    <a href="sessiondestroy.php">
                                        <span>1.</span> Choose Date</a>
                                </li>
                                <li>
                                    <a href="unsetroomchosen.php">
                                        <span>2.</span> Choose Room</a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                        <span>3.</span> Make a Reservation</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>4.</span> Confirmation</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END / STEP -->

                        <div class="row">

                            <!-- SIDEBAR -->
                            <div class="col-md-3">

                                <div class="reservation-sidebar">

                                    <!-- RESERVATION DATE -->
                                    <div class="reservation-date bg-gray">

                                        <!-- HEADING -->
                                        <h2 class="reservation-heading">Dates</h2>
                                        <!-- END / HEADING -->

                                        <ul>
                                            <li>
                                                <span>Check-In</span>
                                                <span>
                                                    <?php echo $_SESSION['checkin_date']; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Check-Out</span>
                                                <span>
                                                    <?php echo $_SESSION['checkout_date']; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Total Nights</span>
                                                <span>
                                                    <?php echo $_SESSION['total_night']; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Total Rooms</span>
                                                <span>
                                                    <?php echo array_sum($_SESSION['roomqty']); ?> of
                                                    <?php echo array_sum($_SESSION['roomqty']); ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Total Guests</span>
                                                <span>
                                                    <?php echo array_sum($_SESSION['guestqty']); ?>
                                                </span>
                                            </li>
                                        </ul>

                                    </div>
                                    <!-- END / RESERVATION DATE -->
                                </div>

                            </div>
                            <!-- END / SIDEBAR -->

                            <!-- CONTENT -->
                            <div class="col-md-6">

                                <div class="reservation_content">

                                    <div class="reservation-billing-detail">

                                        <!-- <p class="reservation-login">Returning customer?
                                        <a href="#">Click here to login</a>
                                    </p> -->
                                        <form action='emailconfirmation.php' method='post' onSubmit='return validateForm(this);'>
                                            <h4>BILLING DETAILS</h4>

                                            <!-- <label>Country
                                                <sup>*</sup>
                                            </label>
                                            <select class="awe-select hidden" name="country" id="country">
                                                <option>Philippines</option>
                                                <option>United States</option>
                                            </select> -->

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name
                                                        <sup>*</sup>
                                                    </label>
                                                    <input required class="input-text" name="firstname" pattern="[A-Za-z]{3,}" type="text" value="<?php if (isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])) {echo $_SESSION['firstname'];}?>"
                                                        pattern="[a-zA-Z\s]+" Title="Only alphabet characters are allowed" placeholder="e.g. Juan"
                                                    />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Last Name
                                                        <sup>*</sup>
                                                    </label>
                                                    <input required class="input-text" name="lastname" pattern="[A-Za-z]{3,}" type="text" value="<?php if (isset($_SESSION['lastname']) && !empty($_SESSION['lastname'])) {echo $_SESSION['lastname'];}?>"
                                                        pattern="[a-zA-Z\s]+" Title="Only alphabet characters allowed" placeholder="e.g. Dela Cruz"
                                                    />
                                                </div>
                                            </div>

                                            <label>Address Line 1
                                                <sup>*</sup>
                                            </label>
                                            <input required class="input-text" name="addressline1" type="text" value="<?php if (isset($_SESSION['addressline1']) && !empty($_SESSION['addressline1'])) {echo $_SESSION['addressline1'];}?>"
                                                placeholder="" />
                                            <label>Address Line 2
                                            </label>
                                            <input class="input-text" name="addressline2" type="text" value="<?php if (isset($_SESSION['addressline2']) && !empty($_SESSION['addressline2'])) {echo $_SESSION['addressline2'];}?>"
                                                placeholder="" / />

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Town / City
                                                        <sup>*</sup>
                                                    </label>
                                                    <input required class="input-text" name="city" type="text" value="<?php if (isset($_SESSION['city']) && !empty($_SESSION['city'])) {echo $_SESSION['city'];}?>"
                                                        pattern="[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed"
                                                        placeholder="" / />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Zip/Postcode
                                                        <sup>*</sup>
                                                    </label>
                                                    <input required class="input-text" name="postcode" id="postcode" type="number" pattern="[0-9]{4}" value="<?php if (isset($_SESSION['postcode']) && !empty($_SESSION['postcode'])) {echo $_SESSION['postcode'];}?>"
                                                        placeholder="e.g. 1600" / />
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Email Address
                                                        <sup>*</sup>
                                                    </label>
                                                    <input required class="input-text" name="email" type="email" value="<?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {echo $_SESSION['email'];}?>"
                                                        placeholder="" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Phone
                                                        <sup>*</sup>
                                                    </label>
                                                    <input required class="input-text" name="phone" id="phone" type="number" value="<?php if (isset($_SESSION['phone']) && !empty($_SESSION['phone'])) {echo $_SESSION['phone'];}?>"
                                                        pattern="[a-zA-Z0-9\s]+" Title="Special characters such as ( ) * & ^ % $ & etc are not allowed"
                                                        placeholder="" / />
                                                </div>
                                            </div>
                                            <button class="awe-btn awe-btn-13" type="submit">PLACE ORDER</button>
                                        </form>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3">
                                <!-- ROOM SELECT -->
                                <div class="reservation-room-selected bg-gray">

                                    <!-- HEADING -->
                                    <h2 class="reservation-heading">Selected Rooms</h2>
                                    <!-- END / HEADING -->

                                    <!-- ITEM -->
                                    <?php
$no = 1;
for ($i = 0; $i < count($_SESSION['room_id']); $i++) {

    echo '
                                            <div class="reservation-room-seleted_item">

                                            <h6>ROOM ' . $no . '</h6>
                                            <span class="reservation-option">' . $_SESSION['guestqty'][$i] . ' Guest</span>&nbsp;
                                            <span class="reservation-option">' . $_SESSION['roomqty'][$i] . ' Room</span>&nbsp;
                                            <span class="reservation-option">' . ($_SESSION['ind_rate'][$i] / $_SESSION['roomqty'][$i]) . '/day</span>
                                            <div class="reservation-room-seleted_name has-package">
                                                <h2>
                                                    <a>' . $_SESSION['roomname'][$i] . '</a>
                                                </h2>
                                            </div>

                                            <div class="reservation-room-seleted_package">
                                                <h6>RATE</h6>
                                                <ul>';
    for ($x = 1; $x <= $_SESSION['total_night']; $x++) {
        $date = strtotime('+' . $x . ' day', strtotime($_SESSION['checkin_unformat']));
        echo '
                                                    <li>
                                                        <span>' . date("M d, Y", $date) . '  ' . $_SESSION['roomqty'][$i] . ' x ₱' . ($_SESSION['ind_rate'][$i] / $_SESSION['roomqty'][$i]) . '</span>
                                                        <span>₱' . $_SESSION['ind_rate'][$i] . '.00</span>
                                                    </li>';
    }

    echo '
                                                </ul>

                                                <ul>
                                                    <li>
                                                        <span>Tax</span>
                                                        <span>₱ ' . number_format(($_SESSION['total_amount'] * .12), 2) . '</span>
                                                    </li>
                                                </ul>

                                            </div>

                                            <div class="reservation-room-seleted_total-room">
                                                TOTAL Room ' . $no . '
                                                <span class="reservation-amout">₱' . $_SESSION['ind_rate'][$i] * $_SESSION['total_night'] . '.00</span>
                                            </div>

                                            </div> ';
    $no += 1;
}
?>
                                        <!-- END / ITEM -->

                                        <!-- TOTAL -->
                                        <div class="reservation-room-seleted_total bg-blue">
                                            <label>TOTAL</label>
                                            <span class="reservation-total">₱
                                                <?php echo $_SESSION['total_amount']; ?>.00</span>
                                        </div>
                                        <!-- END / TOTAL -->

                                </div>
                                <!-- END / ROOM SELECT -->
                            </div>
                            <!-- END / CONTENT -->

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
            function validateForm(form) {
                var fname = form.firstname.value;
                var lname = form.lastname.value;
                var email = form.email.value;
                var phone = form.phone.value;
                var add1 = form.addressline1.value;
                var postcode = form.postcode.value;
                var city = form.city.value;
                var state = form.state.value;
                var country = form.country.value;
                if (fname == null || lname == null || email == null || phone == null || add1 == null || postcode == null || city == null || state == null || country == null || fname == "" || lname == "" || email == "" || phone == "" || add1 == "" || postcode == "" || city == "" || state == "" || country == "") {
                    alert("Please fill in all the fields mark with *.");

                    return false;
                }

            }
        </script>
                <script>
            $(function() {
                $('#postcode').keyup( function(e){
                if ($(this).val().length >= 4) { 
                    $(this).val($(this).val().substr(0, 4));
                }
                });
                $('#phone').keyup( function(e){
                    if ($(this).val().length >= 11) { 
                        $(this).val($(this).val().substr(0, 11));
                    }
                });
                $("#postcode").keypress(function(event) {
                    if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
                        return false;
                    }
                });
            });
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