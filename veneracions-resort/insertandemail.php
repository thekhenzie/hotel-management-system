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
$_SESSION['country'] = $_POST["country"];

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
mysql_query("INSERT INTO booking (booking_id, reservation_code, total_adult, total_children, checkin_date, checkout_date, special_requirement, payment_status, total_amount, deposit, first_name, last_name, email, telephone_no, add_line1, add_line2, city, state, postcode, country,isReserved,isActive,isModified,isCancelled)
VALUES (NULL,'" . $_SESSION['reservation_code'] . "', '0' , 0, '" . $_SESSION['checkin_db'] . "', '" . $_SESSION['checkout_db'] . "', '" . $_SESSION['special_requirement'] . "', 'Pending', '" . $_SESSION['total_amount'] . "', '" . $_SESSION['deposit'] . "', '" . $_SESSION['firstname'] . "', '" . $_SESSION['lastname'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['phone'] . "', '" . $_SESSION['addressline1'] . "', '" . $_SESSION['addressline2'] . "', '" . $_SESSION['city'] . "', '" . $_SESSION['state'] . "', '" . $_SESSION['postcode'] . "', '" . $_SESSION['country'] . "',0,0,0,0)");
echo mysql_error();
$_SESSION['booking_id'] = mysql_insert_id();
$count = 0;
foreach ($_SESSION['room_id'] as &$value0) {

    mysql_query("INSERT INTO `roombook` (`booking_id`, `room_id`, `totalroombook`, `id`) VALUES ('" . $_SESSION['booking_id'] . "', '" . $value0 . "', '" . $_SESSION['roomqty'][$count] . "', NULL);");
    $count = $count + 1;
}
;

$to = $_SESSION['email'];
$subject = "Booking Confirmation";
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
$message .= "												<td>Dear " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . "<br><br><b>Booking ID #" . $_SESSION['booking_id'] . "</b><br><b>" . $_SESSION['total_night'] . "</b> night stay(s) from <b>" . $_SESSION['checkin_date'] . "</b> to <b>" . $_SESSION['checkout_date'] . "</b><br>No. of Guest :<b> " . array_sum($_SESSION['guestqty']) . "</b><br><br><b>Contact Detail</b><br>" . $_SESSION['addressline1'] . ", " . $_SESSION['addressline2'] . "<br>" . $_SESSION['postcode'] . " " . $_SESSION['city'] . ", <br>" . $_SESSION['state'] . ", " . $_SESSION['country'] . "<br>Phone <b>" . $_SESSION['phone'] . "</b><br>Email <b>" . $_SESSION['email'] . "</b><br><br><br></td>\n";
$message .= "											</tr>\n";
$message .= "											<tr>\n";
$message .= "												<td>\n";
$message .= "													<table class=\"invoice-items\" cellpadding=\"0\" cellspacing=\"0\">\n";

$count = 0;
foreach ($_SESSION['room_id'] as &$value0) {
    $message .= "														<tr>\n";
    $message .= "															<td style=\"width:200px;\"><b>" . $_SESSION['roomqty'][$count] . " " . $_SESSION['roomname'][$count] . "</b></td>\n";
    $message .= "															<td  style=\"width:200px;\"> <b>PHP " . number_format($_SESSION['ind_rate'][$count], 2) . "</b></td>\n";
    $message .= "														</tr>\n";
    $count = $count + 1;
}
;

$message .= "														<tr>\n";
$message .= "															<td style=\"width:200px;\">Total</td>\n";
$message .= "															<td  style=\"width:200px;\"> <b>PHP" . number_format($_SESSION['total_amount'], 2) . "</b></td>\n";
$message .= "														</tr>\n";
$message .= "														<tr>\n";
$message .= "															<td style=\"width:200px;\">15% Deposit Due</td>\n";
$message .= "															<td  style=\"width:200px;\"><b>PHP" . number_format($_SESSION['deposit'], 2) . "</b></td>\n";
$message .= "														</tr>\n";
$message .= "														\n";
$message .= "													</table>\n";

$message .= "					<br/><b>Reservation Code: </b>" . $_SESSION['reservation_code'] . "<br/>\n";
$message .= "					<br/><a href='http://127.0.0.1/veneracions-resort/reserve.php?id=" . $_SESSION['reservation_code'] . "'>Click here to verify your reservation</a>'\n";
$message .= "<form action='https://www.paypal.com/cgi-bin/webscr' method='post' name='form'>\n";
$message .= "    <input type='hidden' name='business' value='montalban.waterpark@gmail.com'>\n";
$message .= "    <input type='hidden' name='cmd' value='_xclick'> \n";
$message .= "    <input type='hidden' name='item_name' value='15% Hotel Deposit Payment for Booking ID #" . $_SESSION['booking_id'] . "'>\n";
$message .= "    <input type='hidden' name='amount' value='" . $_SESSION['deposit'] . "'>\n";
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
$message .= "															<b>1. Please pay 15% deposit to confirm your booking.</b><br>\n";
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
$message .= "										<br><br>Montalbans Waterpark resort address here\n";
$message .= "									</td>\n";
$message .= "								</tr>\n";
$message .= "							</table>\n";
$message .= "						</td>\n";
$message .= "					</tr>\n";
$message .= "				</table>\n";
$message .= "				<div class=\"footer\">\n";
$message .= "					<table width=\"100%\">\n";
$message .= "						<tr>\n";
$message .= "							<td><br>Questions? Email <a href=\"mailto:\">hello@yopmail.com or Call Us at 0000000</a></td>\n";
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

header("location: confirmation-page.php");
