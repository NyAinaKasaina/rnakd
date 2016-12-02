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
            <input type="hidden" name="_method" value="PUT"/>
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
<script>
    $(function(){
        $("#datepicker").datepicker({
            date: '{{ $application['date_de_creation'] }}',
            locale: 'fr',
            format: 'd/m/year'
        });
    });
</script>