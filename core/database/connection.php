<?php 
	$dsn = 'mysql:host=us-cdbr-east-05.cleardb.net; dbname=heroku_23965a723e0d8d4';
	$user = 'b01b54663cf32b';
	$password = '13df0ee0';
 

	try{
		$pdo = new PDO($dsn, $user, $password);
	}catch(PDOException $e){
		echo 'connection error! ' . $e;
	}	
?>
