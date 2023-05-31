
<?php

session_start();


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include('./config.php');
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE user_name='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE user SET code='{$code}' WHERE user_name='{$email}'");

        if ($query) {        
            echo "<div style='display: none;'>";
            //Create an instance; passing true enables exceptions
            $mail = new PHPMailer(true);
             try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'cabbooking05@gmail.com';                      //SMTP username
          $mail->Password   = 'khmypqqamoduenuexx';                               //SMTP password
          $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
          $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
  
          //Recipients
          $mail->setFrom('cabbooking05@gmail.com');
          $mail->addAddress($email);
  
          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'no reply';
          $mail->Body    = 'Here is the verification link <b><a href="http://localhost/gocab/changepassword.php?reset='.$code.'">http://localhost/gocab/changepassword.php?reset='.$code.'</a></b>';  
          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
          



            echo "</div>";        
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
    }
}
















?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Reset password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
  

  
  <!-- =======================================================
  * Template Name: Bootslander - v4.9.1
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <style>
/* Header styles */
#header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  background-color: rgba(255, 255, 255, 0.8);
  z-index: 9999;
}

#header .logo {
  margin: 10px;
}

.nav-link.scrollto {
  display: inline-block;
  border: none;
  background-color: #28a745;
  color: #43ec6a;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: bold;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.nav-link.scrollto:hover {
  background-color: #218838;
}



.blink p:hover {
  background-color: #0069d9;
}




#header #navbar ul {
  display: flex;
  justify-content: flex-end;
  list-style: none;
}

#header #navbar li {
  margin: 10px;
}

#header #navbar a {
  display: block;
  padding: 10px;
  color: blue;
  text-decoration: none;
  font-size: 16px;
}

#header #navbar a:hover {
  text-decoration: underline;
}

/* Hero section styles */
#hero {
  background-color: #f8f9fa;
  padding: 100px 0;
}

#hero .hero-img {
  display: flex;
  justify-content: center;
  align-items: center;
}

#hero .card {
  background-color: white;
  box-shadow: 0px 0px 10px rgb(196 15 15);
  border-radius: 5px;
}

#hero form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
}

#hero .email {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  border: 2px solid #ccc;
  font-size: 16px;
}

#hero .btn {
  background-color: blue;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

#hero .btn:hover {
  background-color: darkblue;
}

#hero .social-icons {
  margin-top: 20px;
}

#hero .social-icons a {
  color: blue;
  text-decoration: none;
  margin-right: 10px;
  font-size: 16px;
}

#hero .social-icons a:hover {
  text-decoration: underline;
}

/* Running notification styles */
.notify {
  margin: 0;
  font-size: 16px;
  font-weight: bold;
  color: blue;
  padding: 10px;
}

@media (max-width: 768px) {
  #header .logo {
    margin: 10px 0;
  }

  #header #navbar ul {
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
  }

  #header #navbar li {
    margin: 10px 0;
  }
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
     
         
        </ul>
       
      </nav><!-- .navbar -->
   
 </div>
    
  <!-- Running notification -->
  <marquee behavior="scroll" direction="left"><p class="notify">Password reset link will be sent to the registred email address and you can reset your password by clicking on the link</p></marquee>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">


        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
    <div class="card" style="width:130%;">
          <div class="card-body" style="width:40%; margin:auto;"><br>
                       
             <div class="blink">
  <p id=""><center><h1>Reset Password</h1></center></p>
</div><br>
                        <form action="" id="login_form"  method="post">
            <?php echo $msg; ?>
                            <input type="email" id="input2" class="email" name="email" placeholder="Enter Your Email" required>
              <span class="error_form" id="captcha_message"></span>
              <div class="g-recaptcha" data-sitekey="6LcC5BwlAAAAAAy4_Tl9nUCdPSFXv5m-Q_nl0PIw"></div>
                            <button name="submit" class="btn" id="submit" type="submit">Send Reset Link</button>
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