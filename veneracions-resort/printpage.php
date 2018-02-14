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
                                        <td class="content-block">
                                            <h1>Room Booked!</h1>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="content-block">
                                            <h2>Thanks for giving us opportunity to serve you.</h2>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="content-block">
                                            <table class="invoice">
                                                <tr>
                                                    <td>Dear <?php echo ($_SESSION['firstname'] . ' ' . $_SESSION['lastname']) ?>
                                                        <br>
                                                        <br>
                                                        <b>Booking ID #<?php echo ($_SESSION['booking_id']+1) ?></b>
                                                        <br>
                                                        <b><?php echo $_SESSION['total_night'] ?></b> night stay(s) from
                                                        <b><?php echo $_SESSION['checkin_date'] ?></b> to
                                                        <b><?php echo $_SESSION['checkout_date'] ?></b>
                                                    <?php echo "
                                                        <br>
                                                        <br>
                                                        <b>Contact Detail</b>
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
                                                            $count = 0; foreach ($_SESSION['room_id'] as &$value0) {
                                                            echo "<tr>
                                                                <td style='width:200px;'>
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
                                                            </tr>

                                                        </table>

                                                        <br/>
					<br>Notes & Policy:</b>

															<br>
															<b>1. Please pay 20% deposit to confirm your booking.</b><br>
															   2. Firearm and deadly weapons are strictly not allowed.<br>
															   3. All children must be under adult supervision at all times.<br>
															   4. The Management shall not be held responsible for the injury or incident of our guests; nor for the loss of valuables and belongings.<br>
															   5. All damages to our properties will be charged accordingly.<br>
															   6. The Management reserves the right to refuse any guest.<br>
															   7. Always wear proper swimming attire. Maong short and colored T-shirts are not allowed.<br>
															   7. Everyone is required to take a shower before swimming.<br>
															   8. Strictly NO Bottled drinks are allowed. Corkage fee applied.<br>
															   9. NO littering. Please keep your tables & cottages tidy and clean.<br>
															   10.Rough playing & other misbehaviors that could result to injuries or annoyance are strictly prohibited.<br>
															   11.Strictly NO eating, drinking & smoking in pool area.<br>
															   12.Vandalism is a crime punishable by law.
															<br>

												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td>
										<br><p><b>BANK DETAILS (BDO)</b> <br/>
										<b>BANK:</b> Banco de Oro (BDO) <br/>
										<b>ACCOUNT NAME:</b> Montalban Waterpark and Garden Resort Inc.<br/>
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
