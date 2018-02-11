<?php
session_start();
include './dbconnect.php';
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}

$id = $_GET['id'];

$query = "SELECT * FROM booking WHERE reservation_code = '$id'";
$res = mysql_query($query);
if (mysql_num_rows($res) > 0) {
    while ($rows = mysql_fetch_array($res)) {
        $booking_id = $rows['booking_id'];
        $query2 = "SELECT * from roombook WHERE booking_id = $booking_id";
        $res2 = mysql_query($query2);
        $booking = mysql_fetch_array($res2);
        $to = $rows['email'];

        $subject = "Booking Details";
        $message = "<html><body>";

        $message .= "<table class=\"body-wrap\">\n";

        $message .= "	<tr>\n";
        $message .= "		<td></td>\n";
        $message .= "		<td class=\"container\" width=\"600\">\n";
        $message .= "			<div class=\"content\">\n";
        $message .= "				<table class=\"main\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
        $message .= "					<tr>\n";
        $message .= "						<td class=\"content-wrap aligncenter\">\n";
        $message .= "							<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">\n";
        $message .= "								<tr>\n";
        $message .= "									<td class=\"content-block\">\n";
        $message .= "										<h1>Room Booked!</h1>\n";
        $message .= "									</td>\n";
        $message .= "								</tr>\n";
        $message .= "								<tr>\n";
        $message .= "									<td class=\"content-block\">\n";
        $message .= "										<h2>Thanks for giving us opportunity to serve you.</h2>\n";
        $message .= "									</td>\n";
        $message .= "								</tr>\n";
        $message .= "								<tr>\n";
        $message .= "									<td class=\"content-block\">\n";
        $message .= "										<table class=\"invoice\">\n";
        $message .= "											<tr>\n";
        $message .= "												<td>Dear " . $rows['first_name'] . " " . $rows['last_name'] . "<br><br><b>Booking ID #" . ($rows['booking_id'] + 1) . "</b>";
        $message .= "                                               <br/> From <b>" . $rows['checkin_date'] . "</b> to <b>" . $rows['checkout_date'] . "</b><br><b>Contact Detail</b><br>" . $rows['addressline1'] . ", " . $rows['addressline2'] . "<br>" . $rows['postcode'] . " " . $rows['city'] . ", <br>" . $rows['state'] . ", " . $rows['country'] . "<br>Phone <b>" . $rows['phone'] . "</b><br>Email <b>" . $rows['email'] . "</b><br><br><br></td>\n";
        $message .= "											</tr>\n";
        $message .= "											<tr>\n";
        $message .= "												<td>\n";
        $message .= "													<table class=\"invoice-items\" cellpadding=\"0\" cellspacing=\"0\">\n";
        $message .= "														<tr>\n";
        $message .= "															<td style=\"width:200px;\">Total</td>\n";
        $message .= "															<td  style=\"width:200px;\"> <b>PHP" . number_format($rows['total_amount'], 2) . "</b></td>\n";
        $message .= "														</tr>\n";
        $message .= "														<tr>\n";
        $message .= "															<td style=\"width:200px;\">20% Deposit Due</td>\n";
        $message .= "															<td  style=\"width:200px;\"><b>PHP" . number_format($rows['deposit'], 2) . "</b></td>\n";
        $message .= "														</tr>\n";
        $message .= "														\n";
        $message .= "													</table>\n";

        $message .= "					<br/><b>Reservation Code: </b>" . $rows['reservation_code'] . "<br/>\n";
        $message .= "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' name='form'>\n";
        $message .= "    <input type='hidden' name='business' value='montalban.waterpark@gmail.com'>\n";
        $message .= "    <input type='hidden' name='cmd' value='_xclick'> \n";
        $message .= "    <input type='hidden' name='item_name' value='20% Hotel Deposit Payment for Booking ID #" . ($rows['booking_id'] + 1) . "'>\n";
        $message .= "    <input type='hidden' name='amount' value='" . $rows['deposit'] . "'>\n";
        $message .= "    <input type='hidden' name='no_shipping' value='1'>\n";
        $message .= "    <input type='hidden' name='currency_code' value='PHP'>\n";
        $message .= "    <input type='hidden' name='cancel_return' value='http://nacancel.com'>\n";
        $message .= "    <input type='hidden' name='return' value='http://facebook.com/'>\n";
        $message .= "    <img type=\"image\" src=\"img/paypal.jpg\" style=\"background-color:white; width:32%; height:14%; padding:2px; \" ></img>\n";
        $message .= "	<br><button class=\"awe-btn awe-btn-6\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\" style=\"width:32%\">Pay Room Deposit Now</button>\n";
        $message .= "	<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">\n";
        $message .= "</form>\n";
        $message .= "					<br>Notes & Policy:</b>\n";

        $message .= "															<br>\n";
        $message .= "															<b>1. Please pay 20% deposit to confirm your booking.</b><br>\n";
        $message .= "															2. This hotel are not allowed etc etc<br>\n";
        $message .= "															3. Please check in before bla bla<br>\n";
        $message .= "															4. The hotel management has right to cancel the booking\n";
        $message .= "															<br>\n";
        $message .= "															\n";
        $message .= "												</td>\n";
        $message .= "											</tr>\n";
        $message .= "										</table>\n";
        $message .= "									</td>\n";
        $message .= "								</tr>\n";
        $message .= "								<tr>\n";
        $message .= "								</tr>\n";
        $message .= "								<tr>\n";
        $message .= "									<td>\n";
        $message .= "										<br><br>Montalban Waterpark and Garden Resort Inc. 2210309294\n";
        $message .= "									</td>\n";
        $message .= "								</tr>\n";
        $message .= "							</table>\n";
        $message .= "						</td>\n";
        $message .= "					</tr>\n";
        $message .= "				</table>\n";
        $message .= "				<div class=\"footer\">\n";
        $message .= "					<table width=\"100%\">\n";
        $message .= "						<tr>\n";
        $message .= "							<td><br>Questions? Email <a href=\"mailto:\">montalbanwaterpark@yopmail.com or Call Us at 0000000</a></td>\n";
        $message .= "						</tr>\n";
        $message .= "					</table>\n";
        $message .= "				</div></div>\n";
        $message .= "		</td>\n";
        $message .= "		<td></td>\n";
        $message .= "	</tr>\n";
        $message .= "</table>";

        $message .= "</body></html>";
        $headers = "From: admin@veneracions-hotel.net";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to, $subject, $message, $headers);
    }
}
echo '

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Detail verified</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/favicon.png" />

    <!-- GOOGLE FONT -->
    <link href="http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700" rel="stylesheet" type="text/css">

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

        <section class="section-404 bg-5">
            <div class="awe-overlay"></div>
            <div class="page-404 text-center">
                <h1>SUC<span>CESS</span>
                </h1>
                <h6>Your reservation has <span>been verified!</span></h6>
                <a href="index.php"><p>Return to home.</p></a>
            </div>

        </section>
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
';
