<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div id="wrapper">
	<center><h2>Welcome <?php echo $_SESSION['username'];?></h2></center>
	<form class="myform" action="home.php" method="post">
		<input type="submit" name="logout" value="Logout" id="logout-btn">
	</form>

	<?php
     if(isset($_POST['logout']))
	 {
		 session_destroy();
		 header('location:login.php');
	 }
	?>
</div>
</body>
</html>