<?php 

	include("connect_db.php");
	
	$name = $_SESSION["member_name"];
	$detail = $_POST["rp_detail"];
	$id = $_POST["qt_id"];
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");

	$sql = "INSERT INTO webboard_comment (CREATED_USER,BODY,CREATED_DATE,POST_ID) VALUES (?,?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$name);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$created);
	$stm->bindParam("4",$id);
	$result = $stm->execute();//mysql_query
		
	if($result){
		header("Location:question_reply.php?qt_id=".$_POST["qt_id"]."");
	}
	else{
		header("Location:question_reply.php?qt_id=".$_POST["qt_id"]."");
	}
	
?>