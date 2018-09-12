<?php 
	include("connect_db.php");
	$name = $_POST["group"];
	$ctr = $_POST["ctr"];
	$id = $_POST["ctr_id"];
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");
	$sql = "UPDATE webboard_category SET CREATED_DATE = ?, GROUP_ID = ?, NAME = ?
	WHERE ID =? ";
	$stm = $db_con->prepare($sql);
	$stm->bindParam("1",$created);
	$stm->bindParam("2",$ctr);
	$stm->bindParam("3",$name);
	$stm->bindParam("4",$id);
	$result =  $stm->execute();//mysql_query
	
	if($result){
		header("Location:index.php");
	}
	else{
		
		header("Location:ctr_edit?edit=".$_POST["ctr_id"]."");
	}
	
?>