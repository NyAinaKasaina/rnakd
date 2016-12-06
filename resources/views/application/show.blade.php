<?php
    $access = "readonly";
    $button = "disabled";
    $url = '/403';
    if(isset($grant)) {
        $access = $grant['input'];
        $button = $grant['button'];
        $url = '/application/'.$application['id'];
    }
?>
<div class="shadow" id="details-app">
    <div class="app-bar" style="padding: 5px;">
        <span class="header">Details de l'application:</span>
    </div>
    <div style="padding: 30px 30px;">
        
        <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <label for="id">ID:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" name="id" id="id" value="{{ $application['id'] }}" readonly=""/>
            </div>
            <br>
            <label for="nom">Nom:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" name="nom" id="nom" value="{{ $application['nom'] }}" {{ $access }}=""/>
            </div>
            <br>
            <label for="description">Description:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" name="description" id="description" value="{{ $application['description'] }}" {{ $access }}=""/>
            </div>
            <br>
            <label for="details">Details:</label>
            <br>
            <div class="input-control textarea full-size">
                <textarea id="details" name="details" {{ $access }}="">{{ $application['description'] }}</textarea>
            </div>
            <br>
            <label for="date_de_creation">Date de création:</label>
            <br>
            <div class="input-control text full-size" id="datepicker">
                <input type="text" name="date_de_creation" id="date_de_creation" {{ $access }}=""/>
                <button class="button" {{ $button }}=""><span class="mif-calendar"></span></button>
            </div>
            <br>
            <label for="mail_PG">Contact garant:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" name="mail_PG" id="mail_PG" value="{{ $application['mail_PG'] }}" {{ $access }}=""/>
            </div>
            <br>
            <div class="image-container rounded">
                <div class="frame">
                    <div id="sary">
                        <img src="/images/{{ $application['thumbnail'] }}" alt="thumbnail"/>
                    </div>
                </div>
            </div>
            <div class="input-control file full-size" data-role="input">
                <input type="file" name="thumbnail" id="thumbnail" {{ $access }}=""/>
                <button class="button" type="button"><span class="mif-folder"></span></button>
            </div>
            @if(isset($grant))
            <center>
                <button class="button shadow info" type="submit">Modifier</button>
                <button class="button shadow warning" type="reset">Annuler</button>
            </center>
            @endif
        </form>
    </div>
    
    <div class="app-bar" style="padding: 5px;">
        <button class="button warning place-right" onclick="cycleApp({{ $application['id'] }})">
            <span class="mif-users"></span> Cycle de vie de l'application
        </button>
    </div>
    </div>
</div>
<script>
    $(function(){
        $("#datepicker").datepicker({
            date: '{{ $application['date_de_creation'] }}',
            locale: 'fr',
            format: 'dd/mm/yyyy'
        });
    });
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
</script>