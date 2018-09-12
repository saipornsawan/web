<?php
	session_start();

	session_destroy(); // คำสั่งลบค่า session 

	header("Location:index.php");
?>