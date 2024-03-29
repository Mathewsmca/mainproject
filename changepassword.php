<?php 
$msg="";
include('config.php');
if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, md5($_POST['password']));
            $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));

            if ($password === $confirm_password) {
                $query = mysqli_query($conn, "UPDATE user SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location:login.php");
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }
    } else {
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
} else {
    header("Location: reset_psw.php");
}

?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
<link rel="icon" type="image/png" href="favicons/favicon-16x16.png">
  <link href="assets/img/cab1.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- chat bot css-->
 <link href="style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

   <link rel="stylesheet" href="css2/style1.css" type="text/css" media="all" />
	

  
  <!-- ==================================================
  * Template Name: Bootslander - v4.9.1
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license
======================================================== -->
  
  <style>
#input,#submit,#captcha_message,#captcha{
	width:94.5%;
	margin-left:10px;
	box-sizing: border-box;
	margin-top:10px;
}

#input2{
	margin-bottom:5px;
	width:94.5%;
	margin-left:10px;
    font-size: 16px;
    color: #999;
    text-align: left;
    padding: 14px 20px;
    display: inline-block;
    border: none;
    outline: none;
    border: 1px solid #e5e5e5;
    transition: 0.3s all ease;
}
#submit{
	background-color:#0033c4;
	color:#ffff;
	height:56px;
}
#submit:hover{
	background-color:#0c2772;
		color:#ffff;
}

.error_form
{
	top: 12px;
	color: rgb(216, 15, 15);
    font-size: 15px;
	font-weight:bold;
    font-family: Helvetica;
}
.btn1{
  background:transparent;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}
li:hover{
	color:red;
}

.notify{
	color:#0000ff;
	font-weight:bold;
}
</style>
<!-- chatbot script -->

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">

      <div class="logo">
 
      <nav id="navbar" class="navbar">
        <ul>
		
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
         <!-- <li><a href="#">&nbsp;</a></li> -->
         
        </ul>
       
      </nav><!-- .navbar -->
   </div>
 
    
	<!-- Running notification -->
	<marquee behavior="scroll" direction="left"><p class="notify">Password reset link will be sent to the registred email address and you can reset your password by clicking on the link</p></marquee>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between">
        <!-- <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out" >
	<img src="images/icon1.png" style="width:100px; height:85px;" alt="Sports"><img src="images/lion.png" style="width:100px; height:85px;" alt="Sports">
            <h1 style="font-size:20px;">Election Commission Of India<br> Legislative Assembly Election Portal</h1>
          </div>
        </div> -->
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
		<div class="card" style="width:130%;">
          <div class="card-body" ><br>
                       
					   <img src="cab1.jpg" style="width:40%; margin-left:10%; margin-bottom:1%;" alt="login">
                       <form action="" method="post">
					      <?php echo $msg; ?>
                            <input type="password" class="password" id="input2" name="password" placeholder="Enter Your Password" required>
                            <input type="password" id="input2" class="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                            <span class="error_form" id="captcha_message"></span>
                            <div class="g-recaptcha" data-sitekey="6LcC5BwlAAAAAAy4_Tl9nUCdPSFXv5m-Q_nl0PIw"></div>
							<button name="submit" class="btn" type="submit" id="submit">Change Password</button>
                        </form>
                        <div class="social-icons">
                            <p style="font-weight:bold;color:blue;">Back to! <a style="font-weight:bold;" href="login.php">Login</a>.</p>
                        </div>
                   </div></div>
				   
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

 
  <div id="preloader"></div>

  
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>


<script type="text/javascript">
 
  $(document).on('click','#submit',function()
  {  $("#captcha_message").hide();
	  var response = grecaptcha.getResponse();
	  if(response.length == 0)
	  {
		  $("#captcha_message").html("Please verify you are not a robot");
               $("#captcha_message").show();
		  return false;
	  }
	  else{
		  $("#captcha_message").hide();
		  return true;
	  }
  });
  
  
</script>

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

</body>

</html>
