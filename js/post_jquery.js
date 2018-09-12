
$(document).ready(function(){	
    $("#btn1").click(function(){
        var parts = window.location.search.substr(1).split("&");
		var $_GET = {};
		for (var i = 0; i < parts.length; i++) {
		    var temp = parts[i].split("=");
		    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
		}
		//alert();
		location.href = "question_add.php?category="+$_GET["category"];
    });
});

