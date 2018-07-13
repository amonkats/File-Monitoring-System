<?php
     $user = $_POST['user'];
	 $pass = $_POST['pass'];
	 $pass2 = $_POST['pass2'];

	 /*$md5 = md5('pass');
	 $sha1 = sha1($md5);
	 $crypt = password_hash($sha1, PASSWORD_BCRYPT);

	 //Encryption two
	 $md5_two = md5('pass2');
	 $sha1_two = sha1($md5_two);
	 $crypt_two = password_hash($sha1_two, PASSWORD_BCRYPT);*/

if ($pass == $pass2) {
	 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv', 'edpr');

	 $sql2="INSERT INTO register(Username, Password, Retype_Pass) VALUES('$user', sha1('$pass'), sha1('$pass2'))";
	 $query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: red;'>Error</p>".mysqli_error($dbConnect); 
	
	 }
	 if($query2 && $pass == $pass2){

	 echo "<script type='text/javascript'>

		 window.alert('Your Account credentials have been successfully submitted! You can now login');</script>"; 
}
}else{
	echo "<script type='text/javascript'>

		 window.alert('Password Mismatch');</script>"; 
}
	

?>
