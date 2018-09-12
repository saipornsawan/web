$(document).ready(function () {
    
    $(window).dblclick( function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
    /** 
    var start,stop;

$("#draggable2").draggable({
    axis: "x",
    start: function(event, ui) {
        start = ui.position.left;
    },
    stop: function(event, ui) {
        stop = ui.position.left;
        alert('has moved ' + ((start < stop) ? 'rigth':'left'))
    }
});
*/
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    
});

/*
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
   rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
*/