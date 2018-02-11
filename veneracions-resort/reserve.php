<?php
session_start();
include './dbconnect.php';

$id = $_GET['id'];

$query = "SELECT * FROM booking WHERE reservation_code = '$id'";
$res = mysql_query($query);
$count = mysql_num_rows($res);

if ($count == 1) {
    $queryDelete = "UPDATE booking SET isReserved = 1 WHERE reservation_code = '$id'";
    $resDelete = mysql_query($queryDelete);
    if ($resDelete) {
        header("location: verifiedreservation.php?id=".$id);
    }
}
