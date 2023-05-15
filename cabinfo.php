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
          <a class="navbar-brand nos" href="#">Ced<span class="gree">Cab</span></a>
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


  <h3 class="text-center">Cab info</h3>
    
    <table id="tbl" class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
        <thead>

            <th>CAB ID</th>
            <th>CAB No.</th>
            <th>Model</th>
            <th>Driver</th>
         
            <th>Licence Number</th>
        </thead>
        <tbody id="tblc">
        <?php 
        $tripid=$_GET['tpid'];
            $id=$_SESSION['userdata']['user_id'];
            $sql = "SELECT *  FROM `tbl_trip` WHERE `rideid` LIKE '$tripid';";
            $cabid=dbset($sql,3);

            $sql2 = "SELECT *  FROM `tbl_cab` WHERE `id` = $cabid[1];";    
            $rlt=dbset($sql2,1);
            while($row=mysqli_fetch_array($rlt))
            {
               
              echo "<tr>
                    <td>$row[cabid]</td>
                    <td>$row[regno]</td>
                    <td>$row[modal]</td>
                    <td>$row[driver]</td>
                    <td>$row[liceneno]</td>
                  
                  
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