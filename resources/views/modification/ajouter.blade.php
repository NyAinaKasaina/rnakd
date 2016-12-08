
<h1>Modification</h1>
<hr>
<form method="POST" action="/modification">
    {{ csrf_field() }}

    <input type="hidden" name="application_id" value="{{ $application_id }}"/>
    <div class="input-control text full-size" id="datepicker">
        <label>Date:</label>
        <input type="text" name="date_de_modification" value="{{ date("d/m/Y") }}" />
        <button type="button" class="button"><span class="icon mif-calendar"></span></button>
    </div>

    <textarea name="motif">
    Motif
    </textarea>

    <select name="degre" required="">
        <option value=""> --- Degré ---</option>
        <option value="mineur"> --- Mineur ---</option>
        <option value="majeur"> --- Majeur ---</option>
        <option value="stabilite"> --- Stabilité ---</option>
    </select>

    <input type="email" name="mailDeveloppeur_PG"/>

    <button type="submit">Valider</button>
    <button type="reset">Annuler</button>
</form>
<script type="text/javascript">
    $(function(){
        $("#datepicker").datepicker({
            date: '{{ date("d/m/Y") }}',
            locale: 'fr',
            format: 'dd/mm/yyyy'
        });
    });
</script>