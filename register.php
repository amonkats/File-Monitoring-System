<!DOCTYPE html>
<html>
<head>
	<title>EDPR File System</title>
</head>
<body style="text-align: center;">

<div style="text-align: center; background: #333; color: #fff; border-radius: 20px;">
<form name="formname" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" onsubmit="validate()">
	
	<b style="font-size: 20px;"><i>Registration in Progress...</i></b><br><br>
	<input type="text" name="user" placeholder="Username:" id="user" style="width: 205px; height: 25px;" required="required" value=""><br><br>

	<input type="password" name="pass" placeholder="Password:" id="pass" style="width: 205px; height: 25px;" required="required" value=""><br><br>

	<input type="password" name="pass2" placeholder="Confirm Password:" id="pass2" style="width: 205px; height: 25px;" required="required" value=""><br><br>
	<input type="submit" style="width: 150px; height: 30px;" name="registerbtn" value="Submit"><br>
	
	<?php

		if(isset($_POST['registerbtn']) && !empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['pass2'])){
			include("donereg.php");
		}

	?>

</form>
</div>

	<script  type="text/javascript">
	/*function matchPass(){
		var formPass = document.formname.pass.value;
		var formPass2 = document.formname.pass2.value;
		if (formPass != formPass2) {
				alert("Password Mismatch");
				return false;
		}
	}*/


   </script>
   <br>

<a href="Index.php" style="color: blue;">Go Back</a>

</body>
</html>