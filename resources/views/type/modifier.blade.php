<div style="padding: 20px 20px; max-height: 70%;overflow: auto;">
        <h1>Modifier type</h1>
        <hr>
        <form method="POST" action="/type/{{ $type->id }}" id="modifdom">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT"/>
            <br>
            <label for="type">Type:</label>
            <br>
            <div class="input-control text full-size">
                <input type="text" name="type" id="type" value="{{ $type->type }}" required=""/>
            </div>
                <br>
            <label for="domaine_id">Domaine:</label>
            <br>
            <div class="input-control select full-size">
                <select name="domaine_id" id="domaine_id" required="">
                    <option value="">---</option>
                    @foreach($domaines as $domaine)
                        @if($domaine->id == $type->domaine_id)
                          <option value="{{ $domaine->id }}" selected="">{{ $domaine->domaine }}</option>
                        @else
                            <option value="{{ $domaine->id }}">{{ $domaine->domaine }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <br>
            <center>
                <button type="submit" class="button shadow info">Valider</button>
                <button type="reset" class="button shadow warning">Annuler</button>
            </center>
        </form>
</div>
<script>
    $('#modifdom').submit(ajaxApplink);
</script>