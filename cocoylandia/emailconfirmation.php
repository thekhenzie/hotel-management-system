<?php
session_start();

$_SESSION['firstname'] = $_POST["firstname"];
$_SESSION['lastname'] = $_POST["lastname"];
$_SESSION['email'] = $_POST["email"];
$_SESSION['phone'] = $_POST["phone"];
$_SESSION['addressline1'] = $_POST["addressline1"];

$_SESSION['postcode'] = $_POST["postcode"];
$_SESSION['city'] = $_POST["city"];
$_SESSION['state'] = 'PH';
$_SESSION['country'] = 'Philippines';

if (isset($_POST["addressline2"])) {
    $_SESSION['addressline2'] = $_POST["addressline2"];
} else {

    $_SESSION['addressline2'] = "";
}
if (isset($_POST["specialrequirements"])) {
    $_SESSION['special_requirement'] = $_POST["specialrequirements"];
} else {

    $_SESSION['special_requirement'] = "";
}

function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

// echo generateRandomString(24); // OR: generateRandomString(24)
$_SESSION['reservation_code'] = generateRandomString(8);
include './dbconnect.php';
mysql_query("INSERT INTO booking (booking_id, reservation_code, total_adult, total_children, checkin_date, checkout_date, special_requirement, payment_status, total_amount, deposit, first_name, last_name, email, telephone_no, add_line1, add_line2, city, state, postcode, country,isReserved,isActive,isModified,isCancelled,isCocoylandia)
VALUES (NULL,'" . $_SESSION['reservation_code'] . "', '0' , 0, '" . $_SESSION['checkin_db'] . "', '" . $_SESSION['checkout_db'] . "', '" . $_SESSION['special_requirement'] . "', 'Pending', '" . $_SESSION['total_amount'] . "', '" . $_SESSION['deposit'] . "', '" . $_SESSION['firstname'] . "', '" . $_SESSION['lastname'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['phone'] . "', '" . $_SESSION['addressline1'] . "', '" . $_SESSION['addressline2'] . "', '" . $_SESSION['city'] . "', '" . $_SESSION['state'] . "', '" . $_SESSION['postcode'] . "', '" . $_SESSION['country'] . "',1,0,0,0,1)");
echo mysql_error();
$_SESSION['booking_id'] = mysql_insert_id();
$count = 0;
foreach ($_SESSION['room_id'] as &$value0) {

    mysql_query("INSERT INTO `roombook` (`booking_id`, `room_id`, `totalroombook`, `id`,isCocoylandia) VALUES ('" . $_SESSION['booking_id'] . "', '" . $value0 . "', '" . $_SESSION['roomqty'][$count] . "', NULL,1);");
    $count = $count + 1;
}
;

$query = "SELECT * FROM booking WHERE reservation_code = '".$_SESSION['reservation_code']."' AND isCocoylandia = 1";
$res = mysql_query($query);
if (mysql_num_rows($res) > 0) {
    while ($rows = mysql_fetch_array($res)) {
        $booking_id = $rows['booking_id'];
        $query2 = "SELECT * from roombook WHERE booking_id = $booking_id AND isCocoylandia = 1";
        $res2 = mysql_query($query2);
        $booking = mysql_fetch_array($res2);
        $to = $_SESSION['email'];
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
        $message .= "                                               <br/> From <b>" . $rows['checkin_date'] . "</b> to <b>" . $rows['checkout_date'] . "</b><br><b>Contact Detail</b><br>" . $rows['addressline1'] . ", " . $rows['addressline2'] . "<br>" . $rows['postcode'] . " " . $rows['city'] . ", <br><br>Phone <b>" . $rows['phone'] . "</b><br>Email <b>" . $rows['email'] . "</b><br><br><br></td>\n";
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

        $message .= "					<br/><h3><b>Reservation Code: </b>" . $rows['reservation_code'] . "</h3><br/>\n";
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
        $message .= "															2. Firearm and deadly weapons are strictly not allowed.<br>\n";
        $message .= "															3. All children must be under adult supervision at all times.<br>\n";
        $message .= "															4. The Management shall not be held responsible for the injury or incident of our guests; nor for the loss of valuables and belongings.<br>\n";
        $message .= "															5. All damages to our properties will be charged accordingly.<br>\n";
        $message .= "															6. The Management reserves the right to refuse any guest.<br>\n";
        $message .= "															 7. Always wear proper swimming attire. Maong short and colored T-shirts are not allowed.<br>\n";
        $message .= "															7. Everyone is required to take a shower before swimming.<br>\n";
        $message .= "															8. Strictly NO Bottled drinks are allowed. Corkage fee applied.<br>\n";
        $message .= "															9. NO littering. Please keep your tables & cottages tidy and clean.<br>\n";
        $message .= "															10.Rough playing & other misbehaviors that could result to injuries or annoyance are strictly prohibited.<br>\n";
        $message .= "															11.Strictly NO eating, drinking & smoking in pool area.<br>\n";
        $message .= "															12.Vandalism is a crime punishable by law.<br>\n";
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
        $message .= "										<br><p><b>BANK DETAILS</b> <br/><b>ACCOUNT NAME:</b> Montalban Waterpark and Garden Resort Inc.<br/><b>ACCOUNT NUMBER: </b>2210309294</p>\n";
        $message .= "									</td>\n";
        $message .= "								</tr>\n";
        $message .= "							</table>\n";
        $message .= "						</td>\n";
        $message .= "					</tr>\n";
        $message .= "				</table>\n";
        $message .= "				<div class=\"footer\">\n";
        $message .= "					<table width=\"100%\">\n";
        $message .= "						<tr>\n";
        $message .= "							<td><br>Questions? Call Us at (02) 654-15-26 or (63) 933-183-9100</td>\n";
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

header("location: confirmation-page.php");
