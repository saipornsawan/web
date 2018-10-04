<?php 

	include("connect_db.php");

	$title = $_POST["qt_title"];
	$detail = $_POST["qt_detail"];
	$id = $_SESSION["member_id"];
	$postid = $_POST["qt_id"];
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");
	$ext = pathinfo(basename($_FILES['fileToUpload']['name']),PATHINFO_EXTENSION);
	$new_name = uniqid().".".$ext;
	$image_path = "image/";
	$upload_path = $image_path.$new_name;

	$sql = "UPDATE webboard_post 
			SET TITLE = :title ,BODY = :detail 
			WHERE ID = :post_id ";
	$stm = $db_con->prepare($sql);
	$stm->bindParam(":title",$title);
	$stm->bindParam(":detail",$detail);
	$stm->bindParam(":post_id",$postid);
	$result =  $stm->execute();

	if($result){
		header("Location:question_me.php?page=1");
	}
	else{
		header("Location:question_edit.php?edit=".$_POST["qt_id"]."");
	}
	
?>