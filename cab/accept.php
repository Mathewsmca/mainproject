<?php
session_start();
$cid=$_SESSION['cabid'];
include "dbcon.php";
$ids=$_GET['ids'];
$sql = "SELECT *  FROM `ride` WHERE `rideid` LIKE '$ids';";
$kls=dbset($sql,4);

$sql2="INSERT INTO `tbl_trip`(`cbid`, `userid`, `ftm`, `toc`, `sts`,`rideid`) 
VALUES ('$cid','$kls[customer_user_id]','$kls[from_distance]','$kls[to_distance]','1','$ids')";
dbset($sql2,1);

$sql3 = "UPDATE `tbl_booking` SET `status` = '2' WHERE `tbl_booking`.`rideid` LIKE '$ids';";
dbset($sql3,1);

$sql4 = "UPDATE `ride` SET `status` = '2' WHERE `ride`.`rideid` LIKE '$ids';";
dbset($sql4,1);

header("location:index.php");
?>