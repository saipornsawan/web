<?php include("side.php");  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "js/search.js"></script>
	<?php 
		if(isset($_GET["del"])){
			$del = $db_con->prepare("DELETE FROM webboard_post WHERE ID = '".$_GET["del"]."' ");
			$del->execute();
			header("Location:question_me.php");
		}
	?>
<div class="container" >
	<div class="row">
			<div class="col-md-3">
			
			</div>
		</div>
</div>
<style>
h3 {
    text-align: center;
}
.conterner{
	margin-top:80px;
}
</style>

<body>
	<div class="container" >
		<div class="row">
			
			<div id="content">
				<h3>รายการกระทู้ของฉัน</h3>
				<div class="col-md-3">
			<input id="search" type="text" class="form-control" placeholder="Search..">
			</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								</th>
								<th>หัวข้อคำถาม</th>
								<th  style="text-align:center;">จำนวนผู้เข้าอ่าน</th>
								<th  style="text-align:center;">จำนวนผู้เข้าตอบ</th>
								<th>วันที่สร้าง</th>
								<th  style="text-align:center;">จัดการ</th>
							</tr>
						</thead>
						
						<tbody id="searchTable">
							<?php
								$sql = "SELECT * FROM webboard_post WHERE CREATED_USER = '".$_SESSION["member_id"]."' ORDER BY ID DESC"; 
								$stmt = $db_con->prepare($sql);
								$stmt->execute();

								while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {// mysql_fetch_assoc()
									$countReply = $db_con->prepare("SELECT * FROM webboard_comment WHERE POST_ID = ".$row["ID"]." "); 
									$countReply->execute();
							?>
							<tr>
								
						    <td><a href="question_reply.php?qt_id=<?php echo $row["ID"]; ?>"><?php echo $row["TITLE"];?></a></td>
						    <td  style="text-align:center;"><?php echo $row["VISIT_COUNT"];?></td>
						    <td  style="text-align:center;"><?php echo number_format($countReply->rowCount());?></td>
						    <td><?php echo $row["CREATED_DATE"];?></td>
							
								<td width="150"  style="text-align:center;">
									<a class="btn btn-info" href="question_edit.php?edit=<?php echo $row["ID"]; ?>" role="button">แก้ไข</a> 
									<a class="btn btn-danger" href="question_me.php?del=<?php echo $row["ID"]; ?>" onclick="return confirm('ท่านต้องการลบแถวนี้ใช่หรือไม่');" role="button">ลบ</a>
								</td>
							</tr>
							<?php 
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script src = "use_side.js"></script>