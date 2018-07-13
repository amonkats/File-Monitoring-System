<?php
	session_start();
	if (isset($_SESSION['user'])) {
		if ((time() - $_SESSION['last_time']) > 1200) {
			header("location:logout.php");
		}else{
			$_SESSION['last_time'] = time();
		}
	}else{
		header("Location:Index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>EDP&RD File Monitoring System</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
</head>
<body style="text-align: center;">

 <img src="images/arms.jpg">
	<p id="republic">THE REPUBLIC OF UGANDA</p>
	<h1>EDP&RD FILE MONITORING SYSTEM</h1>
	<h2>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h2>
	<h2>ECONOMIC DEVELOPMENT POLICY AND RESEARCH DEPARTMENT (EDP&RD)</h2>
		<!--<h3>TAX POLICY DEPARTMENT FILE SYSTEM (TPDFS)</h3>-->
<?php 

		include ("hor_nav_se_psc.php");

		if ($_SESSION['user'] == true) {
			echo "<i>You are logged in as "."<label style='text-decoration: underline;'><b>".$_SESSION['user']."</b></label></i>";
		}else{
			header("Location:Index.php");
		}

	 ?>
	 <br><br>


<section style="background: #142634; color: #fff;"><br>

	<?php

	$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');

	$updateId = $_GET['updateId'];

	$search_Query = "SELECT serialno, file_origin, subject, status FROM se_psc_edpr WHERE serialno='$updateId'";

    $search_result=mysqli_query($dbConnect, $search_Query);
    $row=mysqli_fetch_array($search_result);

?>

	<form action="" method="post">
				
	 <input type="text" name="serialno" required onkeypress="return false;" placeholder="serialno" value="<?php echo $row[0];?>" style="width: 220px; height: 40px;">

	 <input type="text" name="origin" required onkeypress="return false;" placeholder="Origin" value="<?php echo $row[1];?>" style="width: 220px; height: 40px;"><br><br>

	 <input type="text" name="subject" required onkeypress="return false;" placeholder="Subject" value="<?php echo $row[2];?>" style="width: 220px; height: 40px;">

	 <select name="status" required onkeypress="return false;" placeholder="Status" value="<?php echo $row[3];?>" style="width: 220px; height: 40px;">

	 	
	 	<option>Done</option>
	 </select><br><br>

	 <!--<input type="text" name="status" required="required" placeholder="Status" value="<?php //echo $row[3];?>" style="width: 220px; height: 40px;"><br><br>-->

	 <input type="submit" name="updatebtn" value="Update" style="width: 185px; height: 45px;"><br><br>

	</form>

	<?php
	if(isset($_POST['updatebtn'])){
		include('edit_se_psc.php');
	}
?>

</section>
</body>
</html>