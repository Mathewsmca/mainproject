<?php
session_start();
include "dbcon.php";
$loc=$_SESSION['cntloc'];
$type=$_SESSION['cabketype'];
$sql = "SELECT *  FROM `tbl_booking` WHERE `frm` LIKE '$loc' AND `types` LIKE '$type' AND `piksts` = 1 AND `status` = 1;";
$cnt=dbset($sql,2);
$data=dbset($sql,4);
if($cnt!=0)
{
    ?>
  <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">New Booking</h5>
                            <h3 class="mb-4 text-dark font-weight-bold"><?php echo $data['frm'] ?></h3>
                            <i class="mdi mdi-arrow-down"></i>
                            <h3 class="mb-4 text-dark font-weight-bold"><?php echo $data['tos'] ?></h3>
                            <a href="accept.php?ids=<?php echo $data['rideid'] ?>" class="btn btn-success btn-rounded btn-fw">Accept</a>
                          </div>
<?php
}

?>