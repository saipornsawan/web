<?php 

	include("connect_db.php");
		
	$title = $_POST["qt_title"];
	$detail = $_POST["qt_detail"];
	$sl1 = $_POST["select1"];
	$id = $_SESSION["member_id"];
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");
	
	
	
	$sql = "INSERT INTO webboard_post (TITLE,BODY,CREATED_DATE,CREATED_USER,CATEGORY_ID) VALUES (?,?,?,?,?);";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$title);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$created);
	$stm->bindParam("4",$id);
	$stm->bindParam("5",$sl1);

	try { 
        $db_con->beginTransaction(); 
        $result = $stm->execute(); 
		$postid = $db_con->lastInsertId(); 
		$db_con->commit(); 
    } catch(PDOExecption $e) { 
		echo "บันทึกข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=question_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
	//$result =  $stm->execute();//mysql_query
	
	$result2 = true;
	$count=count($_FILES['fileToUpload']['name']);
	
	for($i=0;$i<$count;$i++){
		//echo $_FILES['fileToUpload']['name'][$i] ." ". $_FILES['fileToUpload']['error'][$i] . " / ";
		if($_FILES['fileToUpload']['name'][$i] != "" && $_FILES['fileToUpload']['error'][$i] == 0){
			
			$ext = pathinfo(basename($_FILES['fileToUpload']['name'][$i]),PATHINFO_EXTENSION);
			$new_name = uniqid().".".$ext;
			$image_path = "image/";
			$upload_path = $image_path.$new_name;
			move_uploaded_file($_FILES['fileToUpload']['tmp_name'][$i],$upload_path);
			
			$sql = "insert into webboard_post_file (CREATED_DATE, CREATED_USER, DETAIL ,DISPLAY_NAME, FILE_NAME, FILE_SIZE, IS_ACTIVE, MIME_TYPE, PATH_FILE, POST_ID)
			values ( :created_date, :created_user ,:detail ,:display_name, :file_name, :file_size, 1, :mime_type, :path_file, :post_id)"; 
			
			$groupdata = $db_con->prepare($sql);
			$detail2 = $_FILES['fileToUpload']['tmp_name'][$i];
			$display_name = $_FILES['fileToUpload']['name'][$i];
			$file_size = $_FILES['fileToUpload']['size'][$i];

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
		
		}
		
	}
	

	if($result && $result2){
		echo "บันทึกข้อมูลได้สำเร็จ";
		header("Location:question_me.php?page=1");
	}	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
	}
	
?>