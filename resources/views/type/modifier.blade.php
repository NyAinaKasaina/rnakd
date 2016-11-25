<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="fr"/>
        <title>Modifier type</title>
    </head>
    <body>
        <h1>Modifier type</h1>
        <hr>
        <form method="POST" action="/type/{{ $type->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT"/>
            <br>
            <label for="type">Type:</label>
            <br>
            <input type="text" name="type" id="type" value="{{ $type->type }}" required=""/>
            <br>
            <label for="domaine_id">Domaine:</label>
            <br>
            <select name="domaine_id" id="domaine_id" required="">
                <option value=""></option>
                @foreach($domaines as $domaine)
                <option value="{{ $domaine->id }}">{{ $domaine->domaine }}</option>
                @endforeach
            </select>
            <br>
            <button type="submit">Valider</button>
            <button type="reset">Annuler</button>
        </form>
    </body>
</html>