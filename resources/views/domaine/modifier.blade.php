<div style="padding: 20px 20px; max-height: 70%;overflow: auto;">
	<h1>Modifier Domaine</h1>
        <hr>
        <form method="POST" action="/domaine/{{ $domaine->id }}" id="modifdom">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="PUT"/>

            <br>
            <label for="domaine">Domaine:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" id="domaine" name="domaine" placeholder="Domaine" value="{{ $domaine->domaine }}" size="30" required=""/>
            </div>
            <center>
                <button type="submit" class="button shadow info">Valider</button>
                <button type="reset" class="button shadow warning">Annuler</button>
            </center>
        </form>
</div>
<script>
    $('#modifdom').submit(ajaxApplink);
</script>