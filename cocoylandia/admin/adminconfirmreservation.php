<?php
session_start();
date_default_timezone_set('Asia/Manila');

include './auth.php';
$re = mysql_query("SELECT * from admin where username = '".$_SESSION['username']."'  AND password = '".$_SESSION['password']."' " );
echo mysql_error();
if(mysql_num_rows($re) > 0)
{

} 
else
{

session_destroy();
header("location: index.htm");
}

$booking_id = $_GET['booking_id'];
include './auth.php';
$today = date('Y-m-d h:i:s');
$sql = "UPDATE booking SET isActive =1, checkin_time = '$today' WHERE booking_id=".$booking_id."";
echo mysql_error();
$result = mysql_query($sql);

header('Refresh: 2; url=pending-reservation.php');
echo "<!DOCTYPE html>\n";
echo "<html lang=\"en\"><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "\n";
echo "    <!-- Bootstrap core CSS -->\n";
echo "    <link href=\"../admin2/css/bootstrap.min.css\" rel=\"stylesheet\">\n";
echo "    <!-- Custom styles for this template -->\n";
echo "    <link href=\"../admin2/css/dashboard.css\" rel=\"stylesheet\">\n";
echo "	<link href=\"../admin2/css/style.css\" rel=\"stylesheet\">\n";
echo "	<link rel=\"stylesheet\" href=\"../admin2/css/fontello.css\">\n";
echo "    <link rel=\"stylesheet\" href=\"../admin2/css/animation.css\"><!--[if IE 7]><link rel=\"stylesheet\" href=\"css/fontello-ie7.css\"><![endif]-->\n";
echo "    \n";
echo "<body>\n";
echo "<div class=\"container\">\n";
echo "	<div class=\"row\">\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-6 \">\n";
echo "		<h4> Confirmation Success. Please wait few seconds for redirection...<i class=\"icon-spin4 animate-spin\" style=\"font-size:28px;\"></i></h4>\n";
echo "		\n";
echo "		</div>\n";
echo "		<div class=\"col-xs-3\">\n";
echo "		</div>\n";
echo "	</div>\n";
echo "</div>\n";
echo "\n";
echo "\n";
echo "</body></html>";
?>