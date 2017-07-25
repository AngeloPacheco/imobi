// Logomarca empresa
$("#imagem").on('change', function () {

        if (typeof (FileReader) != "undefined") {

            var image_holder = $("#logomarca");
            image_holder.empty();

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "class": "img-thumbnail renderiza-foto-show"
                }).appendTo(image_holder);

            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("Seu navegador não renderiza essa imagem.");
          }
});
