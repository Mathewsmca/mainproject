<?php
include 'header.php';
?>

<div class="content-wrapper">
<div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
              <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
             
      
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              
                <div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">

                      <?php
                          $sql = "SELECT *  FROM `tbl_trip` WHERE `cbid` = $cids AND `sts` = 1;";
                          $cmt=dbset($sql,2);
                          if($cmt==0)
                          {

                          
                      ?>


                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card" id="newbok">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">New Booking</h5>
                        
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><img src="Ripple-1s-78px.gif" /></div>
                            <p class="mt-4 mb-0">Waiting</p>
                           
                          </div>
                        </div>
                      </div>
                      <?php
                          }
                          else
                          {
                            $data=dbset($sql,4);

                            $sql4 = "SELECT *  FROM `ride` WHERE `rideid` LIKE '$data[rideid]';";
                            $fare=dbset($sql4,4);
                            $totalfr=$fare['total_fare'];
                            $cmm=20;
                            $cms=$totalfr*$cmm/100;

                            $trpchrg= $totalfr- $cms;


                            $sql5 = "SELECT *  FROM `user` WHERE `user_id` = $fare[customer_user_id];";
                            $cmstr=dbset($sql5,4);
                      ?>
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">On Trip</h5>
                            <h3 class="mb-4 text-dark font-weight-bold"><?php echo  $data['ftm'] ?></h3>
                            <i class="mdi mdi-arrow-down"></i>
                            <h3 class="mb-4 text-dark font-weight-bold"><?php echo  $data['toc'] ?></h3>
                          
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Action</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">End Trip</h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"></div>
                            <a href="finish.php?ids=<?php echo $data['rideid'] ?>" class="btn btn-success btn-rounded btn-fw">Finish</a>
                           
                          </div>
                        </div>
                      </div>


                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Trip Rates</h5>
                            <h2 class="mb-4 text-dark font-weight-bold">₹ <?php echo $totalfr ?></h2>
                            
                            <p class="mt-4 mb-0">Trip charge</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">₹ <?php echo $trpchrg ?></h3>
                            <p class="mt-4 mb-0">Service charge</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark">₹ <?php echo $cms ?></h3>
                          </div>
                        </div>
                      </div>

                      

                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Customer Info</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"> <?php echo $cmstr['name'] ?></h2>
                            
                            <p class="mt-4 mb-0">Contact Number</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?php echo $cmstr['mobile'] ?></h3>
                           
                          </div>
                        </div>
                      </div>
                      <?php

                          }
                          ?>
                    </div>
                    <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                  <h4 class="card-title mb-0">Recent Trips</h4>
                                
                                </div>
                              </div>
                              <div class="col-lg-12 col-sm-4 grid-margin  grid-margin-lg-0">
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
    $sql = "SELECT *  FROM `tbl_trip` WHERE `cbid` = $cids AND `sts` = 2;";
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