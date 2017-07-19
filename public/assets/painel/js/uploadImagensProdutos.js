$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        
        $("#imagem").on("change", function(e) {
        
            var files = e.target.files,
        
              filesLength = files.length;
                  for (var i = 0; i < filesLength; i++) {
                    
                    var f = files[i]
                    var fileReader = new FileReader();
                    
                    fileReader.onload = (function(e) {
                        
                        var file = e.target;
                        
                        $("<span class=\"pip\">" +
                            "<img class=\"img-thumbnail imageThumb\" src=\"" + e.target.result + "\" title=\"" + f.name + "\"/>" +
                            "<br/><span class=\"fa fa-remove remove\"></span>" +
                            

                            
                            "<input type=\"text\" class=\"form-control titulo-imagem\" id=\"produto-titulo\" name=\"produto-titulo\" value=\""+ f.name +"\">" +

                          "</span>").insertBefore("#imagem");


                        $(".remove").click(function(){
                          $(this).parent(".pip").remove();
                        
                    

                    });
              });

              fileReader.readAsDataURL(f);

            }
        });
    } else {
          alert("Seu navegador não suporta File API")
  }
});




