<?php
  
        
      session_start();
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;

    
      require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
      require 'vendor/phpmailer/phpmailer/src/Exception.php';
      require 'vendor/phpmailer/phpmailer/src/SMTP.php';


      
      require("./config.php");
      //Load Composer's autoloader
      require 'vendor/autoload.php';
      $msg = "";
  if(isset($_SESSION['userdata'])){
    header("location: index.php");
  }
  
else {
      include ('user.php'); 
      $errors=array();
      $message="";
      
    if (isset($_POST['submit']))
    {
        $username = isset($_POST['username'])?$_POST['username']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        $password2 = isset($_POST['password2'])?$_POST['password2']:'';
        $email = isset($_POST['email'])?$_POST['email']:'';
        $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
        date_default_timezone_set('asia/kolkata');
        $datetime = date("Y-m-d h:i");
        $code = mysqli_real_escape_string($conn, md5(rand()));

        if ($password != $password2) {
            $errors="Password Should be Same";
        }
        echo "<div style='display: none;'>";
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
          $mail->Body    = 'Here is the verification link <b><a href="http://localhost/gocab/login.php?verification='.$code.'">http://localhost/gocab/login.php?verification='.$code.'</a></b>';
  
          $mail->send();
          echo 'Message has been sent';
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    echo "</div>";

    $user = new user();
		$dbcon = new dbcon();
		$show=$user->register($username,$password,$password2,$email,$mobile,$datetime,$code,$dbcon->conn);
   

    }
    include('header.php');
    include('navh.php'); 
 ?>

<body>
	<style>
    .alert-danger {
    color: #e4e9f0;
    font-weight:bold;
    background-color: #f90505;
    border-color: #ffbacf;
    max-width:600px;
}
.alert-info {
    color: #e4e9f0;
    font-weight:bold;
    background-color: #09a92e;
    border-color: #b8f2fc;
max-width:600px;
}
    </style>
    <div id="bg" class="pt-2 pb-2">
    <h1 class="text-center mt-lg-5 pt-lg-5 mt-sm-0 pt-sm-0 font-weight-bold">Go<span class="gree">Cab</span></h1>

    <section class="container-fluid box col-lg-10 col-sm-10 col-xs-12 col-md-7  pt-lg-4 mt-lg-4 pt-sm-0 mt-sm-0 mb-5 pb-3 pt-2">
      <div class="text-center">
        <?php echo $msg; ?>
        <h4 class="font-weight-bold">Register Here</h4>
      </div>
        <form action="register.php" method="post">

            <div class="form-group  row feilds ">
                <label class="col-sm-2">NAME</label>
                <input name="username" for="username" type="text" pattern="^[a-zA-Z_]+( [a-zA-Z_]+)*$" class="form-control-plaintext col-sm-10 arro" id="username" placeholder="Enter your name" required>
            </div>

            <div class="form-group  row feilds ">
              <label class="col-sm-2"  for="password">PASSWORD</label>
              <input type="password" name="password" class="form-control-plaintext col-sm-10 arro" id="password" placeholder="Enter Password" required>
          </div>
         
          <div class="form-group  row feilds ">
            <label class="col-sm-2"  for="password2">RE-PASSWORD</label>
            <input type="password" name="password2" class="form-control-plaintext col-sm-10 arro" id="password2" placeholder="Re-Enter Password" required>
            
         </div>
         <p id="pas" class="bg-danger text-center">password should be same</p>
    
        <div class="form-group  row feilds ">
        <label class="col-sm-2">E-MAIL</label>
            <input name="email" for="email" type="email" class="form-control-plaintext col-sm-10 arro" id="email" placeholder="Enter your E-mail" required>
        </div>
      
        <div class="form-group  row feilds ">
        <label class="col-sm-2">MOBILE</label>
            <input name="mobile" for="mobile" type="text" class="form-control-plaintext col-sm-10 arro" maxlength="10" minlength="10" id="mobile"  placeholder="Enter your Mobile Number" required>
        </div>
      
            <div class="form-group ">
                <input type="submit" class="btn green btn-primary btn-lg btn-block" id="register" name="submit" value="Register">
            </div>
        </form>
    </div>
    </section>
  </div>
		
	
<?php include('footer.php'); }?>