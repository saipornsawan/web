<?php 
	include("connect_db.php");
	$memid = $_POST["mem_id"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$lastname = $_POST["l_name"];
	$email = $_POST["email"];
	$tel = $_POST["tel"];
	$PID = $_POST["PID"];
	$appove = $_POST["appove"];
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");
	$sql = "UPDATE tb_user SET USERNAME = ?, PASSWORD = ?, FIRST_NAME = ?, LAST_NAME = ? , EMAIL = ? , TELEPHONE = ? , PID = ? , IS_ACTIVE = ? , CREATED_DATE = ?
	WHERE ID =? ";
	$stm = $db_con->prepare($sql);
	$stm->bindParam("1",$username);
	$stm->bindParam("2",$password);
	$stm->bindParam("3",$name);
	$stm->bindParam("4",$lastname);
	$stm->bindParam("5",$email);
	$stm->bindParam("6",$tel);
	$stm->bindParam("7",$PID);
	$stm->bindParam("8",$appove);
	$stm->bindParam("9",$created);
	$stm->bindParam("10",$memid);
	$result =  $stm->execute();//mysql_query
	
	if($result){
		header("Location:member.php");
	}
	else{
		
		header("Location:member_edit.php?edit=".$_POST["mem_id"]."");
	}
	
?>