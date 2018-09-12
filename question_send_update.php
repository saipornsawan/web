<?php 

	include("connect_db.php");

	$title = $_POST["qt_title"];
	$detail = $_POST["qt_detail"];
	$id = $_SESSION["member_id"];
	$postid = $_POST["qt_id"]; //หาวิธีส่งมาาาาาาาาา
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");
	//echo $_POST["qt_detail"];
	$ext = pathinfo(basename($_FILES['fileToUpload']['name']),PATHINFO_EXTENSION);
	$new_name = uniqid().".".$ext;
	$image_path = "image/";
	$upload_path = $image_path.$new_name;

	$sql = "UPDATE webboard_post SET TITLE = ?,BODY = ? WHERE ID = ? ";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$title);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$postid);
	$result =  $stm->execute();//mysql_query
	//CREATED_DATE, CREATED_USER, DETAIL ,DISPLAY_NAME, FILE_NAME, FILE_SIZE, IS_ACTIVE, MIME_TYPE, PATH_FILE, POST_ID
	$sql = "UPDATE webboard_post_file
	SET CREATED_DATE = :created_date, CREATED_USER = :created_user ,DETAIL = :detail ,DISPLAY_NAME= :display_name, FILE_NAME = :file_name 
	,FILE_SIZE=  :file_size  , MIME_TYPE= :mime_type, PATH_FILE= :path_file
	WHERE POST_ID = :post_id "; 
    $groupdata = $db_con->prepare($sql);
	$detail2 = $_FILES['fileToUpload']['tmp_name'];
	$display_name = $_FILES['fileToUpload']['name'];
	$file_size = $_FILES['fileToUpload']['size'];
	$groupdata->bindParam(":created_date",$created);
	$groupdata->bindParam(":created_user",$id);
    $groupdata->bindParam(":detail",$detail2);
    $groupdata->bindParam(":display_name",$display_name);
    $groupdata->bindParam(":file_name",$new_name);
    $groupdata->bindParam(":file_size",$file_size);
    $groupdata->bindParam(":mime_type",$ext);
    $groupdata->bindParam(":path_file",$upload_path);
    $groupdata->bindParam(":post_id",$postid);
	$result2 = $groupdata->execute();
	
	if($result){
		header("Location:question_me.php");
	}
	else{
		header("Location:question_edit.php?edit=".$_POST["qt_id"]."");
	}
	
?>