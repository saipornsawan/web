<?php include("side.php"); ?>
<?php 
		if(isset($_GET["del"])){
			$del = $db_con->prepare("DELETE FROM tb_user WHERE ID = '".$_GET["del"]."' ");
			$del->execute();

			header("Location:member.php?page=1");
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
<link rel="stylesheet" href="css/page.css">
<body>
	<div class="container">

		<div id="content">
		<h3 text-align="center">รายการสมาชิกทั้งหมด</h3>
			<?php
				$q_count ="SELECT COUNT(*) as cc FROM tb_user" ;
				$stmt2 = $db_con->prepare($q_count);
				$stmt2->execute();
				$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
				$numrow=$row2['cc'];
				$showrow=$numrow/10;
				echo "<br>";
				
				if($numrow==0){
					echo "จำนวนข้อมูลทั้งหมด 0 รายการ";
				}else{
			?>
		<div class="col-md-4">
		<input id="search" type="text" class="form-control" placeholder="Search...">
		</div>
		<?php
			echo "จำนวนข้อมูลทั้งหมด ".$numrow." รายการ";
		?>
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
								$p=$_GET["page"];
								if($p==""||$p=="1"){
									$p1=0;
								}else{
									$p1=($p*10)-10;
								}
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
								<td width="200" style="text-align:center;">
									<a class="btn btn-info" href="member_edit.php?edit=<?php echo $row["ID"]; ?>" role="button"><i class="fas fa-edit"></i> แก้ไข</a> 
									<a class="btn btn-danger" href="member.php?del=<?php echo $row["ID"]; ?>" onclick="return confirm('ท่านต้องการลบแถวนี้ใช่หรือไม่');" role="button"><i class="fas fa-trash-alt"></i>  ลบ</a>
								</td>
							</tr>
							<?php 
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<a style="margin: auto;">
						<?php 
							echo "หน้าที่ ".$p." จาก ".ceil($showrow)." หน้า";		
						?>
					</a>
				</div>
				<div class="row">
					<div class="pages">
					<ul class="pagination" >
						<?php
						for($i=1; $i<=ceil($showrow); $i++){
							?>
									<li><a href="question_me.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
							<?php
						}
						?>
						</ul>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		</div>
	</div>
</body>
<script src = "use_side.js"></script>
