<?php
	include("connect_db.php");
	
	$sql = "SELECT * FROM tb_user WHERE username = '".$_POST["username"]."' AND password = '".$_POST["password"]."' "; 
	$login = $db_con->prepare($sql);
	$login->execute();
	$row = $login->fetch(PDO::FETCH_ASSOC);

	if(empty($row))
	{
		//echo $_POST["username"]. $_POST["password"];
	
		header("Location:index.php");
	}
	else
	{
		$_SESSION["member_id"] = $row["ID"];
		$_SESSION["member_name"] = $row["FIRST_NAME"];
		$_SESSION["member_approve"] = $row["IS_ACTIVE"];
		header("Location:index.php");
	}


?>