
<?php 
include('adhead.php');
if(!isset($_SESSION['userdata']))
{
    header('Location: index.php');
}
if($_SESSION['userdata']['is_admin']==1){
include('adsidebar.php'); 

if(isset($_GET['action']))
{
    $id=$_GET['id'];
    
    if($_GET['action']=='blk')
    {
        $ap=3;
        $adm = new adminwrk();
        $admc = new dbcon();
        $sho = $adm->cyesno($ap,$id,$admc->conn);
    }

    if($_GET['action']=='app')
    {
        $ap=2;
        $adm = new adminwrk();
        $admc = new dbcon();
        $sho = $adm->cyesno($ap,$id,$admc->conn);
    }

    elseif($_GET['action']=='no')
    {
        $ap=0;
        $adm = new adminwrk();
        $admc = new dbcon();
        $sho = $adm->cyesno($ap,$id,$admc->conn);
    }
}
?>

<nav class="nav nav-pills nav-justified col-sm-10">
  <a class="nav-link btn-light active" href="allcab.php">All Cabs</a>
  <a class="nav-link btn-light" href="cabaprvd.php">Pending/Blocked Cabs</a>
  <a class="nav-link btn-light" href="cabaprvdall.php">Approved Cabs</a>
</nav>

<div class="container-fluid">
  <h3 class="text-center">All Users</h3>
    
    <table id='tbl' class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
        <thead>
            <!-- <th>User id</th> -->
            <th onclick='sortTable(1,tbl)'>Type ⇩</th>
            <th onclick='sortTable(2,tbl)'>manufacturer ⇩</th>
            <th onclick='sortTable(3,tbl)'>Model ⇩</th>
            <th onclick='sortTablen(4,tbl)'>Register Number ⇩</th>
            <th onclick='sortTablen(4,tbl)'>Driver ⇩</th>
            <th onclick='sortTablen(4,tbl)'>License number ⇩</th>
            <th>Approve/Block</th>
            <!-- <th>Delete</th>
            <th>Details</th> -->
        </thead>
        <tbody>
        <?php 
            $adm = new adminwrk();
            $admc = new dbcon();
            $show = $adm->newcab($admc->conn,"WHERE `status` = 2");
            foreach($show as $key=>$val)
            {
              echo "<tr><td>".$val['type']."</td><td>".$val['company']."</td><td>".$val['modal']."</td><td>".$val['regno']."</td>
              <td>".$val['driver']."</td>
              <td>".$val['liceneno']."</td></td>"; 
              if($val['status']==2)
              {
                echo "<td><a class='btn btn-warning' href='allcab.php?action=blk&id=".$val['id']."'>Block</a></td>";
              }
              if($val['status']==1)
              {
               echo "<td><a class='btn btn-success' href='allcab.php?action=app&id=".$val['id']."'>Approve</a></td>";
              }
              // echo "<td><a class='btn btn-danger' href='allusers.php?action=no&id=".$val['user_id']."'>Delete</a></td>";
            
              // echo "<td><a class='btn btn-danger' href='usrdetail.php?id=".$val['user_id']."'>Details</a></td></tr>";
            }

        ?>
        </tbody>
    </table>
  </div>

  <?php 
  
}
else{
    echo '<h1 class="text-center text-weight-bold text-dark">You Are not Authorised</h1>';
  }
  
  include('adfoot.php'); ?>