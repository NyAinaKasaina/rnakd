<!DOCTYPE html>
<html>
<head>
    <title>Modifier DOMAINE</title>
</head>
<body>
	<h1>Domaine</h1>
        <hr>
        <form method="POST" action="/domaine/{{ $domaine->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="PUT"/>

            <br>
            <label for="domaine">Domaine:</label>
            <br>
            <input type="text" id="domaine" name="domaine" placeholder="Domaine" value="{{ $domaine->domaine }}" size="30" required=""/>

            <button type="submit">Valider</button>
            <button type="reset">Annuler</button>
        </form>
</body>
</html>
