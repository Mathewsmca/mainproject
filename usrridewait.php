<?php
session_start();
if(!isset($_SESSION['userdata']))
{
    header('Location: index.php');
}
if($_SESSION['userdata']['is_admin']==1)
{
    

include('header.php');
include('adminwrk.php'); 
 ?>
<header>
      <nav  class="navbar navbar-expand-lg">
          <a class="navbar-brand nos" href="#">Go<span class="gree">Cab</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span><i class="fas fa-bars logo text-dark"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                
                  <li class="nav-item rbtn">
                      <a class="btn" href="admin.php">Dashboard</a>
                      <a class="btn" href="logout.php">Logout</a>
                  </li>
              </ul>
          </div>
      </nav>
  </header>
  <?php
    echo '<h1 class="text-center text-weight-bold text-dark">ADMIN can not Enter User Area</h1>';
}
else {
include('user.php'); 

if(isset($_GET['action']))
{
    if($_GET['action']=='blk')
        {
            $id= $_GET['id'];
            $ap=1;
            $adm = new user();
            $admc = new dbcon();
            $sho = $adm->ridec($ap,$id,$admc->conn);
        }
}
include('header.php');

include('navs.php');

include('ussidebar.php');


?>


 

<div id="allru">


  <h3 class="text-center">Bookings (Waiting..)</h3>
    
    <table id="tbl" class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
        <thead>

            <th>Pickup Point</th>
            <th>Drop Point</th>
            <th>Cab Type</th>
         
            <th>Status</th>
            <th>Action</th>
            <th></th>
        </thead>
        <tbody id="tblc">
        <?php 
        $tripid="";
            $id=$_SESSION['userdata']['user_id'];
            $sql = "SELECT *  FROM `tbl_booking` WHERE `userid` = $id AND `status` = 1;";
            $rlt=dbset($sql,1);
            while($row=mysqli_fetch_array($rlt))
            {
                $tripid=$row['rideid'];
              echo "<tr>
                    <td>$row[frm]</td>
                    <td>$row[tos]</td>
                    <td>$row[types]</td>
                    <td id='cabsts'>Waiting for cab</td>
                    <td id='sts'><img src='Pulse-1s-51px.gif'/></td>
                    <td><a class='btn btn-warning' href='usrride.php?action=blk&amp;id=87'>Cancel</a></td>
                  
              <tr>";
            }
            
        ?>
        </tbody>

    </table>
  </div>

 
    <div id="ernru">

    <h3 class="text-center">Total Spending</h3>
    <?php 
        $id=$_SESSION['userdata']['user_id'];
        $adm = new user();
        $admc = new dbcon();
        $en = $adm->earn($id,$admc->conn);
        ?>
    <h1 class="text-center font-weight-bold text-dark">₹<?php echo $en; ?></h1>
    </div>


  <?php include('adfoot.php');} ?>
