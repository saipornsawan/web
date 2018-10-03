<?php 
include("head.php");
include("login.php");
include("sign.php");
 ?>
<html>

<head>




<script>
// Get the modal
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal2 = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal2) {
        modal.style.display = "none";
    }
}
var modal3 = document.getElementById('id03');
window.onclick = function(event) {
    if (event.target == modal3) {
        modal.style.display = "none";
    }
}
</script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
<div class="wrapper" >
           
        <nav id="sidebar" >
            <div class="sidebar-header">
            <h3><a href="index.php">I <i class="fas fa-heart"></i> WebBoard</a></h3>
            </div>

            <ul class="list-unstyled components">
                <?php
                    if(isset($_SESSION["member_name"])){
                ?>
                <li><a href="question_me.php?page=1"><i class="fas fa-home"></i> หน้าแรก</a><li>
                    <?php
					    if($_SESSION["member_name"]){
						if($_SESSION["member_approve"]=="ผู้ดูแลระบบ"){
                    ?>
                <li><a href="member.php?page=1"><i class="fas fa-user-cog"></i>  จัดการสมาชิก</a></li>
                <li><a onclick="document.getElementById('id02').style.display='block'"><i class="fas fa-user-plus"></i> เพิ่มสมาชิก</a></li>
					<?php 
						}
					?>
				
				<li><a href="user_edit.php"><i class="fas fa-user-edit"></i> แก้ไขข้อมูลส่วนตัว</a></li>
			
			<?php 
			}
        }
        ?>

             <?php
                if(!isset($_SESSION["member_name"])){
                ?>
                    <li>
                        <a id="login_btn" onclick="document.getElementById('id01').style.display='block'">เข้าสู่ระบบ</a>
                    </li>
                    
                <?php
                }else{
                    ?>
                        <li>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
                        </li>
                    <?php 
                }
                ?>
                </ul>
        </nav>
    </div>

        <!-- Page Content  -->
        
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


</body>

</html>
