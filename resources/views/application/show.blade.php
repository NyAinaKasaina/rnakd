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
        
        <form method="POST" action="{{ $url }}">
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
                <input type="text" name="date_de_creation" id="date_de_creation" value="{{ $application['date_de_creation'] }}" {{ $access }}=""/>
                <button class="button" {{ $button }}=""><span class="mif-calendar"></span></button>
            </div>
            <br>
            <label for="mail_PG">Contact garant:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" name="mail_PG" id="mail_PG" value="{{ $application['mail_PG'] }}" {{ $access }}=""/>
            </div>
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
        $("#datepicker").datepicker();
    });
</script>