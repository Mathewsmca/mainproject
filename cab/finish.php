<?php
session_start();
$cid=$_SESSION['cabid'];
include "dbcon.php";
$ids=$_GET['ids'];


$sql3 = "UPDATE `tbl_booking` SET `status` = '3' WHERE `tbl_booking`.`rideid` LIKE '$ids';";
dbset($sql3,1);

$sql4 = "UPDATE `ride` SET `status` = '3' WHERE `ride`.`rideid` LIKE '$ids';";
dbset($sql4,1);


$sql5 = "UPDATE `tbl_trip` SET `sts` = '2' WHERE `tbl_trip`.`rideid`  LIKE '$ids';";
dbset($sql5,1);

header("location:index.php");
?>