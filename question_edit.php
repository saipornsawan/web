	<?php 
	include("side.php"); 
		//ดึงข้อมูลเพื่อมาแสดงเพื่อทำการแก้ไข
		$sql = "SELECT pf.POST_ID,post.BODY,pf.MIME_TYPE,post.TITLE,pf.DETAIL, pf.PATH_FILE,pf.DISPLAY_NAME ,pf.FILE_NAME,pf.FILE_SIZE
		FROM webboard_post post INNER JOIN webboard_post_file pf ON pf.POST_ID=post.ID 
		WHERE post.ID = '".$_GET["edit"]."' "; 
		$update = $db_con->prepare($sql);
		$update->execute();
		$row = $update->fetch(PDO::FETCH_ASSOC);
	?>
	<link rel="stylesheet" href="css/btn.css">
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>
          tinymce.init({
              selector: "textarea",
              });
  </script>
<body>
	<div id="content">
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>แก้ไขกระทู้</strong></div>
				  <div class="panel-body">

				    <form id="form1" method="post" action="question_send_update.php" enctype="multipart/form-data">
						  <div class="form-group">
						    <label><b>หัวข้อ</b></label>
						    <input type="text" class="form-control" name="qt_title" id="qt_title" value="<?php echo $row["TITLE"];?>"  placeholder="ระบุหัวข้อ">
						  </div>

						  <div class="form-group">
						    <label><b>รายละเอียด</b></label>
						    <textarea class="form-control" name="qt_detail" rows="3" placeholder="ระบุรายละเอียด"><?php echo $row["BODY"];?></textarea>
						  </div>

							<div class="form-group">
						    <label><b>เลือกไฟล์ที่เกี่ยวข้อง</b></label><br>
								<input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row["PATH_FILE"];?>">
						 	</div>

						  <input type="hidden" name="qt_id" id="qt_id" value="<?php echo $row["ID"];?>"  >
						  <div class="row">
							<div class="col-md-2">
						  <button type="submit" class="btn btn-primary">บันทึก</button>
							</div>
							<div class="col-md-2">
							<a href="question_me.php?page=1"><button type="button" id = "rsbtn" class=" btn btn-default">ยกเลิก</button></a>
							</div>
							</div>
						</form>
				  </div>
				</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#form1").submit(function(e){
        var inp = $("#qt_title");
 
        if (inp.val().length == 0) {  
            alert("กรุณากรอกข้อความ");
        	e.preventDefault();
        }

		
    });
	
});
</script>
