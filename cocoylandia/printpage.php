<?php
session_start();
?>
<html>
<body>
    <table class="body-wrap">
        <tr>
            <td></td>
            <td class="container" width="600">
                <div class="content">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td class="content-wrap aligncenter">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                        <h1><img src="./img/logo2.jpg" class="highlight-img"  style="height: 50px;"alt="">  Cocoylandia Family Resort</h1>
                                        </td>
                                    <tr/>
                                    <!-- <tr>
                                        <td class="content-block">
                                            <h1>Room Booked!</h1>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td class="content-block">
                                            <h2>
                                            Please pay 3 days before your check in date
                                            </h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="content-block">
                                            <table class="invoice">
                                                <tr>
                                                    <td> 
                                                        <!-- <b>Booking ID #<?php echo ($_SESSION['booking_id']+1) ?></b> -->
                                                        <b><?php echo $_SESSION['total_night'] ?></b> night stay(s) from
                                                        <b><?php echo $_SESSION['checkin_date'] ?></b> to
                                                        <b><?php echo $_SESSION['checkout_date'] ?></b>
                                                    <?php echo "    <br>No. of Guest/s :
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
?>
                                    <?php
                                        $no = 1;
                                        for ($i = 0; $i < count($_SESSION['room_id']); $i++) {

                                        echo '
                                                    <a>' . $_SESSION['roomname'][$i] . '</a>

                                            <div class="reservation-room-seleted_package">
                                                <ul>';
                                        for ($x = 1; $x <= $_SESSION['total_night']; $x++) {
                                            $date = strtotime('+' . $x . ' day', strtotime($_SESSION['checkin_unformat']));
                                            echo '
                                                    <li>
                                                        <span>' . date("M d, Y", $date) . '  ' . $_SESSION['roomqty'][$i] . ' x ₱' . number_format(($_SESSION['ind_rate'][$i] - $_SESSION['ind_rate'][$i]*.12 ) / $_SESSION['roomqty'][$i]) . '</span>
                                                        <span><b>₱' . number_format(($_SESSION['ind_rate'][$i] - $_SESSION['ind_rate'][$i]*.12)) . '</b></span>
                                                    </li>';
                                            }

                                        echo '
                                                </ul>
                                            </div>
                                            <tr>
                                            <td style="width:200px;"> TOTAL Room ' . $no . '</td>
                                            <td style="width:200px;"><b>₱' . number_format(($_SESSION['ind_rate'][$i] - $_SESSION['ind_rate'][$i]*.12 ) * $_SESSION['total_night']) . '.00</b></td>
                                            </tr>
                                            </div> ';
                                            $no += 1;
                                            }
                                    ?>

                                    <?php
                                        $no = 1;
                                        for ($i = 0; $i < count($_SESSION['amenity_id']); $i++) {
                                        echo '
                                            <div class="reservation-room-seleted_item">
                                            <h6>Amenities</h6>
                                            <div class="reservation-room-seleted_package">
                                                <ul>';
                                        for ($x = 1; $x <= $_SESSION['total_night']; $x++) {
                                            $date = strtotime('+' . $x . ' day', strtotime($_SESSION['checkin_unformat']));
                                            echo '
                                                    <li>
                                                        <span>'.$_SESSION['amenity_name'][$i].'   x ₱' . number_format(($_SESSION['amenity_rate'][$i] - $_SESSION['amenity_rate'][$i]*.12 )) . '</span>
                                                        <span>₱' . number_format(($_SESSION['amenity_rate'][$i] - $_SESSION['amenity_rate'][$i]*.12)) . '</span>
                                                    </li>';
                                            }

                                        echo '
                                                </ul>
                                            </div>
                                            </div> ';
                                            $no += 1;
                                            }
                                    ?>

                                        <tr>
                                            <td style='width:200px;'>Amenities</td>
                                            <td style='width:200px;'><b>₱ <?php echo number_format(($_SESSION['additional_amount'])-($_SESSION['additional_amount'] * .12), 0) ?>.00</b></td>
                                        </tr>
                                        <tr>
                                            <td style='width:200px;'>Tax</td>
                                            <td style='width:200px;'><b>₱ <?php echo number_format((($_SESSION['total_amount']+$_SESSION['additional_amount']) * .12), 0) ?>.00</b></td>
                                        </tr>
                                        <!-- END / ITEM -->

                                        <!-- TOTAL -->
                                        <tr>
                                            <td style='width:200px;'>TOTAL</td>
                                            <td style='width:200px;'><b>₱ <?php echo ($_SESSION['total_amount']+$_SESSION['additional_amount']); ?>.00</b></td>
                                        </tr>
 
                                                            <!-- $count = 0; foreach ($_SESSION['room_id'] as &$value0) {
                                                            echo "<tr>
                                                                <td >
                                                                    <b>" . $_SESSION['roomqty'][$count] . " " . $_SESSION['roomname'][$count]
                                                                        . "</b>
                                                                </td>
                                                                <td style='width:200px;'>
                                                                    <b>PHP " . number_format($_SESSION['ind_rate'][$count],
                                                                        2) . "</b>
                                                                </td>
                                                            </tr>";
                                                            $count = $count + 1; } ;

                                                            echo "<tr>
                                                                <td style='width:200px;'>Total</td>
                                                                <td style='width:200px;'>
                                                                    <b>PHP" . number_format($_SESSION['total_amount'], 2) .
                                                                        "</b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style='width:200px;'>20% Deposit Due</td>
                                                                <td style='width:200px;'>
                                                                    <b>PHP" . number_format($_SESSION['deposit'], 2) . "</b>
                                                                </td>
                                                            </tr> -->

<?php 
echo"
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
