<?php
 include ('config.php'); 

      session_start();

      if (isset($_GET['verification'])) {
        
            $sql = "UPDATE user SET code='' WHERE code='{$_GET['verification']}'";
            $result = $conn->query($sql);
            if($result){
              echo '<p class="bg-success text-center">Account verification has been successfully completed.</p>';
               
               }
       } 
    
if(isset($_SESSION['userdata'])){
  header("location: index.php");
}

else {
	  include ('user.php'); 
	  $errors = array();
      $message = '';

	  if (isset($_POST['submit']))
	  {
		  $user_name = isset($_POST['email'])?$_POST['email']:'';
		  $password = isset($_POST['password'])?$_POST['password']:'';

		  $user = new user();
		  $dbcon = new dbcon();
		  $show=$user->login($user_name,$password,$dbcon->conn);
        }

		include('header.php'); 
    include('navh.php'); 
 ?>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      </head>
<body>
<style>
  .error_form
{
  top: 12px;
  color: rgb(216, 15, 15);
    font-size: 15px;
  font-weight:bold;
    font-family: Helvetica;
}
  </style>
	<div id="wrapper">

	<div id="bg" class="pt-2 pb-2">
    <h1 class="text-center mt-lg-5 pt-lg-5 mt-sm-0 pt-sm-0 font-weight-bold">Go<span class="gree">Cab</span></h1>

    <section class="container-fluid box col-lg-10 col-sm-10 col-xs-12 col-md-7  pt-lg-4 mt-lg-4 pt-sm-0 mt-sm-0 mb-5 pb-3 pt-2">
    <div class="text-center">
        <h4 class="font-weight-bold">Login Here</h4>
      </div>
        <form action="login.php" method="post">

		<div class="form-group  row feilds ">
        <label class="col-sm-2">E-MAIL</label>
            <input name="email" for="email" type="email" class="form-control-plaintext col-sm-10 arro" id="email" placeholder="Enter your E-mail" <?php if(isset($_COOKIE['email'])) { echo 'value="'.$_COOKIE['email'].'"'; } ?>required>
		</div>
		
		<div class="form-group  row feilds ">
              <label class="col-sm-2"  for="password">PASSWORD</label>
              <input type="password" name="password" class="form-control-plaintext col-sm-10 arro" id="password" placeholder="Enter Password" required>
		  </div>
      
		  <span class="error_form" id="captcha_message"></span>
              <div class="g-recaptcha" data-sitekey="6LcC5BwlAAAAAAy4_Tl9nUCdPSFXv5m-Q_nl0PIw"></div>
             
		  <div class="form-group ">
                <input type="submit" id="submit" class="btn green btn-primary btn-lg btn-block" id="login" name="submit" value="Login">
            </div>
            <div >
              <label ><p> Forgot password ? <a href="reset_psw.php"> click me </a></p></label>
              
		  </div>
        </form>
    </div>
    </section>
  </div>
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

    <?php include('footer.php');
  
  if(isset($_SESSION['book'])){
  if(time()-$_SESSION["time"] >120)   
    { 
        unset($_SESSION['book']);
    } }
    } ?>