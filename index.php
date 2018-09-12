<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/search.js"></script>
<style>
.ui-container-header {
    font-size: 2rem;
    border-bottom: solid 2px #cee0ec;
    padding: 0.5rem 0;
    margin-bottom: 1rem;
}
.list-group-flush .list-group-item {
    border-right: 0;
    border-left: 0;
    border-radius: 0;
}
.ui-container-header .fa, .ui-container-header .badge {
    margin-right: 0.5rem;
}
.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
}


</style>
<link rel="stylesheet" href="css/btn.css">
<body>

<div class="ui-header">
    <div class="ui-container">
        <div class="container" style="min-height: 387px;">
		<?php  include("side.php");?>
		<div id="content">	
					<?php
					if(isset($_SESSION["member_name"])){		
					if($_SESSION["member_approve"]=="ผู้ดูแลระบบ"){
					?>		
					<span class="row">
					<div class="container">
						<a class="btn btn-success" role="button" id="ctr" style="float: right; color: #fff;"><i class="fas fa-plus"></i> เพิ่มหมวด</a>
						<a class="btn btn-info" role="button" id="ctr_edit" style="float: right; color: #fff;"> แก้ไขหมวด</a>
					</div >
					</span>
					<span class="row">
					<div class="container-fluid" id = "rowadd">
						
							<form method="post" action="addGroup_send.php">
							
								<div class="form-group">
									<br><br>
									<label>เพิ่มหมวด</label>
									<input type="group" name="group" class="form-control" placeholder="ระบุหมวด" required><br>
									<label>เลือกกลุ่ม</label><br>
									<input type="radio" name="ctr" value="1"> ทั่วไป
									<input type="radio" name="ctr" value="2"> สอบถามปัญหา และแจ้งปัญหา
						
								</div>
								<div class="col-md-2">
								<button type="submit" class="btn btn-primary">เพิ่มหมวด</button>
								</div>
							</form>
						
					</div>
					</span>
					<span class="row">
						<div class="container-fluid" id = "rowedit">
						<div class="col-md-4">
								<input id="search" type="text" class="form-control" placeholder="Search...">
							</div>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped">
									<thead>
									<tr>
										<th>กลุ่ม</th>
										<th>หมวด</th>
										<th  style="text-align:center;">จัดการ</th>
									</tr>
									</thead>
									<?php 
										if(isset($_GET["del"])){
										$del = $db_con->prepare("DELETE FROM webboard_category WHERE ID = '".$_GET["del"]."' ");
										$del->execute();
										header("Location:index.php");
										}
									?>
									<tbody id="searchTable">
										<?php 
											$sql = "SELECT * FROM webboard_category ORDER BY webboard_category.GROUP_ID ASC"; 
											$stmt = $db_con->prepare($sql);
											$stmt->execute();

											while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {// mysql_fetch_assoc()
										?>
									<tr>
										<td><?php echo $row["GROUP_ID"];?></td>
										<td><?php echo $row["NAME"];?></td>
										<td width="150" style="text-align:center;">
											<a class="btn btn-info" href="ctr_edit.php?edit=<?php echo $row["ID"]; ?>" style="color: #fff;" id="edit" role="button">แก้ไข</a> 
											<a class="btn btn-danger" href="index.php?del=<?php echo $row["ID"]; ?>" onclick="return confirm('ท่านต้องการลบแถวนี้ใช่หรือไม่');" role="button">ลบ</a>
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
					</span>
					<?php 
						}	}
					?>
					
				<span id="span_item1" >
						<div class="list-group list-group-flush ui-list-group" id = "grouplist_test">
						
						</div>
				</span>
			</div>
		</div>
	</div>
</div>  
</body>
<script>

	$(document).ready(function(){
		$("#rowadd").hide();
		$("#ctr").click(function(){
			$("#rowadd").toggle(300);
		});
	});

		$(document).ready(function(){
		$("#rowedit").hide();
		$("#ctr_edit").click(function(){
			$("#rowedit").toggle(300);
		});
	});
		
		

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		
		$.ajax({
			url: "Getgroupdata.php",
			data: {action: 'Getgroup'},
			type: 'post', 
			success: function(result){
				
				$.each(result, function(i, item) {
				$("#span_item1").append("<div class=\"ui-container-header\"> <br> <i class=\"fas fa-cloud\"></i> "+ item.NAME +" </div> <div class=\"list-group list-group-flush ui-list-group\" id = \"grouplist"+ item.ID +"\"></div>");
				})
			}
			,error :function(ajaxContext){
				alert(ajaxContext.responseText)
			}
		});
    	
    	$.ajax({url: "Getgroupdata.php",
		data: {action: 'Getcategory'},
        type: 'post', 
        success: function(result){
			$.each(result, function(i, item) {
			$("#grouplist"+ item.groupID ).append("<a class=\"list-group-item\" href=\"post.php?category="+ item.ID +" \" value = \" "+ item.ID +" \"> "+ item.NAME +" </a>");
			})
    	}});
	});
   
</script>
<script src = "use_side.js"></script>

