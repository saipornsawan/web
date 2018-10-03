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
	$sql = "UPDATE tb_user SET PASSWORD = ?, FIRST_NAME = ?, LAST_NAME = ? , EMAIL = ? , TELEPHONE = ? , CREATED_DATE = ?
	WHERE ID =? ";
	$stm = $db_con->prepare($sql);
	$stm->bindParam("1",$password);
	$stm->bindParam("2",$name);
	$stm->bindParam("3",$lastname);
	$stm->bindParam("4",$email);
	$stm->bindParam("5",$tel);
	$stm->bindParam("6",$created);
	$stm->bindParam("7",$memid);
	$result =  $stm->execute();//mysql_query
	
	if($result){
		echo "แก้ไขข้อมูลได้สำเร็จ";
		header("Location:question_me.php?page=1");
	}
	else{
		echo "แก้ไขข้อมูลไม่สำเร็จ";
		header("Location:question_edit.php?edit=".$_POST["qt_id"]."");
	}
	
?>