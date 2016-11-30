<div style="padding: 20px 20px; max-height: 70%;overflow: auto;">
        <h1>Ajouter type</h1>
        <hr>
        <br>
        <form method="POST" action="/type" id="formula">
            {{ csrf_field() }}
            <br>
            <label for="type">Type:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" name="type" id="type" placeholder="Type" required=""/>
            </div>
            <br>
            <label for="domaine_id">Domaine:</label>
            <br>
            <div class="input-control select full-size">
                <select name="domaine_id" id="domaine_id" required="">
                    <option value="">--- Choisir un domaine ---</option>
                    @foreach($domaines as $domaine)
                    <option value="{{ $domaine->id }}">{{ $domaine->domaine }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <center>
                <button type="submit" class="button shadow info">Valider</button>
                <button type="reset" class="button shadow warning" onclick="switchToDiv('main')">Annuler</button>
            </center>
        </form>
</div>
<script>
    $('#formula').submit(ajaxApplink);
</script>