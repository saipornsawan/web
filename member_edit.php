	<?php 
		include("side.php");
		$sql = "SELECT * FROM tb_user WHERE ID = '".$_GET["edit"]."' "; 
		$update = $db_con->prepare($sql);
		$update->execute();
		$row = $update->fetch(PDO::FETCH_ASSOC);
		 ?>
		 <link rel="stylesheet" href="css/btn.css">

<body>
	
	<div id="content">	
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>แก้ไขข้อมูลผู้ใช้</strong></div>
				  <div class="panel-body">
				    <form method="post" action="mem_send_update.php">
						<div class="row">
						<div class="col-md-6">
						  <div class="form-group">
						    <label>ชื่อผู้ใช้งาน</b></label>
						    <input type="text" name="username" class="form-control" value="<?php echo $row["USERNAME"];?>" placeholder="ระบุชื่อผู้ใช้งาน" disabled>
						  </div>
							</div>

							<div class="col-md-6">
						  <div class="form-group">
						    <label>รหัสผ่าน</b></label>
						    <input type="password" id="psw1" name="password" class="form-control" value="<?php echo $row["PASSWORD"];?>" placeholder="ระบุรหัสผ่าน">
								<input type="checkbox" id="showpsw" onclick="myFunction1()"> Show Password
							</div>
							</div>
							
							<div class="col-md-6">
						  <div class="form-group">
						    <label><b>ชื่อ</b></label>
						    <input type="text" name="name" class="form-control" value="<?php echo $row["FIRST_NAME"];?>" placeholder="ระบุชื่อ"pattern="{3,}" title="กรุณาระบุชื่อ" required>
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
						    <input type="text" name="tel" class="form-control" value="<?php echo $row["TELEPHONE"];?>" placeholder="ระบุเบอร์โทรศัพท์"pattern="[0-9]{9,}" title="กรุณาระบุเบอร์โทรศัพท์" required>
						  </div>
							</div>

							<div class="col-md-6">
						  <div class="form-group">
						    <label><b>อีเมล</b></label>
						    <input type="text" name="email" class="form-control" value="<?php echo $row["EMAIL"];?>" placeholder="ระบุชื่ออีเมล">
						  </div>
							</div>
							</div>
						  
						  
							<div class="form-group">
						    <label><b>สิทธิ์การเข้าถึง</b></label><br>
						    <input type="radio" name="appove" value="สมาชิกทั่วไป" <?php if($row["IS_ACTIVE"] == "สมาชิกทั่วไป"){echo "checked";};?>> สมาชิกทั่วไป
  							<input type="radio" name="appove" value="ผู้ดูแลระบบ" <?php if($row["IS_ACTIVE"] == "ผู้ดูแลระบบ"){echo "checked";};?>> ผู้ดูแลระบบ
						  </div>
							<input type="hidden" name="mem_id" id="mem_id" value="<?php echo $row["ID"];?>"  >
						  <div class= "row">
								<div class="col-md-1">
									<button type="submit" class="btn btn-primary">บันทึก</button>
								</div>
								<div class="col-md-1">
								<a href="member.php?page=1"><button type="button" id = "rsbtn" class=" btn btn-default">ยกเลิก</button></a>
								</div>
							</div>
						</form>
				  </div>
				</div>
</div>
</body>
<script>
function myFunction1() {
    var x = document.getElementById("psw1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<script src = "fixPid.js"></script>
<script src = "use_side.js"></script>
