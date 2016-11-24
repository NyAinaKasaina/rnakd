<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" lang="fr"/>
        <title>Ajouter type</title>
    </head>
    <body>
        <h1>Ajouter type</h1>
        <hr>
        <form method="POST" action="/type">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <br>
            <label for="type">Type:</label>
            <br>
            <input type="text" name="type" id="type" required=""/>
            <br>
            <label for="domain_id">Domaine:</label>
            <br>
            <select required="">
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