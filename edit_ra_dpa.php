<?php
	
	function getPosts(){
		$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
		$posts=array();
		$posts[1]=mysqli_real_escape_string($dbConnect, $_POST['serialno']);
		$posts[2]=mysqli_real_escape_string($dbConnect, $_POST['origin']);
		$posts[3]=mysqli_real_escape_string($dbConnect, $_POST['subject']);
		$posts[4]=mysqli_real_escape_string($dbConnect, $_POST['status']);
	
	return $posts;
}

	if(isset($_POST['updatebtn'])){
			$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
			$data=getPosts();
			$sql_update="UPDATE ra_dpa_edpr SET file_origin='$data[2]', subject='$data[3]', status='$data[4]' WHERE serialno='$data[1]'";
		             	
		try{
			$update_result=mysqli_query($dbConnect, $sql_update);
			if($update_result){
				if(mysqli_affected_rows($dbConnect) > 0){
					echo "<p style='color: white;'>"; echo"<i>"; echo "<script type='text/javascript'> window.alert('Status has been Updated');</script>"; echo"</i>"; echo "</p>";
					header("Location:inbox_ra_dpa.php");
				}else{
					echo "<p style='color: red;'>"; echo"<i>"; echo "Status not Updated"; echo"</i>"; echo "</p>".mysql_error();
				}
			}
			
		}catch(Exception $ex){
			echo "Error in Update".$ex->getMessage();
		}
	}

	function test_input($keepData) {
	  $keepData = trim($keepData);
	  $keepData = stripslashes($keepData);
	  $keepData = htmlspecialchars($keepData);
	  $keepData = basename($keepData);
	  return $keepData;
}


?>