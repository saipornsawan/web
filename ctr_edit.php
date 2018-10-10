<script src = "use_side.js"></script>
<link rel="stylesheet" href="css/btn.css">
	<?php 
		include("side.php");
		$sql = "SELECT * FROM webboard_category WHERE ID = '".$_GET["edit"]."' "; 
		$update = $db_con->prepare($sql);
		$update->execute();
		$row = $update->fetch(PDO::FETCH_ASSOC);
	 ?>
		 <link rel="stylesheet" href="css/btn.css">
<div class="container">
	<div id="content" style="padding-top: 100px">
		<h3 text-align="center">แก้ไขหมวด</h3>
		<form method="post" action="ctr_edit_send.php">
			<div class="form-group">
				<br><br>
				<input type="group" name="group" class="form-control" value="<?php echo $row["NAME"];?>" placeholder="ระบุหมวด" required><br>
				<label>เลือกกลุ่ม</label><br>
				<input type="radio" name="ctr" value="1" <?php if($row["GROUP_ID"] == "1"){echo "checked";};?>> ทั่วไป
				<input type="radio" name="ctr" value="2" <?php if($row["GROUP_ID"] == "2"){echo "checked";};?>> สอบถามปัญหา และแจ้งปัญหา
                <input type="hidden" name="ctr_id" id="ctr_id" value="<?php echo $row["ID"];?>">
				<br>
				<button type="submit" class="btn btn-primary">บันทึก</button>
				<a href="index.php" role="button"class=" btn btn-default">ยกเลิก</a>
			</div>
		</form>
	</div>
</div>
