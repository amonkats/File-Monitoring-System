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
	<style type="text/css">
		

	</style>
</head>
<body style="text-align: center;">

 <img src="images/arms.jpg">
	<p id="republic">THE REPUBLIC OF UGANDA</p>
	<h1>EDP&RD FILE MONITORING SYSTEM</h1>
	<h2>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h2>
	<h2>ECONOMIC DEVELOPMENT POLICY AND RESEARCH DEPARTMENT (EDP&RD)</h2>
		<!--<h3>TAX POLICY DEPARTMENT FILE SYSTEM (TPDFS)</h3>-->
<?php 

		include ("hor_nav_e3_psc.php");

		if ($_SESSION['user'] == true) {
			echo "<i>You are logged in as "."<label style='text-decoration: underline;'><b>".$_SESSION['user']."</b></label></i>";
		}else{
			header("Location:Index.php");
		}

	 ?>
	 <br><br>

	 <?php

	 $from="";
	 $title="";
	 $to="";
	 $title2="";
	 $actn="";
	 /*$from="";
	 $title="";
	 $to="";
	 $title2="";*/
	  

	 //Errors
	 $fromerr="";
	 $titleerr="";
	 $toerr="";
	 $title2err="";
	 /*$fromErr="";
	 $titleErr="";
	 $toErr="";
	 $title2Err="";*/
	

function test_input($keepData) {
  $keepData = trim($keepData);
  $keepData = stripslashes($keepData);
  $keepData = htmlspecialchars($keepData);
  $keepData = basename($keepData);
  return $keepData;
}


?>
	<script type="text/javascript">
		
		function upperCaseF(a){
		    setTimeout(function(){
		        a.value = a.value.toUpperCase();
		    }, 1);
}



	</script>

<section style=" background: #142634; color: #fff;">
	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="">
	  

		<label><b>Create a file From here:</b></label><br> <br>

		<input type="text" onkeydown="upperCaseF(this)" name="refno" placeholder="Reference No. (Optional)" style="width: 205px; height: 30px;"><br><br>

		<!--<input type="number" name="fileno" placeholder="Serial No." style="width: 205px; height: 30px;" required="required"><br><br>-->


		<textarea type="text" rows="5" cols="28" name="origin" placeholder="Origin:" style="width: 255px; height: 90px;" required="required"></textarea>

		<!--Sender-->
		<textarea type="text" rows="5" cols="28" name="subject" placeholder="Subject:" style="width: 255px; height: 90px;" required="required"></textarea><br><br>
	
		<!--Designation-->
		
		
		<!--Reciever-->
		<!--<input type="text" name="reciever" placeholder="To:" style="width: 205px; height: 25px;" required="required" value="<?php //echo $to ?>"><span style="color: #FF0000;">* <?php //echo $toerr;?></span>-->
		
		<!--Designation-->
		<!--<input type="text" name="title2" placeholder="Designation" style="width: 205px; height: 25px;" required="required" value="<?php //echo $title2 ?>"><span style="color: #FF0000;">* <?php //echo $title2err;?></span>-->

		<!--Action-->
		<!--<textarea type="text" rows="5" cols="28" name="actn" placeholder="Action (if any)" required="required" value="<?php //echo $actn ?>"></textarea><br><br>-->
		

		&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit"  style="width: 150px; height: 35px;" name="sendbtn" value="Create File">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br><br>
		
    </form>

   </section>
   <?php 

   		if(isset($_POST['sendbtn'])){
   			echo "<script type='text/javascript'>
   			window.alert('Access Denied !');</script>
   			";
   		}
	?>
  <!--<a href="Main_Page.php" style="color: blue;">Go Back</a>-->

</body>
</html>