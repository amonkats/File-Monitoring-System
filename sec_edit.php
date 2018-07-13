<?php
	
	function getPosts(){
		$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
		$posts=array();
		$posts[1]=mysqli_real_escape_string($dbConnect, $_POST['serialno']);
		$posts[2]=mysqli_real_escape_string($dbConnect, $_POST['refno']);
		$posts[3]=mysqli_real_escape_string($dbConnect, $_POST['origin']);
		$posts[4]=mysqli_real_escape_string($dbConnect, $_POST['subject']);
	
	return $posts;
}

	if(isset($_POST['updatebtn'])){
			$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');
			$data=getPosts();
			$sql_update="UPDATE outbox_sec_edpr SET refno='$data[2]', file_origin='$data[3]', subject='$data[4]' WHERE serialno='$data[1]'";
		             	
		try{
			$update_result=mysqli_query($dbConnect, $sql_update);
			if($update_result){
				if(mysqli_affected_rows($dbConnect) > 0){
					echo "<p style='color: white;'>"; echo"<i>"; 
					header("Location:outbox_sec_edpr.php");
					
				}else{
					echo "<p style='color: red;'>"; echo"<i>"; echo "<script type='text/javascript'> window.alert('Error in Update');</script>"; echo"</i>"; echo "</p>"; echo"</i>"; echo "</p>".mysql_error();
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