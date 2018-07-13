<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>TPD File System</title>
	<meta charset="utf-8">
</head>
<body style="text-align: center;">

	<div id="frm">
			
	   </div>
	   <div style="background: #ffffcc; width: 50%; position: absolute;">
	   <p style="font-size: 30px;">Registration Login Panel</p>
	   
	   <p style="text-decoration: underline;">Note: You may need an Administrator to assist you in registration process</p>

<?php
$dbConnect = mysqli_connect("localhost", "root", "ak_94*jmv", "edpr");

if(isset($_POST['login'])){
	$username=$_POST['user'];
	$password=$_POST['pass'];

	$username=stripcslashes($username);
	$password=stripcslashes($password);

	$username=mysqli_real_escape_string($dbConnect, $username);
	$password=mysqli_real_escape_string($dbConnect, $password);

	
	$result=mysqli_query($dbConnect, "SELECT * FROM login WHERE Username='$username' AND Password='$password'") 
						or die("Failed to query the database".mysqli_error($dbConnect));
	$row=mysqli_fetch_array($result);
	
	if(isset($_POST['login']) && $username==''){
		echo "<p style='color: red; text-align: center;'>Login Error: Invalid Username or Password</p>";
	}
	elseif(isset($_POST['login']) && $password==''){
		echo "<p style='color: red; text-align: center;'>Login Error: Invalid Username or Password</p>";
	}
	elseif ($row['Username'] == $username && $row['Password'] == $password) {
		echo "<p style='color: green; text-align: center;'>Login Successfull! Welcome   ".$row['Username']."<a href='register.php'style='color: blue;'>Go"."</a>"."</p>";
		
	}else {
		echo "<p style='color: red; text-align: center;'>Login Error: Invalid Username or Password</p>";
	}
}
?>

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<div style="text-align: center;">
			<p>
				<label>Username:</label>
				<input type="text" name="user" id="user" style="width: 205px; height: 25px;"/>
			</p>

			<p>
				<label>Password:</label>
				<input type="password" name="pass" id="pass" style="width: 205px; height: 25px;"/>
			</p>
			<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="submit" name="login" id="btn" style="width: 150px; height: 30px;" value="Login" /><br><br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<a href="Index.php" style="color: blue;">Go Back</a>
			</p>
		</div>
		</form>

	</div>
	</div>

	<!--<footer style="background: black; height: 100px; border-radius: 15px;">
		<div style="color: #fff; text-align: center; padding: 20px;">
			All Rights © Designed 2017 by AmonKats The Computer Programmer (CP).<br>
			Contacts:   +256774572835 / +256701215120<br>
			Email:   amonkats94@gmail.com / amonkats94@outlook.com
		</div>-->

</footer>
</body>
</html>