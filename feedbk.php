<!DOCTYPE html>
<html>
<head>
	<title>Feedback Form</title>

<style>
    /* Style for the form container */
form {
  width: 60%;
  margin: auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Style for the form labels */
label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

/* Style for the form input fields */
input[type=text],
input[type=email],
select,
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

/* Style for the rating drop-down list */
select[name=rating] {
  margin-bottom: 20px;
}

/* Style for the referral radio buttons */
input[type=radio] {
  margin-right: 5px;
}

/* Style for the form submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px;
  cursor: pointer;
}

/* Style for the form submit button on hover */
input[type=submit]:hover {
  background-color: #45a049;
}

</style>   
</head>
<body>
    
	<h2>Feedback Form</h2>
	<form method="POST" action="#">
		<label>Name:</label><br>
		<input type="text" name="name" required><br>
		<label>Email:</label><br>
		<input type="email" name="email" required><br>
		<label>Feedback:</label><br>
		<textarea name="feedback" required></textarea><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>




<?php
include("dbcon.php");
if (isset($_POST["submit"])) {
$name = $_POST['name'];
$user_name = $_POST['email'];
$feedback = $_POST['feedback'];
$sql = "INSERT INTO `feedback`(`id`, `name`, `user_name`, `feedback`)  VALUES ( 'DEFAULT', '$name', '$user_name', '$feedback')";
$result = $conn->query($sql);
if($result)
{
echo "<script> alert ('Thank you Feedback!!!');window.location='login.php'</script>";
}
}

?>
