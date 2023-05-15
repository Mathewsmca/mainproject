<?php
session_start();
include "dbcon.php";
$loc=$_SESSION['cntloc'];
$type=$_SESSION['cabketype'];
$sql = "SELECT *  FROM `tbl_booking` WHERE `frm` LIKE '$loc' AND `types` LIKE '$type' AND `piksts` = 1 AND `status` = 1;";
$cnt=dbset($sql,2);
echo $cnt;

?>