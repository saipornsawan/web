	<?php 
		$cate = $_GET['category'];
		
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/page.css">
<script src = "js/search.js"></script>
<style>
body {font-family: "Raleway", sans-serif}

.container{
	margin-top: 60px;
}
h3 {
    text-align: center;
}

html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}

</style>


<body>
	<div class="container">
				<?php include("side.php"); ?>
		<div id="content">
			<div class="row">
				<div class="col-md-12" >
					<?php
					if(isset($_SESSION["member_name"])){
						?>
					<a id="btn1" class="btn btn-success" role="button" style="float: right; color: #fff;" ><i class="fas fa-plus"></i> ตั้งกระทู้</a>
					<?php
					}
					?>
				</div>
			</div>
			<h3>รายการกระทู้ทั้งหมด</h3>
			
			<?php
				$q_count ="SELECT COUNT(*) as cc FROM webboard_post post INNER JOIN tb_user user ON post.CREATED_USER=user.ID WHERE post.CATEGORY_ID=  ".$_GET["category"]." ORDER BY post.ID DESC" ;
				$stmt2 = $db_con->prepare($q_count);
				$stmt2->execute();
				$row2=$stmt2->fetch(PDO::FETCH_ASSOC);
				$numrow=$row2['cc'];
				$showrow=($numrow/10);
				echo "<br>";
				
				if($numrow==0){
					echo "จำนวนข้อมูลทั้งหมด 0 รายการ";
				}else{
			?>
					<div class="row">
						<div class="col-md-3">
							<input id="search" type="text" class="form-control" placeholder="Search..">
						</div>
					</div>
					<?php
						echo "จำนวนข้อมูลทั้งหมด ".$numrow." รายการ";
					?>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>หัวข้อคำถาม</th>
								<th width="150" style="text-align:center;">จำนวนผู้เข้าอ่าน</th>
								<th>วันที่สร้าง</th>
								<th>ผู้ตั้งหระทู้</th>
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

								$sql = "SELECT post.ID ,post.TITLE, post.VISIT_COUNT , post.CREATED_DATE,post.CREATED_USER,user.FIRST_NAME FROM webboard_post post INNER JOIN tb_user user ON post.CREATED_USER=user.ID
								 WHERE post.CATEGORY_ID= ".$_GET["category"]." ORDER BY post.ID DESC limit $p1,10"; // ถ้า ไม่ใส่ post.ID มันไม่รุ้ว่า ตารางไหนจ้า
								
								
									
								$stmt = $db_con->prepare($sql);
								$stmt->execute();

								while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
									$countReply = $db_con->prepare("SELECT * FROM webboard_comment WHERE POST_ID = ".$row["ID"]." "); // จะเอา ID อะไรมาใส่ตรงนี้อ่ะ		
									$countReply->execute();
							?>
							<tr>		
								<td><a href="question_reply.php?qt_id=<?php echo $row["ID"]; ?>"><?php echo $row["TITLE"];?></a></td>  
								<td width="150" style="text-align:center;"><?php echo $row["VISIT_COUNT"];?></td>
								<td><?php echo $row["CREATED_DATE"];?></td>
								<td><?php echo $row["FIRST_NAME"];?></td>
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
						for($i=1; $i<=$showrow; $i++){
							?>
							
								
									<li><a href="post.php?category=<?php echo $_GET["category"]; ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
								
							
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
<script src = "js/post_jquery.js"></script>
<script src = "use_side.js"></script>