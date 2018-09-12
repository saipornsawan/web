<?php 
	ob_start();
	session_start();//เรื่มต้น session

	$db_host = "localhost";
	$db_name = "web";
	$db_user = "root";
	$db_pass = "";
	
	try{
    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_con->exec("set names utf8");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>