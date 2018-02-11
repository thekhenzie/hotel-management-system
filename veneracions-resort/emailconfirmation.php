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
$message = "<a href='http://127.0.0.1/veneracions-resort/reserve.php?id=" . $_SESSION['reservation_code'] . "'>Click here to verify your reservation</a>";
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
