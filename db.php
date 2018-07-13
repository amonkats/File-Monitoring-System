<?php

	$db_host = "localhost";
	$db_name = "edpr";
	$db_user = "root";
	$db_pass = "";

	try{
		$db_conn = new PDO("mysqli:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
		$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo $e->getMessage();
	}

?>