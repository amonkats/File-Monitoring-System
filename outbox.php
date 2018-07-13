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
		border: 1px solid #fff;
		color: #fff;
	}
	table a, table a:visited{
		display: block;
		width: 95%;
		height: 100%;
		background: #fff;
		color: #000;
}
table a:hover{
		color: #fff; 
}


	</style>
	
	<title>EDPR File System</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
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

	 
	 $search_item = "";
	 function test_input($keepData) {
	  $keepData = trim($keepData);
	  $keepData = stripslashes($keepData);
	  $keepData = htmlspecialchars($keepData);
	  //$keepData = basename($keepData);
	  return $keepData;
}

	 	 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
	 	$sql = "SELECT * FROM sent_files ";
	 	if (isset($_POST['btnsearch'])) {
	 		$search_term =mysqli_real_escape_string($dbConnect, $_POST['valueToSearch']);
	 		$sql .= "WHERE ref_no = '{$search_term}'";
	 		$sql .= "OR serialno = '{$search_term}'";
	 		$search_item = test_input($_POST['valueToSearch']);
	 	}


	 	/*if (isset($_POST['btnsearch']) && $_POST['valueToSearch'] != '$sql'){
	 		echo"<label style='color: red;'>No data for this Search</label>";
	 		$search_item = test_input($_POST['valueToSearch']);
	 	}*/

	 	if(isset($_POST['btnsearch']) && empty($_POST['valueToSearch'])){
	 		echo "<script type='text/javascript'>
		 window.alert('Fill in item to Search, Otherwise Refresh');</script>"; 
	 	}

	 	$query = mysqli_query($dbConnect, $sql) or die(mysqli_error($dbConnect));
	 	
	 ?>
<form name="search_box" action="View_Sentfiles.php" method="POST">
		<input type="text" placeholder="Search for Ref No or File Origin.." name="valueToSearch" value="<?php echo $search_item ?>" id="searchedValue" style="width: 220px; height: 25px;"/> 
		<input type="submit" style="width: 100px; height: 30px;" name="btnsearch" value="Search" />
		<input type="submit" style="width: 100px; height: 30px;" name="btnreset" value="Refresh" />		
	 
	</form>
	</script>
	<!--<div id='d1'></div>
	<script type="text/javascript">
		onkeyup="searchValue();"
		
		function searchValue(){
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","search.php?nm="+document.getElementById("searchedValue").value,false);
			xmlhttp.send(null);
			document.getElementById('d1').innerHTML=xmlhttp.responseText;
		}
	</script>-->

<section style="">
	<table cellpadding="10" border="1" style="border: 3px solid #ddd; border-collapse: collapse; overflow: hidden; overflow-y: scroll; text-align: left; width: 1450px; font-family: 'Trebuchet MS', 'Arial', 'Helvetica', sans-serif;" align="center">
	<!--<div style="background-color:"><h2>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h2><p>
	 <h3>ECONOMIC DEVELOPMENT POLICY AND RESEARCH (EDPR)</h3>-->

		<!--<h3>TAX POLICY DEPARTMENT FILE SYSTEM (TPDFS)</h3</p></div>>-->
		<!--<a href="Main_Page.php" style="color: blue;">Go To Home</a>-->

		<tr style="background: #4CAF50; color: #fff; height: 50px; font-size: 20px; text-align: center;">		
		
			<th>Serial No.</th>
			<th>Ref No.</th>
			<th>File Origin</th>
			<th>Subject</th>
			<th>Date Sent</th>
			<th>forward</th>
			<th>Status</th>
			
		</tr>
			
		<?php	

	function getPosts(){
		$posts=array();
		$posts[2]=$_POST['ref_no'];
		$posts[7]=$_POST['status'];
	
	return $posts;
}

		  /* $dbConnect = mysqli_connect('localhost', 'root', '', 'edpr');

		  $sql="SELECT * FROM sent_files";
		  		
	      $query=mysqli_query($dbConnect, $sql);*/
			while($row1=mysqli_fetch_array($query)):;?>
					
		<tr>
			<td style="height: 35px;"><?php echo $row1[0];?></td>
			<td><?php echo $row1[1];?></td>
			<td><?php echo $row1[2];?></td>
			<td><?php echo $row1[3];?></td>
			<td><?php echo $row1[4];?></td>
			<td><a href="activity.php?searchId=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><?php echo $row1[5];?></a></td>
			<?php
			if ($row1[6] == 'forwarded') {?>
				<td><?php echo $row1[6];?> | <a class="style2" href="search_edit.php?edit=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>Update </i></td>

				<?php }?>
			<?php 
			if($row1[6] == 'Pending'){?>
				<td><b><label style="color: red"><?php echo $row1[6];?></label></b> | <a href="search_edit.php?edit=<?php echo $row1[0];?>" style="color: blue; text-decoration: none;"><i>Update </i></td>
			<?php }?>
			
		</tr>
		
		<?php endwhile;?>
		<?php mysqli_close($dbConnect);
		?>
	</table><br>

		<?php

	 	if (isset($_POST['btnsearch']) && $_POST['valueToSearch'] == ''){
	 		echo"<label style='color: red;'>No data for this Search! Refresh</label>";
	 		$search_item = test_input($_POST['valueToSearch']);
	 	}

	 	?>
	<!--<a href="printfileholders.php" style="color: blue;" target="_blank">Print Preview</a>-->
</section>

</body>
</html>
