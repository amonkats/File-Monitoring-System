<?php
session_start();
	 session_destroy();
	 	header("Location:Index.php");
	 
 /*unset($_SESSION['user']);
 	session_destroy($_SESSION['username']);
 	header("Location:Index.php");*/
?>
  