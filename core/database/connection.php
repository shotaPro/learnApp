<?php 
	$dsn = 'mysql:host=localhost; dbname=tw';
	$user = 'tw';
	$password = 'tw123';
 

	try{
		$pdo = new PDO($dsn, $user, $password);
	}catch(PDOException $e){
		echo 'connection error! ' . $e;
	}	
?>
