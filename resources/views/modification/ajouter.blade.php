
<h1>Modification</h1>
<hr>
<form method="POST" action="/modification">
    {{ csrf_field() }}

    <input type="hidden" name="application_id" value="3"/>

    <input type="date" name="date_de_modification" />

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