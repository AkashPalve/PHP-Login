<?php
require 'dbconnect.php';
session_start();
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="wrapper">
	<center><h2>Login Here</h2></center>
	<form class="myform" action="login.php" method="post">

		<label class="label">Username</label>
		<input type="text" class="inputvalues" name="username" placeholder="Enter your username"><br><br>

		<label class="label">Password</label>
		<input type="password" class="inputvalues" name="password" placeholder="Enter your password"><br><br>

		<input type="submit" name="login" value="Login" id="login-btn">

		<p>Don't have an account?</p><input type="submit" value="Register" id="register-btn" name="reg">
	</form>
	
    <?php
      if(isset($_POST['login']))
	  {
		  $username=$_POST['username'];
		  $password=$_POST['password'];

		  $query="select * from student where username='$username' AND password='$password'";

		  $query_run=mysqli_query($conn,$query);

		  if(mysqli_num_rows($query_run)>0)
		  {
			  $_SESSION['username']=$username;
			  header('location:home.php');
		  }
		  else
		  {
			echo '<script type="text/javascript"> alert("Invalid Credentials...")</script>';
		  }
	  }
	  
	?>
	<?php
	if(isset($_POST['reg']))
	header('location:register.php');
	?>
	
</div>
</body>
</html>