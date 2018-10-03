<?php 

	include("connect_db.php");
		
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
	$member = $_SESSION["member_id"];

	$sql = "INSERT INTO tb_user(CREATED_DATE,CREATED_USER,EMAIL,FIRST_NAME, IS_ACTIVE, LAST_NAME, PASSWORD, TELEPHONE, USERNAME) 
	VALUES (:created,:member,:email,:name,:appove,:lastname,:password,:tel,:username)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam(":username",$username);
	$stm->bindParam(":password",$password);
	$stm->bindParam(":name",$name);
	$stm->bindParam(":lastname",$lastname);
	$stm->bindParam(":email",$email);
	$stm->bindParam(":tel",$tel);
	$stm->bindParam(":appove",$appove);
	$stm->bindParam(":created",$created);
	$stm->bindParam(":member",$member);
	$result = $stm->execute();//mysql_query

	if($result){
		header("Location:member.php?page1");
	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		header("Location:register.php");
	}
	
?>