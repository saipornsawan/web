<?php 
	include("connect_db.php");
	$detail = $_POST["mentEdit"];
	$id = $_POST["qt_id"];
	$mid = $_POST["ment_id"];
	$sql = "UPDATE webboard_comment SET BODY=? WHERE ID =?";
	$stm = $db_con->prepare($sql);
	$stm->bindParam("1",$detail);
	$stm->bindParam("2",$mid);
	$result = $stm->execute();
		
	if($result){
		header("Location:question_reply.php?qt_id=".$id);
	}
	else{
		header("Location:question_reply.php?qt_id=".$id);
	}
	
?>