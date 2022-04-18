<?php 
	$dsn = 'mysql:host=localhost; dbname=rd';
	$user = 'rd';
	$password = 'rd123';
 

	try{
		$pdo = new PDO($dsn, $user, $password);
	}catch(PDOException $e){
		echo 'connection error! ' . $e;
	}	
?>
