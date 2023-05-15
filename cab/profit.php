<?php
include 'header.php';
$cabid=$_SESSION['cabid'];
$cabkey=$_SESSION['cabkeyid'];
$cabtype=$_SESSION['cabketype'];
?>

<div class="content-wrapper">
<div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Completed Trip </h2>
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
                       
                          <th> Date & Time </th>
                          <th> From </th>
                          <th> To </th>
                          <th> Amount </th>
                          <th> Service changes </th>
                        </tr>
                      </thead>
                      <tbody>
<?php
    $sql = "SELECT *  FROM `tbl_trip` WHERE `cbid` = $cabid AND `sts` = 2;";
    $rlt=dbset($sql,1);
    $ttl=0;
    while($r=mysqli_fetch_array($rlt))
    {
        $sql4 = "SELECT *  FROM `ride` WHERE `rideid` LIKE '$r[rideid]';";
        $fare=dbset($sql4,4);
        $totalfr=$fare['total_fare'];
        $cmm=20;
        $cms=$totalfr*$cmm/100;

        $trpchrg= $totalfr- $cms;
        $ttl=$ttl+$trpchrg;
?>
                          <td> <?php echo $fare['ride_date'] ?> </td>
                          <td> <?php echo $r['ftm'] ?> </td>
                          <td> <?php echo $r['toc'] ?> </td>
                          <td>₹ <?php echo  $trpchrg ?></td>
                          <td>₹ <?php echo $cms ?></td>
                        </tr>
                        
                   <?php
                   
    }
    ?>
                        
                        
                        
                        
                      </tbody>
                    </table><br>
                    <div class="wrapper pb-5 border-bottom"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                  <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0 text-dark">Total Profit</p>
                                   
                                  </div>
                                  <h3 class="mb-0 text-dark font-weight-bold">₹ <?php echo $ttl ?></h3>
                                  <canvas id="total-profit" style="display: block; width: 216px; height: 108px;" width="216" height="108" class="chartjs-render-monitor"></canvas>
                                </div>
                  </div>
                </div>
              </div>
            </div>
        
        
        </div>

<?php
include 'footer.php';
?>