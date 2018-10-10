	<?php 
		include("side.php");
		$sql = "SELECT * FROM tb_user WHERE ID = '".$_SESSION["member_id"]."' "; 
		$update = $db_con->prepare($sql);
		$update->execute();
		$row = $update->fetch(PDO::FETCH_ASSOC);
		 ?>
		 <link rel="stylesheet" href="css/btn.css">
<body>
	<div id="content" style="padding-top: 100px">
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>แก้ไขข้อมูลส่วนตัว</strong></div>
				  <div class="panel-body">
				    <form method="post" action="user_edit_send.php">
								<div class="col-md-6">
									<div class="form-group">
										<label><b>รหัสผ่านใหม่</b></label>
										<input type="password" id="psw1" name="password" class="form-control" placeholder="ระบุรหัสผ่าน">
									</div>
								</div>
							<div class="row">
								
								<div class="col-md-6">
									<div class="form-group">
										<label><b>ชื่อ</b></label>
										<input type="text" name="name" class="form-control" value="<?php echo $row["FIRST_NAME"];?>" placeholder="ระบุชื่อ" pattern="{3,}" title="กรุณาระบุชื่อ" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label><b>นามสกุล</b></label>
										<input type="text" name="l_name" class="form-control" value="<?php echo $row["LAST_NAME"];?>" placeholder="ระบุนามสกุล" pattern="{3,}" title="กรุณาระบุนามสกุล" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label><b>เบอร์โทรศัพท์</b></label>
										<input type="text" name="tel" class="form-control" value="<?php echo $row["TELEPHONE"];?>" placeholder="ระบุเบอร์โทรศัพท์" pattern="[0-9]{9,}" title="กรุณาระบุเบอร์โทรศัพท์" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label><b>อีเมล</b></label>
										<input type="text" name="email" class="form-control" value="<?php echo $row["EMAIL"];?>" placeholder="ระบุชื่ออีเมล">
									</div>
								</div>
							</div>
									<input type="hidden" name="mem_id" id="mem_id" value="<?php echo $row["ID"];?>">
									<button type="submit" class="btn btn-primary">บันทึก</button>
									<a href="question_me.php?page=1" role="button" class=" btn btn-default">ยกเลิก</button></a>
						</form>
				  </div>
				</div>
	</div>
</body>
<script>

</script>
<script src = "use_side.js"></script>