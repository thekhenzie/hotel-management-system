<?php
ob_start();
session_start();
if( isset($_SESSION['user'])!="" ){
	header("Location: index.php");
}
include_once 'dbconnect.php';

if(isset($_POST['signUp'])) {
		
	$username = trim($_POST['username']);
	$emailAddress = trim($_POST['emailAddress']);
	$tpassword = trim($_POST['password']);
	
	$username = strip_tags($username);
	$emailAddress = strip_tags($emailAddress);
	$upassword = strip_tags($tpassword);
	
	// password encrypt using SHA256();
	$password = hash('sha256', $upassword);
	// check emailAddress exist or not
	$query = "SELECT emailAddress FROM admin WHERE emailAddress='$emailAddress'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if emailAddress not found then proceed
	if ($count==0) {
		$query = "INSERT INTO admin(username, emailAddress, password) VALUES('$username','$emailAddress','$password')";
		$res = mysql_query($query);
		
		if ($res) {
			$errTyp = "success";
			$errMSG = "Successfully registered, you may login now";
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong, try again later...";	
		}	
			
	} else {
		$errTyp = "warning";
		$errMSG = "Email address already in use.";
	}
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Register</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/favicon.png"/>

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
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->


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
                        <li>
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
                        <li class="current-menu-item">
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

        <!-- ACCOUNT -->
        <section class="section-account parallax bg-11">
            <div class="awe-overlay"></div>
            <div class="container">
                <div class="login-register">
                    <div class="text text-center">       
                        <h2>REGISTER FORM</h2>
                        <p>If you no have account in Montalban Waterpark and Garden Resort! Register and feeling</p>
                        <form method="post" class="account_form" autocomplete="off">
                        <?php
                        if ( isset($errMSG) ) {
                            
                            ?>
                            <div class="form-group">
                            <div class="alert alert-dismissable alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info"></i> <?php echo $errMSG; ?>
                            </div>
                            </div>
                            <?php
                        }
                        ?>
                            <div class="field-form">
                                <input type="text" name="username" class="field-text" placeholder="User name*" required>
                            </div>
                            <div class="field-form">
                                <input type="email" name="emailAddress" class="field-text" placeholder="Email Address*" required>
                            </div>
                            <div class="field-form"> 
                                <input type="password" name="password" class="field-text" placeholder="Password*" required>
                            </div>
                            <div class="field-form field-submit">
                                <button name="signUp" class="awe-btn awe-btn-13">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / ACCOUNT -->

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