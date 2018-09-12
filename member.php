<?php include("side.php"); ?>
<?php 
		if(isset($_GET["del"])){
			$del = $db_con->prepare("DELETE FROM tb_user WHERE ID = '".$_GET["del"]."' ");
			$del->execute();

			header("Location:member.php");
		}
	?>
<style>
h3 {
    text-align: center;
}
th,td{
	overflow:auto;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/search.js"></script>
<body>
	<div class="container">

		<div id="content">
		<h3 text-align="center">รายการสมาชิกทั้งหมด</h3>
		<div class="col-md-4">
		<input id="search" type="text" class="form-control" placeholder="Search...">
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ชื่อ</th>
								<th>นามสกุล</th>
								<th>เบอร์โทร</th>
								<th>E-mail</th>
								<th  style="text-align:center;">สิทธิ์</th>
								<th>วันที่สร้าง</th>
								<th  style="text-align:center;">จัดการ</th>
							</tr>
						</thead>
						<tbody id="searchTable">
							<?php 
								$sql = "SELECT * FROM tb_user ORDER BY ID DESC"; 
								$stmt = $db_con->prepare($sql);
								$stmt->execute();

								while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {// mysql_fetch_assoc()
							?>
							<tr>
								
								<td><?php echo $row["FIRST_NAME"];?></td>
								<td><?php echo $row["LAST_NAME"];?></td>
								<td><?php echo $row["TELEPHONE"];?></td>
								<td><?php echo $row["EMAIL"];?></td>
								<td  style="text-align:center;"><?php echo $row["IS_ACTIVE"];?></td>
								<td ><?php echo $row["CREATED_DATE"];?></td>
								<td width="150" style="text-align:center;">
									<a class="btn btn-info" href="member_edit.php?edit=<?php echo $row["ID"]; ?>" role="button">แก้ไข</a> 
									<a class="btn btn-danger" href="member.php?del=<?php echo $row["ID"]; ?>" onclick="return confirm('ท่านต้องการลบแถวนี้ใช่หรือไม่');" role="button">ลบ</a>
								</td>
							</tr>
							<?php 
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div></div>
	</div>
</body>
<script src = "use_side.js"></script>