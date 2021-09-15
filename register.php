<?php
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="wrapper">
	<center><h2>Register Here</h2></center>
	<form class="myform" action="register.php" method="post">

		<label class="label">Username</label>
		<input type="text" class="inputvalues" name="username" placeholder="Enter your username" ><br><br>

		<label class="label">Password</label>
		<input type="password" class="inputvalues" name="password" placeholder="Enter your password" ><br><br>
		
		<label class="label">Confirm Password</label>
                <input type="password" class="inputvalues" name="cpassword" placeholder="Confirm your password" ><br><br>

		<input type="submit" name="signup" value="Register" id="register-btn"><br><br>

		<input type="submit" name="loginback" value="<< Back to login" id="loginback-btn">
	</form>
	<?php
	if(isset($_POST['loginback']))
	{
		header('location:login.php');
	}
	?>
	<?php
	if(isset($_POST['signup']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];

		if($password==$cpassword)
		{
			$query="select * from student where username='$username'";
			$query_run=mysqli_query($conn,$query);

			if(mysqli_num_rows($query_run)>0)
			{
				echo '<script type="text/javascript"> alert("user already exists...please  try another user name")</script>';
			}
			else
			{
				$query="insert into student values('$username', '$password')";
				$query_run=mysqli_query($conn,$query);

				if($query_run)
				{
                    echo '<script type="text/javascript"> alert("user registered successfully....please go to login page")</script>';
				}
				else
				{
                    echo '<script type="text/javascript"> alert("Error!")</script>';
				}
			}
			
		}
		else
		{
			echo '<script type="text/javascript"> alert("password and confirm password did not match")</script>';
		}
	}
	
	?>
</div>
</body>
</html>
