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
                                                        <b>Booking ID #<?php echo $_SESSION['booking_id'] ?></b>
                                                        <br>
                                                        <b><?php echo $_SESSION['total_night'] ?></b> night stay(s) from
                                                        <b><?php echo $_SESSION['checkin_date'] ?></b> to
                                                        <b><?php echo $_SESSION['checkout_date'] ?></b>
                                                    <?php echo "    <br>No. of Guest/s :
                                                        <b> " . array_sum($_SESSION['guestqty']) . "</b> 
                                                        <br>
                                                        <br>
                                                        <b>Contact Detail</b>
                                                        <br>" . $_SESSION['addressline1'] . ", " . $_SESSION['addressline2']
. "
                                                        <br>" . $_SESSION['postcode'] . " " . $_SESSION['city'] . ",
                                                        <br>" . $_SESSION['state'] . ", " . $_SESSION['country'] . "
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
                                                                <td style='width:200px;'>15% Deposit Due</td>
                                                                <td style='width:200px;'>
                                                                    <b>PHP" . number_format($_SESSION['deposit'], 2) . "</b>
                                                                </td>
                                                            </tr>

                                                        </table>

                                                        <br/>
					<br>Notes & Policy:</b>

															<br>
															<b>1. Please pay 15% deposit to confirmed your booking.</b><br>
															2. This hotel are not allowed etc etc<br>
															3. Please check in before bla bla<br>
															4. The hotel management has right to cancel the booking
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
										<br><br>Montalbans Waterpark resort address here
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class='footer'>
					<table width='100%'>
						<tr>
							<td><br>Questions? Email <a href='mailto: '>testing.envel@gmail.com</a> or Call Us at 0000000</td>
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table> </body>
</html>";
