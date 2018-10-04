<?php include("side.php");  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "js/search.js"></script>
<link rel="stylesheet" href="css/page.css">
	<?php 
		if(isset($_GET["del"])){
			$del = $db_con->prepare("DELETE FROM webboard_post WHERE ID = '".$_GET["del"]."' ");
			$del->execute();
			header("Location:question_me.php?page=1");
		}
	?>

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
		<div id="content">
			<h3>รายการกระทู้ของฉัน</h3>
			<?php
				$q_count ="SELECT COUNT(*) as cc FROM webboard_post post WHERE post.CREATED_USER = '".$_SESSION["member_id"]."' ORDER BY post.ID DESC" ;
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
			<div class="col-md-3">
				<input id="search" type="text" class="form-control" placeholder="Search..">	
			</div>
			<?php
				echo "จำนวนข้อมูลทั้งหมด ".$numrow." รายการ";
			?>
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
								$p=$_GET["page"];
								if($p==""||$p=="1"){
									$p1=0;
								}else{
									$p1=($p*10)-10;
								}

								$sql = "SELECT * FROM webboard_post WHERE CREATED_USER = '".$_SESSION["member_id"]."' ORDER BY ID DESC limit $p1,10"; 
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
							
								<td width="200"  style="text-align:center;">
									<a class="btn btn-info" href="question_edit.php?edit=<?php echo $row["ID"]; ?>" role="button"><i class="fas fa-edit"></i> แก้ไข</a> 
									<a class="btn btn-danger" href="question_me.php?del=<?php echo $row["ID"]; ?>" onclick="return confirm('ท่านต้องการลบแถวนี้ใช่หรือไม่');" role="button"><i class="fas fa-trash-alt"></i> ลบ</a>
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
</body>
</html>
<script src = "use_side.js"></script>