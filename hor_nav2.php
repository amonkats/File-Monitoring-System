<!DOCTYPE html>
<html>
<head>
	<title>TPD File System</title>
	<style type="text/css">
		ul{
			list-style-type: none;
			margin: 0px;
			padding: 0;
			overflow: hidden;
			background-color: #333;
			text-align: center;
			border-radius: 10px;
		}
		li{
			float: left;
			padding-right: 260px;
		}
		li a{
			display: inline-block;
			color: white;
			text-align: center;
			padding: 18px 20px;
			text-decoration: none;
		}
		/*a:active{
			color: #4CAF50;
		}*/
		li a:hover:not(.active){
			background-color: #4CAF50;
			
		}
		

	</style>
</head>
<body>
<div id="nav">
	<ul>
		<li><a href="send2.php">Create File</a></li>
		<li><a href="assignments2.php">Inbox (
			<?php
			$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
			$qry_appr = "SELECT COUNT(*) FROM e1_psc_edpr WHERE status_one ='Pending'";
			$qry_data = mysqli_query($dbConnect, $qry_appr);
			$approve_count = mysqli_fetch_array($qry_data);
			$toatalCount = array_shift($approve_count);
			echo $toatalCount;
?>

		)</a></li>
		<li><a href="View_Sentfiles2.php">Outbox (
			<?php
			$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
			$qry_appr = "SELECT COUNT(*) FROM outbox_e1_psc";
			$qry_data = mysqli_query($dbConnect, $qry_appr);
			$approve_count = mysqli_fetch_array($qry_data);
			$toatalCount = array_shift($approve_count);
			echo $toatalCount;
?>

		)</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</div>
	<?php
		//require 'keeptrack.php';

	?>

</body>
</html>