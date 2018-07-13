<?php
	 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');

	 $refno = $_POST['refno'];
	 $origin = $_POST['origin'];
	 $subject = $_POST['subject'];
	 //$fileno = $_POST['fileno'];

	 //Escape Apostrophe
	 $refno2 = mysqli_escape_string($dbConnect, $refno);
	 $origin2 = mysqli_escape_string($dbConnect, $origin);
	 $subject2 = mysqli_escape_string($dbConnect, $subject);
	 //$fileno2 = mysqli_escape_string($dbConnect, $fileno);


	 $date = date('F j, Y  g:i a, l');
	 $rand = rand();
	

    	/*if ($_GET['status'] == '[Pending]') {
				echo "<tr style='background-color: #00FF00;'>"."</tr>";
			}*/

	 if ($refno2 == '') {
	 	$sql2="INSERT INTO outbox_e1_psc(serialno, refno, file_origin, subject, Date_received) VALUES($rand,'$refno2','$origin2','$subject2', '$date')";
	 	$query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: white;'>Error in Insertion of records</p>".mysqli_error($dbConnect); 
	
	 }else{
		 echo "<script type='text/javascript'>

		 window.alert('File was Sent Successfully!');</script>"; 
	 }

	 }else{

	 $sql2="INSERT INTO outbox_e1_psc(serialno, $refno2, file_origin, subject, Date_received) VALUES($rand,'$refno2','$origin2','$subject2', '$date')";
	 $query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: white;'>Error in Insertion of records</p>".mysqli_error($dbConnect); 
	
	 }else{
		 echo "<script type='text/javascript'>

		 window.alert('File was Sent Successfully!');</script>"; 
	 }
	}

	
?>