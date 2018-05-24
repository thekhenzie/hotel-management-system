<?php
session_start();
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
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
VALUES (NULL,'" . $_SESSION['reservation_code'] . "', '0' , 0, '" . $_SESSION['checkin_db'] . "', '" . $_SESSION['checkout_db'] . "', '" . $_SESSION['special_requirement'] . "', 'Pending', '" . $_SESSION['total_amount'] . "', '" . $_SESSION['deposit'] . "', '" . $_SESSION['firstname'] . "', '" . $_SESSION['lastname'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['phone'] . "', '" . $_SESSION['addressline1'] . "', '" . $_SESSION['addressline2'] . "', '" . $_SESSION['city'] . "', '" . $_SESSION['state'] . "', '" . $_SESSION['postcode'] . "', '" . $_SESSION['country'] . "',1,0,0,0)");
echo mysql_error();
$_SESSION['booking_id'] = mysql_insert_id();
$count = 0;
foreach ($_SESSION['room_id'] as &$value0) {

    mysql_query("INSERT INTO `roombook` (`booking_id`, `room_id`, `totalroombook`, `id`) VALUES ('" . $_SESSION['booking_id'] . "', '" . $value0 . "', '" . $_SESSION['roomqty'][$count] . "', NULL);");
    $count = $count + 1;
}
$temp = 0;
foreach ($_SESSION['amenity_id'] as &$value0) {
    mysql_query("INSERT INTO `amenitybook` (`booking_id`, `amenity_id`, `totalamenitybook`, `id`,isCocoylandia) VALUES ('" . $_SESSION['booking_id'] . "', '" . $value0 . "',1, NULL,1);");
    $count = $temp + 1;
}
;

$query = "SELECT * FROM booking WHERE reservation_code = '".$_SESSION['reservation_code']."' AND isCocoylandia = 0";
$res = mysql_query($query);
if (mysql_num_rows($res) > 0) {
    while ($rows = mysql_fetch_array($res)) {
        $booking_id = $rows['booking_id'];
        $query2 = "SELECT * from roombook WHERE booking_id = $booking_id AND isCocoylandia =0";
        $res2 = mysql_query($query2);
        $booking = mysql_fetch_array($res2);
        $to = $_SESSION['email'];
        $subject = "Booking Details";
        $message = "<html><body>
            <table class='body-wrap'>
                <tr>
                    <td></td>
                    <td class='container' width='600'>
                        <div class='content'>
                            <table class='main' width='100%' cellpadding='0' cellspacing='0'>
                                <tr>
                                    <td class='content-wrap aligncenter'>
                                        <table width='100%' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td>
                                                <h1><img src='./img/logo1.jpg' class='highlight-im' style='height: 50px;'alt=''>  Montalban Waterpark and Garden Resorts</h1>
                                                </td>
                                            <tr/>
                                            <tr>
                                                <td class='content-block'>
                                                    <h2>
                                                    Please pay 3 days before your check in date
                                                    </h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class='content-block'>
                                                    <table class='invoice'>
                                                        <tr>
                                                            <td> 
                                                                <b>". $_SESSION['total_night']."</b> night stay(s) from
                                                                <b>". $_SESSION['checkin_date']."</b> to
                                                                <b>". $_SESSION['checkout_date']."</b>

                                                            
                                                               <br>No. of Guest/s :
                                                                <b> " . array_sum($_SESSION['guestqty']) . "</b> 
                                                                <br>
                                                                <br>
                                                                <b>Contact Detail</b>
                                                                <br>" .$_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ."
                                                                <br>" . $_SESSION['addressline1'] . ", " . $_SESSION['addressline2']
        . "
                                                                <br>" . $_SESSION['postcode'] . " " . $_SESSION['city'] . ",
                                                                <br>Phone
                                                                <b>" . $_SESSION['phone'] . "</b>
                                                                <br>Email
                                                                <b>" . $_SESSION['email'] . "</b>
                                                                <br>
                                                                <br>
                                                                <br>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table class='invoice-items' cellpadding='0' cellspacing='0'>
        ";
        
                                            
                                                $no = 1;
                                                for ($i = 0; $i < count($_SESSION['room_id']); $i++) {
        
                                                $message= '
                                                            <a>' . $_SESSION['roomname'][$i] . '</a>
        
                                                    <div class="reservation-room-seleted_package">
                                                        <ul>';
                                                for ($x = 1; $x <= $_SESSION['total_night']; $x++) {
                                                    $date = strtotime('+' . $x . ' day', strtotime($_SESSION['checkin_unformat']));
                                                    $message= '
                                                            <li>
                                                                <span>' . date("M d, Y", $date) . '  ' . $_SESSION['roomqty'][$i] . ' x ₱' . number_format(($_SESSION['ind_rate'][$i] - $_SESSION['ind_rate'][$i]*.12 ) / $_SESSION['roomqty'][$i]) . '</span>
                                                                <span><b>₱' . number_format(($_SESSION['ind_rate'][$i] - $_SESSION['ind_rate'][$i]*.12)) . '</b></span>
                                                            </li>';
                                                    }
        
                                                $message= '
                                                    </ul>
                                                    </div>
                                                    <tr>
                                                    <td style="width:200px;"> TOTAL Room ' . $no . '</td>
                                                    <td style="width:200px;"><b>₱' . number_format(($_SESSION['ind_rate'][$i] - $_SESSION['ind_rate'][$i]*.12 ) * $_SESSION['total_night']) . '.00</b></td>
                                                    </tr>
                                                    </div> ';
                                                    $no += 1;
                                                    }
                                            
        
                                            
                                                $no = 1;
                                                for ($i = 0; $i < count($_SESSION['amenity_id']); $i++) {
                                                $message= '
                                                    <div class="reservation-room-seleted_item">
                                                    <h6>Amenities</h6>
                                                    <div class="reservation-room-seleted_package">
                                                        <ul>';
                                                for ($x = 1; $x <= $_SESSION['total_night']; $x++) {
                                                    $date = strtotime('+' . $x . ' day', strtotime($_SESSION['checkin_unformat']));
                                                    $message= '
                                                            <li>
                                                                <span>'.$_SESSION['amenity_name'][$i].'   x ₱' . number_format(($_SESSION['amenity_rate'][$i] - $_SESSION['amenity_rate'][$i]*.12 )) . '</span>
                                                                <span>₱' . number_format(($_SESSION['amenity_rate'][$i] - $_SESSION['amenity_rate'][$i]*.12)) . '</span>
                                                            </li>';
                                                    }
        
                                                $message= '
                                                        </ul>
                                                    </div>
                                                    </div> ';
                                                    $no += 1;
                                                    }
                                            
        $message="
                                                <tr>
                                                    <td style='width:200px;'>Amenities</td>
                                                    <td style='width:200px;'><b>₱ ".number_format(($_SESSION['additional_amount'])-($_SESSION['additional_amount'] * .12), 0) .".00</b></td>
                                                </tr>
                                                <tr>
                                                    <td style='width:200px;'>Tax</td>
                                                    <td style='width:200px;'><b>₱ ". number_format((($_SESSION['total_amount']+$_SESSION['additional_amount']) * .12), 0) .".00</b></td>
                                                </tr>
                                                <!-- END / ITEM -->
        
                                                <!-- TOTAL -->
                                                <tr>
                                                    <td style='width:200px;'>TOTAL</td>
                                                    <td style='width:200px;'><b>₱ ". ($_SESSION['total_amount']+$_SESSION['additional_amount']) .".00</b></td>
                                                </tr>
         
                                                                </table>
        
                                                                <br/>
                            <br>Notes & Policy:</b>
        
                                                                    <br>
                                                                    <b>1. Please pay 20% deposit to confirmed your booking.</b><br>
                                                                    <br/>
                                                                    <b>2. Entrance Rates:</b><br/>
                                                                    Daytime(8am-5pm)<br/>
                                                                    Adult- 200.00<br/>
                                                                    Children (4ft below) 100.00<br/>
                                                                    <br/>
                                                                    Night(5pm-12mn)<br/>
                                                                    Adult- 220.00<br/>
                                                                    Children (4ft below) 100.00<br/>
                                                                    <br/>
                                                                    Overnight(6pm-6am)<br/>
                                                                    Adult- 250.00<br/>
                                                                    Children(4ft below) 100.00
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br><p><b>BANK DETAILS </b> <br/>
                                                <b>BANK:</b> Banco de Oro (BDO) <br/>
                                                <b>ACCOUNT NAME:</b> Montalban Waterpark and Garden Resort Inc. <br/>
                                                <b>ACCOUNT NUMBER: </b>2210309294</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class='footer'>
                            <table width='100%'>
                                <tr>
                                    <td><br>Questions? Call Us at (02) 654-15-26 or (63) 933-183-9100</td>
                                </tr>
                            </table>
                        </div></div>
                </td>
                <td></td>
            </tr>
        </table> </body>
        </html>";



        $headers = "From: admin@veneracions-hotel.net";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to, $subject, $message, $headers);
    }
}

header("location: confirmation-page.php");
