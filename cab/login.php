<?php
session_start();
include 'dbcon.php';
$msg="";
if(isset($_POST['save']))
{

  $email=$_POST ['email'];
  $pass=$_POST['pass'];
  $sql = "SELECT *  FROM `tbl_cab` WHERE `loginemail` LIKE '$email' AND `password` LIKE '$pass'";
  $rlt=dbset($sql,2);
  $rlts=dbset($sql,3);
  if($rlt!=0)
  {
    if($rlts[8]==$email && $rlts[9]==$pass && $rlts[10]==2)
    {

      $_SESSION['cabid']=$rlts[0];
      $_SESSION['cabkeyid']=$rlts[1];
      $_SESSION['cabketype']=$rlts[2];
      $_SESSION['cabdvr']=$rlts[6];

      $sqll = "SELECT *  FROM `tbl_current` WHERE `cabid` LIKE $rlts[0];";
      $loc=dbset($sqll,4);
      $_SESSION['cntloc']=$loc['loc'];
      header("location:index.php");


    }
    else
    {
        $msg="<div class='alert alert-danger' role='alert'>The account is not approved !</div>";
    }
}
else
{
  $msg="<div class='alert alert-danger' role='alert'>Invalid login login infomations !</div>";
}
}
?>


<!DOCTYPE html>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="assets/images/logodark.png">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <?php
                      echo $msg;
                ?>
                <form class="pt-3" method="post" action="?">
                  <div class="form-group">
                    <input type="email" required name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" required  name="pass" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button name="save" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
              
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>