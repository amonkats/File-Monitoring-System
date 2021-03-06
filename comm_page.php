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
	<title>EDP&RD File Monitoring System</title>
	<style type="text/css">
	</style>
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body style="text-align: center;">

 <img src="images/arms.jpg">
	<p id="republic">THE REPUBLIC OF UGANDA</p>
	<h1>EDP&RD FILE MONITORING SYSTEM</h1>
	<h2>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h2>
	<h2>ECONOMIC DEVELOPMENT POLICY AND RESEARCH DEPARTMENT (EDP&RD)</h2>

	<?php 

		include ("hor_nav_comm.php");

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


	 	if (isset($_POST['btnsearch'])) {
	 		$valueToSearch = $_POST['valueToSearch'];
	 		$search_term =mysqli_real_escape_string($dbConnect, $_POST['valueToSearch']);
	 		

	 		$query = "SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM comm_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'"; 

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ass_comm_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM sec_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM pe_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e1_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e2_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e3_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re1_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re2_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ra_psc_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se1_dpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se2_dpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e1_dpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e2_dpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re_dpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ra_dpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM h_psdu_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM sca_psdu_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM mrp_psdu_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM megd_psdu_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM me_psdu_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM sec_psdu_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se_mpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e1_mpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e2_mpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e3_mpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ge_mpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";

	 		$query .= "UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re_mpa_edpr WHERE CONCAT(`serialno`, `refno`, `file_origin`, `subject`, `sender`, `receiver`, `action`, `due_days`, `forward`, `date_sent`, `status`, `delete_file`) LIKE '%".$search_term."%'";
	 		


	 		$search_result = filterTable($query);
	 		$search_item = test_input($_POST['valueToSearch']);
	 	}

	 else{
	 		$query = "SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM comm_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ass_comm_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM sec_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM pe_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e1_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e2_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e3_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re1_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re2_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ra_psc_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se1_dpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se2_dpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e1_dpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e2_dpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re_dpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ra_dpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM h_psdu_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM sca_psdu_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM mrp_psdu_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM megd_psdu_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM me_psdu_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM sec_psdu_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM se_mpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e1_mpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e2_mpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM e3_mpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM ge_mpa_edpr UNION SELECT serialno, refno, file_origin, subject, sender, receiver, action, due_days, forward, date_sent, status, delete_file FROM re_mpa_edpr";


	 		$search_result = filterTable($query);
	 	}

	 	$query = mysqli_query($dbConnect, $query) or die(mysqli_error($dbConnect));

	 	function filterTable($query){
	 		 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
	 		 $filter_result = mysqli_query($dbConnect, $query);
	 		 return $filter_result;
	 	}
	 	
	 ?>
		<form name="search_box" action="" method="POST">
		<input type="text" value="<?php echo $search_item ?>" placeholder="Search for the file.." name="valueToSearch" id="valueToSearch" style="width: 220px; height: 25px;"/> 
		<input type="submit" style="width: 100px; height: 30px;" name="btnsearch" value="Search" />
		<input type="submit" style="width: 100px; height: 30px;" name="btnreset" value="Refresh" />				
	</form>



	<section style="">
	<table cellpadding="10" border="1" style="border: 3px solid #ddd; border-collapse: collapse; overflow: hidden; overflow-y: scroll; text-align: left; width: 1500px; font-family: 'Trebuchet MS', 'Arial', 'Helvetica', sans-serif;" align="center">

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
			<th>Forward</th>
			<th>Date sent</th>
			<th>Status</th>
			<th>Delete File</th>
	
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
			<td style="text-align: center;"><?php echo $row1[6];?></td>

				<?php
				if ($row1[7] == 'none') {?>
				<td style="text-align: center;"><?php echo $row1[7];?>


				<?php }
			
			else{
				?>
				<td style="text-align: center;"><?php echo $row1[7];?> | <a href="view_countdown_comm.php?countdownId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>View</i></a>

			<?php }?>

				
			</td>

			<td><a href="activity_comm.php?searchId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><?php echo $row1[8];?></a></td>

			<td><?php echo $row1[9];?></td>

			<?php
			if ($row1[10] == 'Done') {?>
				<td><?php echo $row1[10];?> | <a href="update_assign_comm.php?updateId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>Update </i></td>

				<?php }?>
			<?php 
			if($row1[10] == 'Pending'){?>
				<td><b><label style="color: red"><?php echo $row1[10];?></label></b> | <a href="update_assign_comm.php?updateId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>Update</i></a></td>

				<?php }?>

				<td><a href="comm_delete.php?searchId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><?php echo $row1[11];?></a></td>

			

		</tr>
		
		<?php endwhile;?>
		<?php mysqli_close($dbConnect);?>
	</table>
	<?php
	
	 	?>
</section>			
</body>
</html>