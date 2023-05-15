<?php
session_start();
include_once"../dbcon.php";
/**
 * @author lolkittens
 * @copyright 2020
 */
$plam= $_SESSION['amttrip'];
$sql2 = "UPDATE `ride` SET `status` = '4' WHERE `ride`.`rideid` LIKE '$plam';";
$kl2=dbset($sql2,1);
if($kl2==1)
{
    header("location:../usrride.php");
}
?>