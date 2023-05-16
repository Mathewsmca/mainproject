<?php
session_start();
unset($_SESSION['cabid']);
unset($_SESSION['cabkeyid']);
unset($_SESSION['cabketype']);
unset( $_SESSION['cntloc']);
header("location:../index.php");
?>