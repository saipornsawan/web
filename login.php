<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/btn.css">
<div id="id01" class="modal">
  
  <form class="modal-content1 animate" action="login_send.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container1">
    <h1 style="text-align: center;">เข้าสู่ระบบ</h1>
         <hr>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="psw" placeholder="Enter Password" name="password" required>
      <input type="checkbox" onclick="myFunction()" > Show Password
      <div class="row"> 
      <div class="col-md-2">
      <button type="submit" style="height: 50px; border-radius: 5px">Login</button>
      </div>
      <div class="col-md-2">
      <button type="button" style="height: 50px; border-radius: 5px" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
      </div>
    </div>
  </form>
</div>
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