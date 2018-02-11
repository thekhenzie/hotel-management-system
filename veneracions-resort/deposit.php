<?php
session_start();
include './dbconnect.php';
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
if (isset($_POST['submitCode'])) {
    $code = $_POST['reservation_code'];
    $reference_number = $_POST['reference_number'];
    $imgpath = "";
    $imageFileType = pathinfo($imgpath, PATHINFO_EXTENSION);
    $uploadDir = "./img/bankslips/";
    $imagename = $_FILES['deposit_slip']['name'];
    $imgpath = $uploadDir . $imagename . $imageFileType;
    $uploadDirForSql = "img/bankslips/";
    $imgpathForSQL = $uploadDirForSql . $imagename . $imageFileType;

    $query = "SELECT * FROM booking WHERE reservation_code = '$code'";
    $res = mysql_query($query);
    $count = mysql_num_rows($res);
    if ($count > 0) {
        $queryInsert = "UPDATE booking SET isReserved =1, bank_slip = '$imgpathForSQL', reference_number = '$reference_number' WHERE reservation_code='$code'";
        $resInsert = mysql_query($queryInsert);
        if (mysql_error() == "") {
            move_uploaded_file($_FILES["deposit_slip"]["tmp_name"], $imgpath);
            $errTyp = "Success";
            $errMSG = "Successfully uploaded bank slip";
        } else {
            $errTyp = "danger";
            $errMSG = "Error on uploading your bank slip";
        }
    } else {
        $errTyp = "danger";
        $errMSG = "Reservation code not existing";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Upload deposit slip</title>

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

                    <!-- HEADER MENU -->
                    <nav class="header_menu">
                    <ul class="menu">
                        <li class="current-menu-item">
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
                        <li>
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

        <!-- SUB BANNER -->
        <section class="section-sub-banner bg-9">
            <div class="awe-overlay"></div>
            <div class="sub-banner">
                <div class="container">
                    <div class="text text-center">
                        <h2>Upload deposit slip</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- END / SUB BANNER -->

        <!-- TERM CONDITION -->
        <section class="section-term-condition bg-white">
            <div class="container">
                <div class="term-condition">
                    <h3 class="text-uppercase">Please upload here: </h3>
                    <br>
                    <?php
if (isset($errMSG)) {
    echo '<div class="alert alert-' . $errTyp . ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errMSG . '</div>';
}
?>
                <form method="POST" enctype="multipart/form-data">
                <div>
                    <p>Deposit Reference number:  </p>
                    <div class='row'>
                        <div class='col-md-4'>
                            <input class="form-control" type="text" name="reference_number" required>
                        </div>
                    </div>
                    <p>Reservation Code:  </p>
                    <div class='row'>
                        <div class='col-md-4'>
                            <input class="form-control" type="text" name="reservation_code" required>
                        </div>
                    </div>
                    <p>Deposit Slip:  </p>
                    <div class='row'>
                        <div class='col-md-4'>
                            <input class="form-control" type="file" accept="image/*" name="deposit_slip" required>
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="awe-btn awe-btn-6" name="submitCode">Upload</button>
                    <br/>
                    <i>Note: Upload only image file type that are allowed<br>Example:  .jpg .jpeg .png .bmp .gif</i>


                </form>
                </div>
            </div>
        <br/>
        </section>

        <!-- END / TERM CONDITION -->

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
