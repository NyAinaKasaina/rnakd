<div style="padding: 20px 20px; max-height: 70%;overflow: auto;">
	<h1>Domaine</h1>
        <hr>
    <form method="POST" action="/domaine" id="formula">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <br>
        <label for="domaine">Nouveau domaine:</label>
        <br>
        <div class="input-control text full-size">
            <input type="text" id="domaine" name="domaine" placeholder="Nouveau domaine" size="30" required=""/>
        </div>
        <center>
            <button type="submit" class="button info shadow">Valider</button>
            <button type="reset" class="button warning shadow" onclick="switchToDiv('main')">Annuler</button>
        </center>
    </form>
</div>
<script>
    $(function(){
        $("#datepicker").datepicker();
    });
    $('#formula').submit(ajaxApplink);
</script>