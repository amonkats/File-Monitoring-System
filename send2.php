<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>EDPR File System</title>
	<style type="text/css">
		

	</style>
</head>
<body style="text-align: center;">

 <img src="images/arms.jpg">
	<p id="republic">THE REPUBLIC OF UGANDA</p>
	<h1>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h1>
	<h2>ECONOMIC DEVELOPMENT POLICY AND RESEARCH (EDPR)</h2>
		<!--<h3>TAX POLICY DEPARTMENT FILE SYSTEM (TPDFS)</h3>-->
<?php 

		include ("hor_nav.php");

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
	  

		<label><b>Send a file From here:</b></label><br>
		<!--&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="file" required="required" name="path"><br><br>-->

	 <select name="sender" id="senderid" required="required" style="width: 220px; height: 40px;">
	 	<option name="from">From..</option>
	 	<option>Ag.C/EDP&RD</option>
	 	<option>Ag.C/EDP&RD</option>
	 	<option>SEC/EDP&RD </option>
	 </select>

	<select id="deliver" name="receiver" required="required" class="headings" style="width: 220px; height: 40px;">
		<?php
			$sql = "SELECT titles FROM edpr_members";
			$result = mysqli_query($dbConnect, $sql);
			while ($row1 = mysqli_fetch_array($result)):;?>
			<option value="<?php echo $row1[0];?>">
				<?php echo $row1[0];?>
			</option>
		<?php endwhile;?>
	 	
	 </select>

	 <script type="text/javascript">
	 	function val(){
	 		var s1 = document.getElementById("senderid").value;
	 		var s2 = document.getElementById("deliver").value;

	 		if (s1 == "From..") {
	 			alert("Please select sender");
	 			return false;
	 		}

	 		else if (s2 == "To..") {
	 			alert("Please select receiver");
	 			return false;
	 		}

	 		else if (s2 == "Private Sector Competitiveness  (PSC)  Section") {
	 			alert("Please select receiver");
	 			return false;
	 		}

	 		else if (s2 == "Development Policy Analysis (DPA) Section") {
	 			alert("Please select receiver");
	 			return false;
	 		}
	 		

	 		else if (s2 == "Private Sector Development Unit  (PSDU)") {
	 			alert("Please select receiver");
	 			return false;
	 		}

	 		else if (s2 == "Micro Policy Analysis (MPA) Section") {
	 			alert("Please select receiver");
	 			return false;
	 		}
	 		else
	 			return true;
		}

		else if (s2 == "E1/PSC") {	</script>
				<?php
					if(isset($_POST['sendbtn']) && ($_POST["origin"]) !='' && ($_POST["subject"])!=''){
				include("Send_Files.php");
			}
				?>
			<script type="text/javascript">}

	</script><br><br>

		<input type="text" onkeydown="upperCaseF(this)" name="refno" placeholder="Reference No." style="width: 205px; height: 30px;"><br><br>

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
		<input type="submit"  style="width: 150px; height: 35px;" name="sendbtn" value="Send File">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br><br>
		
    </form>

   </section>
   <?php 
			?>
  <!--<a href="Main_Page.php" style="color: blue;">Go Back</a>-->

</body>
</html>