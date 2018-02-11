<?php
session_start();
include './dbconnect.php';
function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
// if (isset($_POST['submitCode'])) {
console_log($_FILES);
console_log($_POST);
$code = $_POST['reservation_code'];
$reference_number = $_POST['reference_number'];
$imgpath = "";
$imageFileType = pathinfo($imgpath, PATHINFO_EXTENSION);
$uploadDir = "./img/bankslips/";
$imagename = $_FILES["depositslip"]['name'];
$imgpath = $uploadDir . $imagename . $imageFileType;
$uploadDirForSql = "img/bankslips/";
$imgpathForSQL = $uploadDirForSql . $imagename . $imageFileType;
console_log($imgpathForSQL);
console_log($imgpath);
$query = "SELECT * FROM booking WHERE reservation_code = '$code'";
// $query = "INSERT INTO reports(reportName,reportStatus,reportDate,reportCreated,reportStep,reportConcern,reportLevel,deptId) VALUES('$reportName','$reportStatus','$reportDate','$printdate','$reportStep','$reportConcern','$reportLevel','$deptId')";

$res = mysql_query($query);
$count = mysql_num_rows($res);

$queryDelete = "UPDATE booking SET isCancelled = 1, isActive = 0 WHERE reservation_code='$code'";
$resDelete = mysql_query($queryDelete);
if ($count == 1) {
    $errTyp = "success";
    $errMSG = "Successfully cancelled reservation";
} else {
    $errTyp = "danger";
    $errMSG = "Reservation code not existing";
}
// }
