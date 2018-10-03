<link rel="stylesheet" href="css/sign.css">
<div id="id02" class="modal2">
  
  <form name="form1" class="modal-content1 animate" action="register_send.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container1">
    <h3 style="text-align: center;">เพิ่มสมาชิก</h3>
         <hr>
         <div class="row">
        <div class="col-md-6">
         <label for="uname"><b>Username</b></label>
         <input type="text" placeholder="Enter Username" name="username" title="กรุณาระบุชื่อผู๋ใช้" required>
         </div>

         <div class="col-md-6">
         <label for="psw"><b>Password</b></label>
         <input type="password" id="psw2" placeholder="Enter Password" name="password" title="กรุณาระบุรหัสผ่าน" required>
         <input type="checkbox" id="showpsw" onclick="myFunction2()"> Show Password
         </div>

         <div class="col-md-6">
         <label><b>ชื่อ</b></label>
         <input type="text" name="name" placeholder="ระบุชื่อ" title="กรุณาระบุชื่อของคุณ" pattern="{3,}" title="กรุณาระบุชื่อ" required>
         </div>

         <div class="col-md-6">
         <label><b>นามสกุล</b></label>
         <input type="text" name="l_name" placeholder="ระบุนามสกุล" pattern="{3,}" title="กรุณาระบุนามสกุล" >
         </div>

         <div class="col-md-6">
         <label><b>เบอร์โทรศัพท์</b></label>
         <input type="text" name="tel" placeholder="ระบุเบอร์โทรศัพท์" pattern="[0-9]{9,}" title="กรุณาระบุเบอร์โทรศัพท์" required>
         </div>

         <div class="col-md-6">
         <label><b>อีเมล</b></label>
         <input type="text" name="email" placeholder="ระบุอีเมล">
         </div>

         </div>
         <label><b>สิทธิ์การเข้าถึง</b></label><br>
         <input type="radio" name="appove" value="สมาชิกทั่วไป"> สมาชิกทั่วไป
         <input type="radio" name="appove" value="ผู้ดูแลระบบ"> ผู้ดูแลระบบ
         <div class="row"> 
      <div class="col-md-2">
      <button type="submit" style="height: 50px; border-radius: 5px;">เพิ่มสมาชิก</button>
      </div>
      <div class="col-md-2">
      <button type="button" style="height: 50px;border-radius: 5px;" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
      </div>
    </div>

    
  </form>
</div>
<script language="javascript">
function checkID(id)
{
if(id.length != 13) return false;
for(i=0, sum=0; i < 12; i++)
sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12)))
return false; return true;}

function checkForm(){
var str = "ไม่ถูก";
var str2 = "ถูก";
if(!checkID(document.form1.PID.value))
document.getElementById("demo").innerHTML = str;
else document.getElementById("demo").innerHTML = str2;
}
</script>
<script>
function myFunction2() {
    var x = document.getElementById("psw2");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>