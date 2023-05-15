<?php
include 'dbcon.php';

if(isset($_POST['save']))
{

  $type=$_POST['type'];
  $manuf=$_POST ['manuf'];
  $modal=$_POST ['modal'];
  $regno=$_POST ['regno'];
  $dnam=$_POST ['dnam'];
  $lcno=$_POST ['lcno'];
  $email=$_POST ['email'];
  $pass=$_POST['pass'];
  $cabid=generateRandomString();
  $sql="INSERT INTO `tbl_cab`( `cabid`, `type`, `company`, `modal`, `regno`, `driver`, `liceneno`, `loginemail`, `password`, `status`) VALUES 
  ('$cabid','$type','$manuf','$modal','$regno','$dnam','$lcno','$email','$pass','1')";
  dbset($sql,1);
  header("location:login.php");

}

function generateRandomString($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
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
          <div class="row flex-grow auth-form-light mx-auto">
            <div class="col-lg-4 ">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="assets/images/logodark.png">
                </div>
                <h4>New cab registration!</h4>
               
                <form class="pt-3" method="post" action="?">
                <div class="form-group">
                    <select class="form-control form-control-lg" name="type" id="exampleFormControlSelect2">
                    <option value=""  selected disabled hidden>select CAB type</option>
              <option value="CedMicro">Micro</option>
              <option value="CedMini">Mini</option>
              <option value="CedRoyal">Royal</option>
              <option value="CedSUV">SUV</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" required name="manuf" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Manufacturer">
                  </div>
                  <div class="form-group">
                    <input type="text" name="modal"  required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Model">
                   
                  </div>
                  
                  <div class="form-group">
                    <input type="text" name="regno" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Regiser Number">
                  </div>
            
               
              </div>
              
              
            </div>
            <div class="col-lg-4 ">
              <div class="auth-form-light text-left p-5">
                
               
                  <div class="form-group">
                    <input type="text" name="dnam" required class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Driver Name">
                  </div>
                  <div class="form-group">
                    <input type="text" name="lcno"  required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Driving licence number">
                  </div>
                  <div class="form-group">
                    <input type="email" name="email" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button name="save" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
              
            </div>

            <div class="col-lg-4 ">
                <div class="text-center">
                    <img src="assets/images/imgs.png" />
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