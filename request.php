<?php
session_start();
$ids=$_GET['tid'];
include "dbcon.php";
$id=$_SESSION['userdata']['user_id'];
$sql = "SELECT *  FROM `tbl_booking` WHERE `userid` = $id AND `status` = 2;";
$cnt=dbset($sql,2);
if($cnt!=0)
{
   echo 1;
}
else
{
    echo 0;
}

?>