<?php
	include("connect_db.php");
	
	$sql = "SELECT * FROM tb_user WHERE username = :username AND password = :password "; 
	
	$login = $db_con->prepare($sql);
	$login->bindParam(":username",$_POST["username"]);
	$login->bindParam(":password",$_POST["password"]);

	$login->execute(); 
	$row = $login->fetch(PDO::FETCH_ASSOC);

	if(empty($row))
	{
		echo "รหัสไม่ถูกต้อง";

	}
	else
	{
		$_SESSION["member_id"] = $row["ID"];
		$_SESSION["member_name"] = $row["FIRST_NAME"];
		$_SESSION["member_approve"] = $row["IS_ACTIVE"];
		echo "";
	}


?>