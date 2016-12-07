/* 
 * Mamy RAOBY
 * mamyraoby@outlook.com
 * +261 34 27 71 392
 */
$('#thumbnail').on('change', function(){
    var countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#sary");
    image_holder.empty();
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
      if (typeof(FileReader) != "undefined") {
        for (var i = 0; i < countFiles; i++) 
        {
          var reader = new FileReader();
          reader.onload = function(e) {
            $("<img />", {
              "src": e.target.result,
              "class": "thumb-image"
            }).appendTo(image_holder);
          }
          image_holder.show();
          reader.readAsDataURL($(this)[0].files[i]);
        }
      } else {
        alert("Desolé, votre navigateur ne supporte pas le lecture de fichier.");
      }
    } else {
      alert("Veuiller selectionner seulement une image.");
    }
});