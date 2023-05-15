<?php
include 'header.php';
$cabid=$_SESSION['cabid'];
$cabkey=$_SESSION['cabkeyid'];
$cabtype=$_SESSION['cabketype'];


?>

<div class="content-wrapper">
<div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> On trip </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
             
      
              </div>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  
                    
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> From </th>
                          <th> To </th>
                          <th> User </th>
                          <th> contact </th>
                        </tr>
                      </thead>
                      <tbody>
<?php
    $sql = "SELECT *  FROM `tbl_trip` WHERE `cbid` = $cabid AND `sts` = 1;";
    $rlt=dbset($sql,1);
    while($r=mysqli_fetch_array($rlt))
    {
        $sql2 = "SELECT *  FROM `user` WHERE `user_id` = $r[userid];";
        $names=dbset($sql2,4);
?>
                          <td> # </td>
                          <td> <?php echo $r['ftm'] ?> </td>
                          <td> <?php echo $r['toc'] ?> </td>
                          <td> <?php echo $names['name'] ?></td>
                          <td> <?php echo $names['mobile'] ?></td>
                        </tr>
                        
                   <?php
                   
    }
    ?>
                        
                        
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        
        
        </div>

<?php
include 'footer.php';
?>