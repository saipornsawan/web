function previewImages() {
    var total_file = document.getElementById("fileToUpload").files.length;
    
    for(var i=0;i<total_file;i++)
    {
     $('#image_preview').append("<div class='col-md-3'><img class='img-responsive'  width='200' height='auto' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
    }
  
  }
  
 