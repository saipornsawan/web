<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/btn.css">
<div id="id01" class="modal">
  
  <form class="modal-content1 animate" method="post" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container1">
      <h1 style="text-align: center;">เข้าสู่ระบบ</h1> <hr>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" id="psw" placeholder="Enter Password" name="password" required>
      <input type="checkbox" onclick="myFunction()" > Show Password <br>
      <button id = "btnsubmit" class="btn btn-success">เข้าสู่ระบบ</button>
      <a class="btn btn-danger" role="button" style="color: #fff;" onclick="document.getElementById('id01').style.display='none'">ยกเลิก</a>
      </div>
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function myFunction() {
    var x = document.getElementById("psw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<script>

	$(document).ready(function(){
    $("#btnsubmit").click(function(){
    	
		
    	$.ajax({url: "login_send.php",
		  data: {username: $("#username").val() ,password:  $("#psw").val() },
        type: 'post', 
        success: function(result){
          if(result!=""){
            alert(result);
            $(location).attr('href', 'Location:index.php');
          }
        
    	}});
    });
	});

</script>