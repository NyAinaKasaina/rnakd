<!DOCTYPE html>
<html>
<head>
    <title>Ajouter DOMAINE</title>
</head>
<body>
	<h1>Nouvelle App</h1>
        <hr>
        <form method="POST" action="/domaine">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <br>
            <label for="domaine">Domaine:</label>
            <br>
            <input type="text" id="domaine" name="domaine" placeholder="Domaine" size="30" required=""/> 
            
            <button type="submit">Valider</button>
            <button type="reset">Annuler</button>
        </form>
</body>
</html>