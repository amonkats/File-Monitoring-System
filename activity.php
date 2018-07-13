<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
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

		include ("hor_nav2.php");

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

	$search_Query = "SELECT serialno, refno, file_origin, subject FROM andrew WHERE serialno='$search'";

    $search_result=mysqli_query($dbConnect, $search_Query);
    $row=mysqli_fetch_array($search_result);

?>

	<form name="frm" action="" method="post" enctype="">
		<!--Sending a file-->

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
	</script>

<br><br>

	<textarea type="text" required="required" cols="40" rows="6" placeholder="Action" name="assign" style="width: 342px; height: 97px;"></textarea><br><br>

	<span style="margin-left: -4px;">Due days:</span><input type="date" id="auto_Id" name="due_days" required="required" placeholder="Set due days" style="width: 220px; height: 40px;">

	<input type="submit" id="btn" onclick="return val()" name="createbtn" value="Send file" style="width: 185px; height: 45px;"><br>
	<?php
	if(isset($_POST['createbtn'])){
		
		include('insert_assignment.php');
	}
?>

	<br>File details<br>

	<!--file details-->
	<input type="text" name="fileno" required="required" placeholder="File No" value="<?php echo $row[0];?>" style="width: 220px; height: 40px;">

	<input type="text" name="refno" required="required" placeholder="Ref No" value="<?php echo $row[1];?>" style="width: 220px; height: 40px;"><br><br>


	<input type="text" name="origin" required="required" placeholder="Origin" value="<?php echo $row[2];?>" style="width: 220px; height: 40px;">

	<input type="text" name="subject" required="required" placeholder="Subject" value="<?php echo $row[3];?>" style="width: 220px; height: 40px;"><br><br>

	</form>

	<!--<textarea type="text" cols="40" rows="6" placeholder="Output Description" name="outdesc"></textarea><br>
	<textarea type="text" cols="40" rows="6" placeholder="Interim Output/Plan (Q1)" name="outputq1"></textarea><br>
	<textarea type="text" cols="40" rows="6" placeholder="Interim Output/Plan (Q2)" name="outputq2"></textarea><br>
	<textarea type="text" cols="40" rows="6" placeholder="Interim Output/Plan (Q3)" name="outputq3"></textarea><br>
	<textarea type="text" cols="40" rows="6" placeholder="Interim Output/Plan (Q4)" name="outputq4"></textarea><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<input type="submit" name="createbtn" value="Create" style="width: 150px; height: 40px;">

</form><br>-->


</body>
</html>