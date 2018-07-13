<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>EDP&RD File Monitoring System</title>
	<!--<style type="text/css">

		input[type=text]{
		border: 2px solid #aaa;
		border-radius: 4px;
		margin: 8px 0;
		outline: none;
		padding: 8px;
		box-sizing: border-box;
	}
	input[type=text]:focus{
		border-color: dodgerBlue;
		box-shadow: 0 0 8px 0 dodgerBlue;
		transition: .3s;
	}
	input[type=password]{
		border: 2px solid #aaa;
		border-radius: 4px;
		margin: 8px 0;
		outline: none;
		padding: 8px;
		box-sizing: border-box;
	}
	input[type=text]:focus{
		border-color: dodgerBlue;
		box-shadow: 0 0 8px 0 dodgerBlue;
		transition: .3s;
	}

	</style>-->
</head>
<body style="text-align: center;">

 <img src="images/arms.jpg">
	<p id="republic">THE REPUBLIC OF UGANDA</p>
	
	<h1>EDP&RD FILE MONITORING SYSTEM</h1>
	<h2>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h2>
	<h2>ECONOMIC DEVELOPMENT POLICY AND RESEARCH DEPARTMENT (EDP&RD)</h2>
		<!--<h3>TAX POLICY DEPARTMENT FILE SYSTEM (TPDFS)</h3>-->		
	   </div>

	   <div style="text-align: center; background: #142634; color: #fff; border-radius: 20px;">
	   <p style="font-size: 30px;">Login</p>

<?php
//session_start();
$dbConnect = mysqli_connect("localhost", "root", "ak_94*jmv", "edpr");

if(isset($_POST['login'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$_SESSION['user'] = $username;
	$_SESSION['pass'] = $password;
	$_SESSION['last_time'] = time();


	

	//$Password = SHA($_POST['pass']);

	$username=stripcslashes($_SESSION['user']);
	$password=stripcslashes($_SESSION['pass']);

	$username=mysqli_real_escape_string($dbConnect, $username);
	$password=mysqli_real_escape_string($dbConnect, $password);
	$password2=sha1($password);

	
	$result=mysqli_query($dbConnect, "SELECT * FROM register WHERE Username='$username' AND Password= '$password2'") 
						or die("Failed to query the database".mysqli_error($dbConnect));
	$row=mysqli_fetch_array($result);

	//$Password_db = $row['Password'];
	
	if(isset($_POST['login']) && $username==''){
		echo "<p style='color: red; text-align: center;'>Login Error: Invalid Username or Password</p>";
	}
	elseif(isset($_POST['login']) && $password==''){
		echo "<p style='color: red; text-align: center;'>Login Error: Invalid Username or Password</p>";
	}
	
	elseif ($row['Username'] == 'enyimu joseph' && $row['Password'] == $password2) {
		header("Location:inbox_comm.php");
		header("Location:send_comm.php");
		header("Location:outbox_comm.php");
		header("Location:activity_comm.php");
		header("Location:search_edit.php");
		header("Location:view_countdown.php");
		header("Location:update_assign_comm.php");
		header("Location:comm_page.php");
}

	elseif ($row['Username'] == 'byamukama godfrey' && $row['Password'] == $password2) {
		header("Location:inbox_ass_comm.php");
		header("Location:send_ass_comm.php");
		header("Location:outbox_ass_comm.php");
		header("Location:activity_ass_comm.php");
		header("Location:search_edit_ass_comm.php");
		header("Location:view_countdown_ass_comm.php");
		header("Location:update_assign_ass_comm.php");
		header("Location:ass_comm_page.php");
}

	elseif ($row['Username'] == 'rose kansiime' && $row['Password'] == $password2) {
		header("Location:inbox_sec_edpr.php");
		header("Location:send_sec_edpr.php");
		header("Location:outbox_sec_edpr.php");
		header("Location:activity_sec_edpr.php");
		header("Location:search_edit_sec_edpr.php");
		header("Location:view_countdown_sec_edpr.php");
		header("Location:update_assign_sec_edpr.php");
		header("Location:sec_edpr_page.php");
}

		elseif ($row['Username'] == 'washeba passy' && $row['Password'] == $password2) {
		header("Location:inbox_pe_psc.php");
		header("Location:send_pe_psc.php");
		header("Location:outbox_pe_psc.php");
		header("Location:activity_pe_psc.php");
		header("Location:search_edit.php");
		header("Location:view_countdown_pe_psc.php");
		header("Location:update_assign_pe_psc.php");
		header("Location:pe_psc_page.php");
}

	elseif ($row['Username'] == 'kibahiganira james' && $row['Password'] == $password2) {
		header("Location:inbox_se_psc.php");
		header("Location:send_se_psc.php");
		header("Location:outbox_se_psc.php");
		header("Location:activity_se_psc.php");
		header("Location:search_edit_se_psc.php");
		header("Location:view_countdown_se_psc.php");
		header("Location:update_assign_se_psc.php");
		header("Location:se_psc_page.php");
}

		elseif ($row['Username'] == 'asasira andrew' && $row['Password'] == $password2) {
		header("Location:inbox_e1_psc.php");
		header("Location:send_e1_psc.php");
		header("Location:outbox_e1_psc.php");
		header("Location:activity_e1_psc.php");
		header("Location:search_edit_e1_psc.php");
		header("Location:view_countdown_e1_psc.php");
		header("Location:update_assign_e1_psc.php");
		header("Location:e1_psc_page.php");
}

		elseif ($row['Username'] == 'nimungu bridget' && $row['Password'] == $password2) {
		header("Location:inbox_e2_psc.php");
		header("Location:send_e2_psc.php");
		header("Location:outbox_e2_psc.php");
		header("Location:activity_e2_psc.php");
		header("Location:search_edit_e2_psc.php");
		header("Location:view_countdown_e2_psc.php");
		header("Location:update_assign_e2_psc.php");
		header("Location:e2_psc_page.php");
}

		elseif ($row['Username'] == 'mutamba sylvia' && $row['Password'] == $password2) {
		header("Location:inbox_e3_psc.php");
		header("Location:send_e3_psc.php");
		header("Location:outbox_e3_psc.php");
		header("Location:activity_e3_psc.php");
		header("Location:search_edit_e3_psc.php");
		header("Location:view_countdown_e3_psc.php");
		header("Location:update_assign_e3_psc.php");
		header("Location:e3_psc_page.php");
}

	elseif ($row['Username'] == 'alado tonia' && $row['Password'] == $password2) {
		header("Location:inbox_re1_psc.php");
		header("Location:send_re1_psc.php");
		header("Location:outbox_re1_psc.php");
		header("Location:activity_re1_psc.php");
		header("Location:search_edit_re1_psc.php");
		header("Location:view_countdown_re1_psc.php");
		header("Location:update_assign_re1_psc.php");
		header("Location:re1_psc_page.php");
}

	elseif ($row['Username'] == 'ssemuyaga emmanuel' && $row['Password'] == $password2) {
		header("Location:inbox_re2_psc.php");
		header("Location:send_re2_psc.php");
		header("Location:outbox_re2_psc.php");
		header("Location:activity_re2_psc.php");
		header("Location:search_edit_re2_psc.php");
		header("Location:view_countdown_re2_psc.php");
		header("Location:update_assign_re2_psc.php");
		header("Location:re2_psc_page.php");
}

	elseif ($row['Username'] == 'muhanguzi arthur' && $row['Password'] == $password2) {
		header("Location:inbox_ra_psc.php");
		header("Location:send_ra_psc.php");
		header("Location:outbox_ra_psc.php");
		header("Location:activity_ra_psc.php");
		header("Location:search_edit_ra_psc.php");
		header("Location:view_countdown_ra_psc.php");
		header("Location:update_assign_ra_psc.php");
		header("Location:ra_psc_page.php");
}

	elseif ($row['Username'] == 'ndyomugabi calyst' && $row['Password'] == $password2) {
		header("Location:inbox_se1_dpa.php");
		header("Location:send_se1_dpa.php");
		header("Location:outbox_se1_dpa.php");
		header("Location:activity_se1_dpa.php");
		header("Location:search_edit_se1_dpa.php");
		header("Location:view_countdown_se1_dpa.php");
		header("Location:update_assign_se1_dpa.php");
		header("Location:se1_dpa_page.php");
}

	elseif ($row['Username'] == 'nuwamanya sheila' && $row['Password'] == $password2) {
		header("Location:inbox_se2_dpa.php");
		header("Location:send_se2_dpa.php");
		header("Location:outbox_se2_dpa.php");
		header("Location:activity_se2_dpa.php");
		header("Location:search_edit_se2_dpa.php");
		header("Location:view_countdown_se2_dpa.php");
		header("Location:update_assign_se2_dpa.php");
		header("Location:se2_dpa_page.php");
}

		elseif ($row['Username'] == 'mukisa muhammad' && $row['Password'] == $password2) {
		header("Location:inbox_e1_dpa.php");
		header("Location:send_e1_dpa.php");
		header("Location:outbox_e1_dpa.php");
		header("Location:activity_e1_dpa.php");
		header("Location:search_edit_e1_dpa.php");
		header("Location:view_countdown_e1_dpa.php");
		header("Location:update_assign_e1_dpa.php");
		header("Location:e1_dpa_page.php");
}

		elseif ($row['Username'] == 'matsiko robert' && $row['Password'] == $password2) {
		header("Location:inbox_e2_dpa.php");
		header("Location:send_e2_dpa.php");
		header("Location:outbox_e2_dpa.php");
		header("Location:activity_e2_dpa.php");
		header("Location:search_edit_e2_dpa.php");
		header("Location:view_countdown_e2_dpa.php");
		header("Location:update_assign_e2_dpa.php");
		header("Location:e2_dpa_page.php");
}

		elseif ($row['Username'] == 'tulisanyuka esther' && $row['Password'] == $password2) {
		header("Location:inbox_re_dpa.php");
		header("Location:send_re_dpa.php");
		header("Location:outbox_re_dpa.php");
		header("Location:activity_re_dpa.php");
		header("Location:search_edit_re_dpa.php");
		header("Location:view_countdown_re_dpa.php");
		header("Location:update_assign_re_dpa.php");
		header("Location:re_dpa_page.php");
}

		elseif ($row['Username'] == 'kwehayo nicholas' && $row['Password'] == $password2) {
		header("Location:inbox_ra_dpa.php");
		header("Location:send_ra_dpa.php");
		header("Location:outbox_ra_dpa.php");
		header("Location:activity_ra_dpa.php");
		header("Location:search_edit_ra_dpa.php");
		header("Location:view_countdown_ra_dpa.php");
		header("Location:update_assign_ra_dpa.php");
		header("Location:ra_dpa_page.php");
}

		elseif ($row['Username'] == 'abemigisha gadson' && $row['Password'] == $password2) {
		header("Location:inbox_se_mpa.php");
		header("Location:send_se_mpa.php");
		header("Location:outbox_se_mpa.php");
		header("Location:activity_se_mpa.php");
		header("Location:search_edit_se_mpa.php");
		header("Location:view_countdown_se_mpa.php");
		header("Location:update_assign_se_mpa.php");
		header("Location:se_mpa_page.php");
}

		elseif ($row['Username'] == 'donald mbuga' && $row['Password'] == $password2) {
		header("Location:inbox_e1_mpa.php");
		header("Location:send_e1_mpa.php");
		header("Location:outbox_e1_mpa.php");
		header("Location:activity_e1_mpa.php");
		header("Location:search_edit_e1_mpa.php");
		header("Location:view_countdown_e1_mpa.php");
		header("Location:update_assign_e1_mpa.php");
		header("Location:e1_mpa_page.php");
}

		elseif ($row['Username'] == 'nakabiri sandrah' && $row['Password'] == $password2) {
		header("Location:inbox_e2_mpa.php");
		header("Location:send_e2_mpa.php");
		header("Location:outbox_e2_mpa.php");
		header("Location:activity_e2_mpa.php");
		header("Location:search_edit_e2_mpa.php");
		header("Location:view_countdown_e2_mpa.php");
		header("Location:update_assign_e2_mpa.php");
		header("Location:e2_mpa_page.php");
}

		elseif ($row['Username'] == 'mulumba kassim' && $row['Password'] == $password2) {
		header("Location:inbox_e3_mpa.php");
		header("Location:send_e3_mpa.php");
		header("Location:outbox_e3_mpa.php");
		header("Location:activity_e3_mpa.php");
		header("Location:search_edit_e3_mpa.php");
		header("Location:view_countdown_e3_mpa.php");
		header("Location:update_assign_e3_mpa.php");
		header("Location:e3_mpa_page.php");
}

		elseif ($row['Username'] == 'bbosa david' && $row['Password'] == $password2) {
		header("Location:inbox_ge_mpa.php");
		header("Location:send_ge_mpa.php");
		header("Location:outbox_ge_mpa.php");
		header("Location:activity_ge_mpa.php");
		header("Location:search_edit_ge_mpa.php");
		header("Location:view_countdown_ge_mpa.php");
		header("Location:update_assign_ge_mpa.php");
		header("Location:ge_mpa_page.php");
}

		elseif ($row['Username'] == 'muhangi evarist' && $row['Password'] == $password2) {
		header("Location:inbox_re_mpa.php");
		header("Location:send_re_mpa.php");
		header("Location:outbox_re_mpa.php");
		header("Location:activity_re_mpa.php");
		header("Location:search_edit_re_mpa.php");
		header("Location:view_countdown_re_mpa.php");
		header("Location:update_assign_re_mpa.php");
		header("Location:re_mpa_page.php");
}

		elseif ($row['Username'] == 'ngategize peter' && $row['Password'] == $password2) {
		header("Location:inbox_h_psdu.php");
		header("Location:send_h_psdu.php");
		header("Location:outbox_h_psdu.php");
		header("Location:activity_h_psdu.php");
		header("Location:search_edit_h_psdu.php");
		header("Location:view_countdown_h_psdu.php");
		header("Location:update_assign_h_psdu.php");
		header("Location:h_psdu_page.php");
}

	    elseif ($row['Username'] == 'robert paul' && $row['Password'] == $password2) {
		header("Location:inbox_sca_psdu.php");
		header("Location:send_sca_psdu.php");
		header("Location:outbox_sca_psdu.php");
		header("Location:activity_sca_psdu.php");
		header("Location:search_edit_sca_psdu.php");
		header("Location:view_countdown_sca_psdu.php");
		header("Location:update_assign_sca_psdu.php");
		header("Location:sca_psdu_page.php");
}

		elseif ($row['Username'] == 'nambooze anna' && $row['Password'] == $password2) {
		header("Location:inbox_mrp_psdu.php");
		header("Location:send_mrp_psdu.php");
		header("Location:outbox_mrp_psdu.php");
		header("Location:activity_mrp_psdu.php");
		header("Location:search_edit_mrp_psdu.php");
		header("Location:view_countdown_mrp_psdu.php");
		header("Location:update_assign_mrp_psdu.php");
		header("Location:mrp_psdu_page.php");
}

		elseif ($row['Username'] == 'mubiru richard' && $row['Password'] == $password2) {
		header("Location:inbox_megd_psdu.php");
		header("Location:send_megd_psdu.php");
		header("Location:outbox_megd_psdu.php");
		header("Location:activity_megd_psdu.php");
		header("Location:search_edit_megd_psdu.php");
		header("Location:view_countdown_megd_psdu.php");
		header("Location:update_assign_megd_psdu.php");
		header("Location:megd_psdu_page.php");
}

		elseif ($row['Username'] == 'sarah kabasinguzi' && $row['Password'] == $password2) {
		header("Location:inbox_me_psdu.php");
		header("Location:send_me_psdu.php");
		header("Location:outbox_me_psdu.php");
		header("Location:activity_me_psdu.php");
		header("Location:search_edit_me_psdu.php");
		header("Location:view_countdown_me_psdu.php");
		header("Location:update_assign_me_psdu.php");
		header("Location:me_psdu_page.php");
}

		elseif ($row['Username'] == 'hellen twodo' && $row['Password'] == $password2) {
		header("Location:inbox_sec_psdu.php");
		header("Location:send_sec_psdu.php");
		header("Location:outbox_sec_psdu.php");
		header("Location:activity_sec_psdu.php");
		header("Location:search_edit_sec_psdu.php");
		header("Location:view_countdown_sec_psdu.php");
		header("Location:update_assign_sec_psdu.php");
		header("Location:sec_psdu_page.php");
}

	
	else {
		echo "<p style='color: red; text-align: center;'>Login Error: Invalid Username or Password</p>";
	}
}
?>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
		<div style="text-align: center;">
			<p>
				<label>Username:</label>
				<input type="text" placeholder="Username" name="user" id="user" style="width: 205px; height: 25px"/>
			</p>

			<p>
				<label>Password:</label>
				<input type="password" placeholder="Password" name="pass" id="pass" style="width: 205px; height: 25px"/>
			</p>
			<p>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<input type="submit" name="login" id="btn" value="Login" style="width: 150px; height: 30px;" />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<br><br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAre you registered?&nbsp&nbsp&nbsp<a href="registration.php" style="color: #fff;">Register</a>
			</p>
		</div>

		</form>

	</div>
	</div>
	</body>

	<!--<footer style="background: black; height: 100px; border-radius: 15px;">
		<div style="color: #fff; text-align: center; padding: 20px;">
			All Rights © Designed 2017 by AmonKats The Computer Programmer (CP).<br>
			Contacts:   +256774572835 / +256701215120<br>
			Email:   amonkats94@gmail.com / amonkats94@outlook.com
		</div>

</footer>-->
</body>
</html>