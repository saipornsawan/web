$(function(){
    var max_length=13;
    $("#PID").keyup(function(){ // เมื่อ textarea id เท่ากับ data  มี event keyup
            var this_length=max_length-$(this).val().length; // หาจำนวนตัวอักษรที่เหลือ
            if(this_length<0){
                $(this).val($(this).val().substr(0,13)); // แสดงตามจำนวนตัวอักษรที่กำหนด
            }else{
                $("#now_length").html(this_length+" ตัวอักษร"); 
              // แสดงตัวอักษรที่เหลือ           
            }           
    });
});