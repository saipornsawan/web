	<?php 
		include("side.php"); 
		if(!isset($_SESSION["member_name"])){
		header("location:index.php");
		}
	?>
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
  
  <script src = "js/preview.js"></script>
<style>
tinymce.init({
  selector: "textarea",  
  plugins: "emoticons",
  toolbar: "emoticons"
});
	.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    touch-action: manipulation;
    cursor: pointer;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    
}
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;

}
#backbtn{
	position: static;
    right: 0;
}
ul{
	margin-bottom: 150px;
}
</style>

<script>
$(document).ready(function(){
	$(document).ready(function(){
    	var parts = window.location.search.substr(1).split("&");
		var $_GET = {};
		for (var i = 0; i < parts.length; i++) {
		    var temp = parts[i].split("=");
		    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
		}
    	$.ajax({url: "Getgroupdata.php",
		data: {action: 'getcategory_json_by_cateid',category: $_GET["category"]},
        type: 'post', 
        success: function(result){
		
			$.each(result, function(i, item) {
				$("#select1").append("<option value=\""+ item.ID +"\">"+ item.NAME +"</option>");
				if ($_GET["category"]==item.ID){
					$("#select1").val(item.ID);
				}
			})
    	}});
    	
	});

});
</script>

<body>
	<div id="content">
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>ตั้งกระทู้</strong></div>
				  <div class="panel-body">
				    <form method="post" id = "form1" action="question_send.php" enctype="multipart/form-data">
				    	  
				    	  <label><b>เลือกหมวด</b></label>
				    	  <select class="form-control" id="select1" name="select1"></select><br>
						  <div class="form-group">
						    <label><b>หัวข้อ</b></label>
						    <input type="text" id = "qt_title" name="qt_title" class="form-control" placeholder="ระบุหัวข้อ">
						  </div>
						  <div class="form-group">
						    <label><b>รายละเอียด</b></label>
						    <textarea class="form-control" id= "qt_detail"  name="qt_detail" rows="3" placeholder="ระบุรายละเอียด"></textarea>
						  </div>
						  <div class="form-group">
						    <label><b>เลือกไฟล์ที่เกี่ยวข้อง</b></label><br>
							<input type="file" name="fileToUpload[]" id="fileToUpload" onchange="previewImages();" multiple>
							
							<div class="row" id="image_preview"></div>
						  </div>
						  <div class="row">
						  <div class="col-md-2">
						  <button type="submit" id = "savebtn" value="upload" name="upload" class="btn btn-primary">บันทึก</button>
						  </div>
						  <div class="col-md-2">
						  <a href="index.php"><button type="button" id = "rsbtn" class=" btn btn-default">ยกเลิก</button></a>
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
		var inp2 = $("#qt_detail");
        if (inp.val().length == 0 || inp2.val().length == 0 ) {  
            alert("กรุณากรอกหัวข้อและรายละเอียด");
        	e.preventDefault();
        }

		
    });
	
});
</script>

