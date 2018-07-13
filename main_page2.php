<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
	tr:nth-child(even){
		background-color: #f2f2f2;
	}
	tr:hover{
		background-color: #333;
		color: #fff;
		border: 1px solid #fff;
	}
	table a, table a:visited{
		width: 100%;
		height: 100%;
		background: #fff;
		color: #000;
}
table a:hover{
		color: #fff; 
}
</style>
	<title>EDPR File System</title>
	<style type="text/css">
		

	</style>
</head>
<body style="text-align: center;">

 <img src="images/arms.jpg">
	<p id="republic">THE REPUBLIC OF UGANDA</p>
	<h1>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h1>
	<h2>ECONOMIC DEVELOPMENT POLICY AND RESEARCH (EDPR)</h2>

	<?php 

		include ("hor_nav2.php");

		if ($_SESSION['user'] == true) {
			echo "<i>You are logged in as "."<label style='text-decoration: underline;'><b>".$_SESSION['user']."</b></label></i>";
		}else{
			header("Location:Index.php");
		}

	 ?>
	 <br><br>

	 <?php


	  $search_item = "";
	 function test_input($keepData) {
	  $keepData = trim($keepData);
	  $keepData = stripslashes($keepData);
	  $keepData = htmlspecialchars($keepData);
	  //$keepData = basename($keepData);
	  return $keepData;
	}

	 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
	 	$sql = "SELECT * FROM e1_psc_edpr";
	 	if (isset($_POST['btnsearch'])) {
	 		$search_term =mysqli_real_escape_string($dbConnect, $_POST['valueToSearch']);
	 		$sql .= "WHERE ref_no = '{$search_term}'";
	 		$sql .= "OR serialno = '{$search_term}'";
	 		$search_item = test_input($_POST['valueToSearch']);
	 	}

	 	if(isset($_POST['btnsearch']) && empty($_POST['valueToSearch'])){
	 		echo "<script type='text/javascript'>
		 window.alert('Fill in item to Search, Otherwise Refresh');</script>"; 
	 	}

	 	$query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
	 	
	 ?>
		<form name="search_box" action="assignments2.php" method="POST">
		<input type="text" value="<?php echo $search_item ?>" placeholder="Search for Ref No or File Origin.." name="valueToSearch" id="searchedValue" style="width: 220px; height: 25px;"/> 
		<input type="submit" style="width: 100px; height: 30px;" name="btnsearch" value="Search" />
		<input type="submit" style="width: 100px; height: 30px;" name="btnreset" value="Refresh" />				
	</form>
	<!--<div id='d1'></div>
	<script type="text/javascript">
		function searchValue(){
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","search_assign.php?nm="+document.getElementById("searchedValue").value,false);
			xmlhttp.send(null);
			document.getElementById('d1').innerHTML=xmlhttp.responseText;
		}
	</script>-->


	<section style="">
	<table cellpadding="10" border="1" style="border: 3px solid #ddd; border-collapse: collapse; overflow: hidden; overflow-y: scroll; text-align: left; width: 1460px; font-family: 'Trebuchet MS', 'Arial', 'Helvetica', sans-serif;" align="center">

		<!--<a href="Main_Page.php" style="color: blue;">Go To Home</a>-->
		
		<tr style="background: #4CAF50; color: #fff; height: 50px; font-size: 20px; text-align: center;">	
			<th>Serial No.</th>
			<th>Ref No</th>
			<th>File Origin</th>
			<th>Subject</th>
			<th>From</th>
			<th>To</th>
			<th>Action</th>
			<th>Due Days</th>
			<th>Status</th>
			<th>Forward</th>
			<th>Date sent</th>
			<th>Status</th>
	
		</tr>
	 <?php
		  
			while($row1=mysqli_fetch_array($query)):;?>
					
		<tr>
			<td style="height: 40px;"><?php echo $row1[0];?></td>
			<td><?php echo $row1[1];?></td>
			<td><?php echo $row1[2];?></td>
			<td><?php echo $row1[3];?></td>
			<td style="text-align: center;"><?php echo $row1[4];?></td>
			<td><?php echo $row1[5];?></td>
			<td><?php echo $row1[6];?></td>
			<td><?php echo $row1[7];?><!--  | <a href="view_countdown.php?countdownId=<?php //echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>View</i></a>-->
			</td>

			<?php
			if ($row1[8] == 'Done') {?>
				<td><?php echo $row1[8];?> | <a href="update_assign.php?updateId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>Update </i></td>

				<?php }?>
			<?php 
			if($row1[8] == 'Pending'){?>
				<td><b><label style="color: red"><?php echo $row1[8];?></label></b> | <a href="update_assign.php?updateId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>Update</i></a></td>

				<td><a href="activity.php?searchId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><?php echo $row1[9];?></a></td>
				<td><?php echo $row1[10];?></td>
				<td><?php echo $row1[11];?></td>

			<?php }?>

		</tr>
		
		<?php endwhile;?>
		<?php mysqli_close($dbConnect);?>
	</table>
	<?php
	if (isset($_POST['btnsearch']) && $_POST['valueToSearch'] == ''){
	 		echo"<label style='color: red;'>No data for this Search! Refresh</label>";
	 		$search_item = test_input($_POST['valueToSearch']);
	 	}
	 	?>
</section>			
</body>
</html>