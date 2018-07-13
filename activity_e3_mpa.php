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
<meta charset="utf-8">
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

		include ("hor_nav_e3_mpa.php");

		if ($_SESSION['user'] == true) {
			echo "<i>You are logged in as "."<label style='text-decoration: underline;'><b>".$_SESSION['user']."</b></label></i>";
		}else{
			header("Location:Index.php");
		}

	 ?>
	 <br><br>


<section style=" background: #142634; color: #fff;"><br>
Sending file in progress....

<script type="text/javascript">
	
	//var due_date = document.getElementById("auto_Id").value;

</script>

	<?php

	$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');

	//$due_days = "";
	/*$date = strtotime("October 20 2017");
	$remaining = $date - time();
	$days_remaining = floor($remaining / 86400);
	//$hours_remaining = floor(($remaining % 86400) /(86400) / (3600));
	//echo "There are $days_remaining day(s) remaining";
	if($remaining <= 0){
		echo "Expired";
	}else{echo "There are $days_remaining day(s) remaining";}*/

	$searchId = $_GET['searchId'];
	$search = htmlspecialchars($searchId, ENT_QUOTES, 'UTF-8');

	$search_Query = "SELECT serialno, refno, file_origin, subject FROM e3_mpa_edpr WHERE serialno='$search'";

    $search_result=mysqli_query($dbConnect, $search_Query);
    $row=mysqli_fetch_array($search_result);

?>

	<form name="frm" action="" method="post" enctype="">
		<!--Sending a file-->

	<select name="sender" id="senderid" required="required" style="width: 220px; height: 40px;">
	 	<option name="from">From..</option>
	 	<option>E3/MPA</option>
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


		//Top bosses
		if ($_POST['receiver'] == 'Ag. C/EDP&RD') {
   			include 'sent_files_e3_mpa_comm.php';
   		}

   		if ($_POST['receiver'] == 'Ag. AC/EDP&RD') {
   			include 'sent_files_e3_mpa_ass_comm.php';
   		}

   		if ($_POST['receiver'] == 'SEC/EDP&RD ') {
   			include 'sent_files_e3_mpa_sec_edpr.php';
   		}


   		//Private Sector Competitiveness  (PSC)  Section
   		if ($_POST['receiver'] == 'PE/PSC') {
   			include 'sent_files_e3_mpa_pe_psc.php';
   		}

   		if ($_POST['receiver'] == 'SE/PSC') {
   			include 'sent_files_e3_mpa_se_psc.php';
   		}

   		if ($_POST['receiver'] == 'E1/PSC') {
   			include 'sent_files_e3_mpa_e1_psc.php';
   		}

   		if ($_POST['receiver'] == 'E2/PSC') {
   			include 'sent_files_e3_mpa_e2_psc.php';
   		}

   		if ($_POST['receiver'] == 'E3/PSC') {
   			include 'sent_files_e3_mpa_e3_psc.php';
   		}

   		if ($_POST['receiver'] == 'RE1/PSC') {
   			include 'sent_files_e3_mpa_re1_psc.php';
   		}

   		if ($_POST['receiver'] == 'RE2/PSC') {
   			include 'sent_files_e3_mpa_re2_psc.php';
   		}

   		if ($_POST['receiver'] == 'RA/PSC') {
   			include 'sent_files_e3_mpa_ra_psc.php';
   		}


   		//Development Policy Analysis (DPA) Section
   		if ($_POST['receiver'] == 'SE1/DPA') {
   			include 'sent_files_e3_mpa_se1_dpa.php';
   		}

   		if ($_POST['receiver'] == 'SE2/DPA') {
   			include 'sent_files_e3_mpa_se2_dpa.php';
   		}

   		if ($_POST['receiver'] == 'E1/DPA') {
   			include 'sent_files_e3_mpa_e1_dpa.php';
   		}

   		if ($_POST['receiver'] == 'E2/DPA') {
   			include 'sent_files_e3_mpa_e2_dpa.php';
   		}

   		if ($_POST['receiver'] == 'RE/DPA') {
   			include 'sent_files_e3_mpa_re_dpa.php';
   		}

   		if ($_POST['receiver'] == 'RA/DPA') {
   			include 'sent_files_e3_mpa_ra_dpa.php';
   		}


   		//Micro Policy Analysis (MPA) Section
   		if ($_POST['receiver'] == 'SE/MPA') {
   			include 'sent_files_e3_mpa_se_mpa.php';
   		}

   		if ($_POST['receiver'] == 'E1/MPA') {
   			include 'sent_files_e3_mpa_e1_mpa.php';
   		}

   		if ($_POST['receiver'] == 'E2/MPA') {
   			include 'sent_files_e3_mpa_e2_mpa.php';
   		}

   		if ($_POST['receiver'] == 'E3/MPA') {
   			echo "<script type='text/javascript'>
   				window.alert('Cannot send a file to yourself');</script>
   			";
   		}

   		if ($_POST['receiver'] == 'GE/MPA') {
   			include 'sent_files_e3_mpa_ge_mpa.php';
   		}

   		if ($_POST['receiver'] == 'RE/MPA') {
   			include 'sent_files_e3_mpa_re_mpa.php';
   		}


   		//Private Sector Development Unit  (PSDU)
   		if ($_POST['receiver'] == 'H/PSDU') {
   			include 'sent_files_e3_mpa_h_psdu.php';
   		}

   		if ($_POST['receiver'] == 'SCA/PSDU') {
   			include 'sent_files_e3_mpa_sca_psdu.php';
   		}

   		if ($_POST['receiver'] == 'MRP/PSDU') {
   			include 'sent_files_e3_mpa_mrp_psdu.php';
   		}

   		if ($_POST['receiver'] == 'MEGD/PSDU') {
   			include 'sent_files_e3_mpa_megd_psdu.php';
   		}

   		if ($_POST['receiver'] == 'M&E/PSDU') {
   			include 'sent_files_e3_mpa_me_psdu.php';
   		}

   		if ($_POST['receiver'] == 'SEC/PSDU') {
   			include 'sent_files_e3_mpa_sec_psdu.php';
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
	</script>

<br><br>

	<textarea type="text" cols="40" rows="6" placeholder="Action (Optional)" name="action" style="width: 342px; height: 97px;"></textarea><br><br>

	<span style="margin-left: -4px;">Due days:</span><input type="date" id="auto_Id" name="due_days" placeholder="Set due days" style="width: 220px; height: 40px;">

	<input type="submit" id="btn" onclick="return val()" name="createbtn" value="Send file" style="width: 185px; height: 45px;"><br>
	<?php
	/*if(isset($_POST['createbtn'])){
		
		include('insert_assignment.php');
	}*/
?>

	<br>File details<br>

	<!--file details-->
	<input type="text" name="fileno" required onkeypress="return false;" placeholder="File No" value="<?php echo $row[0];?>" style="width: 220px; height: 40px;">

	<input type="text" name="refno" required onkeypress="return false;" placeholder="Ref No" value="<?php echo $row[1];?>" style="width: 220px; height: 40px;"><br><br>


	<input type="text" name="origin" required onkeypress="return false;" placeholder="Origin" value="<?php echo $row[2];?>" style="width: 220px; height: 40px;">

	<input type="text" name="subject" required onkeypress="return false;" placeholder="Subject" value="<?php echo $row[3];?>" style="width: 220px; height: 40px;"><br><br>

	</form>

</body>
</html>