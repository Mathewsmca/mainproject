<?php
include 'header.php';
$cabid=$_SESSION['cabid'];
$cabkey=$_SESSION['cabkeyid'];
$cabtype=$_SESSION['cabketype'];


if(isset($_POST['up']))
{
    $driver=$_POST['dn'];
    $lino=$_POST['lno'];
    $sql = "UPDATE `tbl_cab` SET `driver` = '$driver', `liceneno` = '$lino' WHERE `tbl_cab`.`id` = $cabid;";
    dbset($sql,1);
}


$sql = "SELECT *  FROM `tbl_cab` WHERE `id` = $cabid;";
$dr=dbset($sql,4);
?>

<div class="content-wrapper">
<div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Settings </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
             
      
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <p class="card-description"> Update Driver Details </p>
                    <form action="?" method="post"  class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Driver Name</label>
                        <input name="dn" type="text" required value="<?php echo $dr['driver'] ?>" class="form-control" id="exampleInputUsername1" placeholder="Driver Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Licence Number</label>
                        <input name="lno" type="text" required value="<?php echo $dr['liceneno'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Licence Number">
                      </div>
                     
                  
                      <button name="up" type="submit" class="btn btn-primary mr-2">Update</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
            </div>
        
        
        </div>

<?php
include 'footer.php';
?>