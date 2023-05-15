<?php
include 'header.php';
$cabid=$_SESSION['cabid'];
$cabkey=$_SESSION['cabkeyid'];
$cabtype=$_SESSION['cabketype'];
if(isset($_POST['save']))
{
    $loc=$_POST['loc'];
   
    $_SESSION['cntloc']=$loc;
    $sql = "SELECT *  FROM `tbl_current` WHERE `cabid` LIKE '$cabid';";
    $cnt=dbset($sql,2);
    if($cnt!=0)
    {
        $sql2="UPDATE `tbl_current` SET `loc`='$loc' WHERE `cabid` LIKE '$cabid'";
        dbset($sql2,1);
    }
    else
    {
        $sql3="INSERT INTO `tbl_current`(`loc`, `cabid`, `cabtype`, `cabkey`, `sts`) 
        VALUES ('$loc','$cabid','$cabtype','$cabkey','1')";
        dbset($sql3,1);
    }

}

?>

<div class="content-wrapper">
<div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Set  Current Point </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
             
      
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                   
                
                      <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <form action="?" method="post">
                            <h5 class="mb-2 text-dark font-weight-normal">Point</h5>
                            <select name="loc" class="form-control mb-3">
                                <?php
                              $sql = "SELECT * FROM `location`;";
                              $rl=dbset($sql,1);
                              $cnt=dbset($sql,2);
                              while($rows=mysqli_fetch_array($rl))
                              {
                                if($cnt!=0)
                                {
                                  ?>
                                  <option> <?php echo $rows[1] ?> </option>
                                  <?php
                                }
                              }
                                ?>
                            </select>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"></div>
                            <button name="save" type="submit" class="btn btn-success btn-rounded btn-fw">Set</button>
                           </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Current Point</h5>
                           
                            <h2 class="mb-2 text-dark font-weight-bold">
                                <?php
                                    $sql = "SELECT *  FROM `tbl_current` WHERE `cabid` LIKE '$cabid';";
                                    $locs=dbset($sql,3);
                                    echo $locs[1];
                                ?>
                            </h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"></div>
                          
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
            </div>
        
        
        </div>

<?php
include 'footer.php';
?>