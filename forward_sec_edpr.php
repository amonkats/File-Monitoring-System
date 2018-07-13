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

		include ("hor_nav_sec_edpr.php");

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

	$searchId = $_GET['searchId'];
	$search = htmlspecialchars($searchId, ENT_QUOTES, 'UTF-8');

	$search_Query = "SELECT serialno, refno, file_origin, subject FROM sec_edpr WHERE serialno='$search'";

    $search_result=mysqli_query($dbConnect, $search_Query);
    $row=mysqli_fetch_array($search_result);


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

		<?php


   		if ($_POST['receiver'] == 'Ag. C/EDP&RD') {
   			include 'sent_files_comm.php';
   		}

   		if ($_POST['receiver'] == 'Ag. AC/EDP&RD') {
   			include 'sent_files_ass_comm.php';
   		}

   		if ($_POST['receiver'] == 'PE/PSC') {
   			include 'sent_files_pe_psc.php';
   		}

   		if ($_POST['receiver'] == 'SE/PSC') {
   			include 'sent_files_se_psc.php';
   		}

   		if ($_POST['receiver'] == 'E1/PSC') {
   			include 'sent_files_e1_psc.php';
   		}

   		if ($_POST['receiver'] == 'E2/PSC') {
   			include 'sent_files_e2_psc.php';
   		}

   		if ($_POST['receiver'] == 'E3/PSC') {
   			include 'sent_files_e3_psc.php';
   		}

   		if ($_POST['receiver'] == 'RE1/PSC') {
   			include 'sent_files_re1_psc.php';
   		}

   		if ($_POST['receiver'] == 'RE2/PSC') {
   			include 'sent_files_re2_psc.php';
   		}

   		if ($_POST['receiver'] == 'RA/PSC') {
   			include 'sent_files_ra_psc.php';
   		}

   		if ($_POST['receiver'] == 'SE1/DPA') {
   			include 'sent_files_se1_dpa.php';
   		}

   		if ($_POST['receiver'] == 'SE2/DPA') {
   			include 'sent_files_se2_dpa.php';
   		}

   		if ($_POST['receiver'] == 'E1/DPA') {
   			include 'sent_files_e1_dpa.php';
   		}

   		if ($_POST['receiver'] == 'E2/DPA') {
   			include 'sent_files_e2_dpa.php';
   		}

   		if ($_POST['receiver'] == 'RE/DPA') {
   			include 'sent_files_re_dpa.php';
   		}

   		if ($_POST['receiver'] == 'RA/DPA') {
   			include 'sent_files_ra_dpa.php';
   		}

   		if ($_POST['receiver'] == 'H/PSDU') {
   			include 'sent_files_h_psdu.php';
   		}

   		if ($_POST['receiver'] == 'SCA/PSDU') {
   			include 'sent_files_sca_psdu.php';
   		}

   		if ($_POST['receiver'] == 'MRP/PSDU') {
   			include 'sent_files_mrp_psdu.php';
   		}

   		if ($_POST['receiver'] == 'MEGD/PSDU') {
   			include 'sent_files_megd_psdu.php';
   		}


		?>
	 	
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