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
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");
	$sql = "UPDATE tb_user SET USERNAME = ?, PASSWORD = ?, FIRST_NAME = ?, LAST_NAME = ? , EMAIL = ? , TELEPHONE = ? , PID = ? ,  CREATED_DATE = ?
	WHERE ID =? ";
	$stm = $db_con->prepare($sql);
	$stm->bindParam("1",$username);
	$stm->bindParam("2",$password);
	$stm->bindParam("3",$name);
	$stm->bindParam("4",$lastname);
	$stm->bindParam("5",$email);
	$stm->bindParam("6",$tel);
	$stm->bindParam("7",$PID);
	$stm->bindParam("8",$created);
	$stm->bindParam("9",$memid);
	$result =  $stm->execute();//mysql_query
	
	if($result){
		echo "แก้ไขข้อมูลได้สำเร็จ";
		header("Location:question_me.php");
	}
	else{
		echo "แก้ไขข้อมูลไม่สำเร็จ";
		header("Location:question_edit.php?edit=".$_POST["qt_id"]."");
	}
	
?>