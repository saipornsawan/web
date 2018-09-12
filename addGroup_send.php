<?php 

    include("connect_db.php");
    
	$ctr = $_POST["ctr"];
	$name = $_POST["group"];
	date_default_timezone_set("Asia/Bangkok");
	$created = date("Y-m-d H:i:s");

	$sql = "INSERT INTO webboard_category (CREATED_DATE,GROUP_ID,NAME) VALUES (?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
    $stm->bindParam("1",$created);
    $stm->bindParam("2",$ctr);
	$stm->bindParam("3",$name);
	$result = $stm->execute();//mysql_query

	if($result){
        echo "บันทึกข้อมูลสำเร็จ";
        echo"<meta http-equiv='refresh' content='1;url=member.php'>";
        header("Location:index.php");

	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		header("Location:register.php");
	}
	
?>