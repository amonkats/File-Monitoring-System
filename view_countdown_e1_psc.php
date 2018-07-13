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
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
	<style type="text/css">
		body{
			background: #fff;
		}
		.countdowncontainer{
			position: absolute;
			top: 85%;
			left: 50%;
			transform: translateX(-50%) translateY(-50%);
			text-align: center;
			background: #ddd;
			border: 1px solid black;
			padding: 5px;
			box-shadow: 0 0 5px 3px #ccc;
			height: 36%;
			width: 80%;
			color: black;
		}
		.info{
			font-size: 35px;
		}
		#countdown{
			
			
		}
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

		include ("hor_nav_e1_psc.php");

		if ($_SESSION['user'] == true) {
			echo "<i>You are logged in as "."<label style='text-decoration: underline;'><b>".$_SESSION['user']."</b></label></i>";
		}else{
			header("Location:Index.php");
		}

	 ?>
	 <br><br>

	<?php  
    $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');

	$countdownId = $_GET['countdownId'];

	$search_Query = "SELECT due_days FROM e1_psc_edpr WHERE serialno='$countdownId'";

    $search_result=mysqli_query($dbConnect, $search_Query);
    $row=mysqli_fetch_array($search_result);


  ?>

<section style="float: center; background: #142634; color: #fff;">

	<table class="countdowncontainer">
		<tr class="info">
			<td colspan="4" class="info">Assignment Countdown</td>
		<td><input type="text" id="putin" readonly="readonly" value="<?php echo $row[0];?>" placeholder="Set Date Format" style="width: 220px; height: 40px; text-align: center;">Due Date</td></tr>
		<tr class="info" id="countdown">

			<td id="days">12</td>
			<td id="hours">4</td>
			<td id="minutes">12</td>
			<td id="seconds">22</td>
		</tr>
		<tr>
			<td>Days remaining</td>
			<td>Hours</td>
			<td>Minutes</td>
			<td>Seconds</td>
		</tr>
	</table>

	<script type="text/javascript">
		
	function countdown(){
		var now = new Date();
		var due_date = document.getElementById("putin").value;
		//var due_date = strtotime('October 12, 2017, 06:43 PM');
		var eventDate = new Date(due_date);
//'October 20, 2017 22:28'
		var currentTime = now.getTime();
		var eventTime = eventDate.getTime();

		var remTime = eventTime - currentTime;

		var s = Math.floor(remTime / 1000);
		var m = Math.floor(s / 60);
		var h = Math.floor(m / 60);
		var d = Math.floor(h / 24);
		var timer;

		h %= 24;
		m %= 60;
		s %= 60;

		/*if(h < 10){
			h = "0" + h;
			}*/
		h = (h < 10) ? "0" + h : h;
		m = (m < 10) ? "0" + m : m;
		s = (s < 10) ? "0" + s : s;

		document.getElementById("days").textContent = d;
		document.getElementById("days").innerText = d;

		document.getElementById("hours").textContent = h;
		document.getElementById("minutes").textContent = m;
		document.getElementById("seconds").textContent = s;

		setTimeout(countdown, 1000);
		if (remTime <= 0) {
			clearInterval(timer);
			document.getElementById('countdown').innerHTML='<i style="color: red;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEXPIRED !</i>';
		}
		if (due_date == "") {
			clearInterval(timer);
			document.getElementById('countdown').innerHTML='<i style="color: red;">Date not set !</i>';
		}

	}

		countdown();
</script>

</section>
</body>
</html>