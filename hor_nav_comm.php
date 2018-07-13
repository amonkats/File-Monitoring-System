<!DOCTYPE html>
<html>
<head>
	<title>EDP&RD File Monitoring System</title>
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
		<li><a href="send_comm.php">Create File</a></li>
		<li><a href="inbox_comm.php">Inbox (
			<?php
			$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
			$qry_appr = "SELECT COUNT(*) FROM comm_edpr WHERE status ='Pending'";
			/*$qry_appr = "SELECT * FROM [comm_edpr], [ass_comm_edpr], [sec_edpr], [pe_psc_edpr], [se_psc_edpr], [e1_psc_edpr], [e2_psc_edpr], [e3_psc_edpr], [re1_psc_edpr], [re2_psc_edpr], [ra_psc_edpr], [se1_dpa_edpr], [se2_dpa_edpr], [e1_dpa_edpr], [e2_dpa_edpr], [re_dpa_edpr], [ra_dpa_edpr], [h_psdu_edpr], [sca_psdu_edpr], [mrp_psdu_edpr], [megd_psdu_edpr], [me_psdu_edpr], [sec_psdu_edpr], [se_mpa_edpr], [e1_mpa_edpr], [e2_mpa_edpr], [e3_mpa_edpr], [ge_mpa_edpr], [re_mpa_edpr]";*/
			$qry_data = mysqli_query($dbConnect, $qry_appr);
			$approve_count = mysqli_fetch_array($qry_data);
			$toatalCount = array_shift($approve_count);
			echo $toatalCount;
?>

		)</a></li>
		<li><a href="outbox_comm.php">Outbox (
			<?php
			$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
			$qry_appr = "SELECT COUNT(*) FROM outbox_comm";
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