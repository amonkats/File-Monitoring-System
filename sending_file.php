<!DOCTYPE html>
<html>
<head>
	<title>EDP&RD File Monitoring System</title>
</head>
<body style="text-align: center;">

	<?php

	 $from="";
	 $title="";
	 $to="";
	 $title2="";
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

/*if (htmlspecialchars($_SERVER["REQUEST_METHOD"] == "POST")) {
		/*if (isset($_POST['recordbtn']) && empty($_POST["photo"])) {
			$photoErr = "Photo required";
    		
 	} else{
  		 $photo = test_input($_FILES['photo']['tmp_name']);
 	 }*/
 		/* if (isset($_POST['sendbtn']) && empty($_POST["sender"])) {
    		$fromerr = "required";
 	} else{
  		 $from = test_input($_POST["sender"]);
 	 }
 	 	 if (isset($_POST['sendbtn']) && empty($_POST["title"])) {
    		$titleerr = "required";
 	}else{
  		 $title = test_input($_POST["title"]);
 	 }

 	    if (isset($_POST['sendbtn']) && empty($_POST["reciever"])) {
    		$toerr = "required";
 	}else{
  		 $to = test_input($_POST["reciever"]);
 	 }

 	   if (isset($_POST['sendbtn']) && empty($_POST["title2"])) {
 	 	$title2err = "required";
    		
 	}else{
 		$title2 = test_input($_POST['title2']);
 	}
 }*/

?>

	<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="">
	    <img src="images/arms.jpg">
	    <p>THE REPUBLIC OF UGANDA</p>
  	    <h2>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h2>
		<h3>TAX POLICY DEPARTMENT FILE SYSTEM (TPDFS)</h3>
		<!--<h3>TAX POLICY DEPARTMENT FILE SYSTEM (TPDFS)</h3>-->
		<label><b>Send a file From here:</b></label><br>
		<!--&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="file" required="required" name="path"><br><br>-->

		<input type="text" name="filename" placeholder="File Name:" style="width: 205px; height: 25px;" required="required" value="<?php echo $from ?>"><!--<span style="color: #FF0000;">* <?php //echo $fromerr;?></span>-->	<br><br>

		<!--Sender-->
		<input type="text" name="sender" placeholder="From:" style="width: 205px; height: 25px;" required="required" value="<?php echo $from ?>"><!--<span style="color: #FF0000;">* <?php //echo $fromerr;?></span>-->	<br><br>
	
		<!--Designation-->
		<input type="text" name="title" placeholder="Designation" style="width: 205px; height: 25px;" required="required" value="<?php echo $title ?>"><!--<span style="color: #FF0000;">* <?php //echo $titleerr;?></span>--><br><br>
		
		<!--Reciever-->
		<input type="text" name="reciever" placeholder="To:" style="width: 205px; height: 25px;" required="required" value="<?php echo $to ?>"><!--<span style="color: #FF0000;">* <?php //echo $toerr;?></span>--><br><br>
		
		<!--Designation-->
		<input type="text" name="title2" placeholder="Designation" style="width: 205px; height: 25px;" required="required" value="<?php echo $title2 ?>"><!--<span style="color: #FF0000;">* <?php //echo $title2err;?></span>--><br><br>
		

		&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="submit"  style="width: 150px; height: 30px;" name="sendbtn" value="Send File">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="Emergency_Files.php" style="color: blue;"><!--<br><br> Upload Accessible Files</a>--><br>
		<?php if(isset($_POST['sendbtn']) && ($_POST["sender"]) !='' && ($_POST["title"])!='' && ($_POST["reciever"])!='' && ($_POST["title2"])!=''){
				include("Send_Files.php");
			}
			?>

  </form><br>

  <a href="Secretary_Records.php" style="color: blue;">Go Back</a>

</body>
</html>