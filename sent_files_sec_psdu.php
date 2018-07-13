<?php
	 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');

	 $sender = $_POST['sender'];
	 $receiver = $_POST['receiver'];
	 $action = $_POST['action'];
	 $due_days = $_POST['due_days'];
	 $refno = $_POST['refno'];
	 $origin = $_POST['origin'];
	 $subject = $_POST['subject'];
	 //$fileno = $_POST['fileno'];

	 //Escape Apostrophe
	 $sender2 = mysqli_escape_string($dbConnect, $sender);
	 $receiver2 = mysqli_escape_string($dbConnect, $receiver);
	 $action2 = mysqli_escape_string($dbConnect, $action);
	 $due_days2 = mysqli_escape_string($dbConnect, $due_days);
	 $refno2 = mysqli_escape_string($dbConnect, $refno);
	 $origin2 = mysqli_escape_string($dbConnect, $origin);
	 $subject2 = mysqli_escape_string($dbConnect, $subject);
	 //$fileno2 = mysqli_escape_string($dbConnect, $fileno);


	 $date = date('F j, Y  g:i a, l');
	 $rand = rand();
	

    	/*if ($_GET['status'] == '[Pending]') {
				echo "<tr style='background-color: #00FF00;'>"."</tr>";
			}*/

	 if ($action2 == '' && $due_days2 == '') {
	 	$sql2="INSERT INTO sec_psdu_edpr(serialno, refno, file_origin, subject, sender, receiver, action, due_days, Date_sent) VALUES($rand,'$refno2','$origin2','$subject2', '$sender2', '$receiver2', 'none', 'none', '$date')";
	 	$query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: white;'>Error in Insertion of records</p>".mysqli_error($dbConnect); 
	
	 }else{
		 echo "<script type='text/javascript'>

		 window.alert('File was Sent Successfully!');</script>"; 
	 }

	 

	 }elseif ($due_days2 == '') {
	 	$sql2="INSERT INTO sec_psdu_edpr(serialno, refno, file_origin, subject, sender, receiver, action, due_days, Date_sent) VALUES($rand,'$refno2','$origin2','$subject2', '$sender2', '$receiver2', '$action2', 'none', '$date')";
	 	$query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: white;'>Error in Insertion of records</p>".mysqli_error($dbConnect); 
	
	 }else{
		 echo "<script type='text/javascript'>

		 window.alert('File was Sent Successfully!');</script>"; 
	 }



	}elseif ($action2 == '') {
	 	$sql2="INSERT INTO sec_psdu_edpr(serialno, refno, file_origin, subject, sender, receiver, action, due_days, Date_sent) VALUES($rand,'$refno2','$origin2','$subject2', '$sender2', '$receiver2', 'none', '$due_days2', '$date')";
	 	$query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: white;'>Error in Insertion of records</p>".mysqli_error($dbConnect); 
	
	 }else{
		 echo "<script type='text/javascript'>

		 window.alert('File was Sent Successfully!');</script>"; 
	 }
	

	 }else{

	 $sql2="INSERT INTO sec_psdu_edpr(serialno, refno, file_origin, subject, sender, receiver, action, due_days, Date_sent) VALUES($rand,'$refno2','$origin2','$subject2', '$sender2', '$receiver2', '$action2', '$due_days2', '$date')";
	 $query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: white;'>Error in Insertion of records</p>".mysqli_error($dbConnect); 
	
	 }else{
		 echo "<script type='text/javascript'>

		 window.alert('File was Sent Successfully!');</script>"; 
	 }

	
	}

	
?>