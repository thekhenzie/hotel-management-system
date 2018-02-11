<?php
session_start();
if (!isset($_SESSION['checkin_date'])) {
    header('Location: index.php');
}
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
                                <li>
                                    <a href="sessiondestroy.php">
                                        <span>1.</span> Choose Date</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>2.</span> Choose Room</a>
                                </li>
                                <li >
                                    <a href="#">
                                        <span>3.</span> Make a Reservation</a>
                                </li>
                                <li class="active">
                                    <a href="#">
                                        <span>4.</span> Confirmation</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END / STEP -->

                        <div class="row">

                            <!-- SIDEBAR -->
                            <div class="col-md-4 col-lg-3">

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
                                                    <span>Service</span>
                                                    <span>Free</span>
                                                </li>
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

                            </div>
                            <!-- END / SIDEBAR -->

                            <!-- CONTENT -->
                            <div class="col-md-8 col-lg-9">

                            <div class="reservation_content">

                                <div class="reservation-chosen-message bg-gray text-center">
                                    <h4>Reservation Complete</h4>
                                    <p>Details of your reservation have just been sent to you
                                    in a confirmation email. Please check your spam folder if you didn't received any email. We look forward to see you soon. In the
                                    meantime, if you have any questions, feel free to contact us.</p>
                                    <!-- <a href="#" class="awe-btn awe-btn-6">GO NEXT STEP</a> -->
        <hr>
		<div class="row">
			<div class="large-12 columns" >


<!-- PAYPAL
<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' name='form'>
    <input type='hidden' name='business' value='montalban.waterpark@gmail.com'>
    <input type='hidden' name='cmd' value='_xclick'>
    <input type='hidden' name='item_name' value='15% Hotel Deposit Payment for Booking ID #<?php echo $_SESSION['booking_id']; ?>'>
    <input type='hidden' name='amount' value='<?php echo $_SESSION['deposit']; ?>'>
    <input type='hidden' name='no_shipping' value='1'>
    <input type='hidden' name='currency_code' value='PHP'>
    <input type='hidden' name='cancel_return' value='http://127.0.0.1/veneracions-resort/paypal-cancel.html'>
    <input type='hidden' name='return' value='http://127.0.0.1/veneracions-resort/paypal-success.php'>
    <input type="hidden" name="notify_url" value="http://127.0.0.1/veneracions-resort/paypal-success.php">
    <img type="image" src="img/paypal.jpg" style="background-color:white; width:32%; height:14%; padding:2px; " ></img>
	<br><button class="awe-btn awe-btn-6" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" style="width:32%">Pay Room Deposit Now</button>
	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> -->
<br/>
<a class='pull-right' href='printpage.php' target="_blank">Click here to print</a><br/>


			</div>
		</div>
                                </div>

                            </div>

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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="build/js/intlTelInput.js"></script>
        <script>
            $("#phone").intlTelInput({
                //autoFormat: false,
                //autoHideDialCode: false,
                defaultCountry: "my",
                //nationalMode: true,
                //numberType: "MOBILE",
                //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                preferredCountries: ['my', 'us'],
                //responsiveDropdown: true,
                utilsScript: "lib/libphonenumber/build/utils.js"
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