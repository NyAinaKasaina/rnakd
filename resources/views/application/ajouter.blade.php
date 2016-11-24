<!DOCTYPE html>
<html>
<head>
    <title>Ajouter nouvelle application</title>
</head>
<body>
	<h1>Nouvelle App</h1>
        <hr>
        <form method="POST" action="application">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <br>
            <label for="nom">Nom de l'application:</label>
            <br>
            <input type="text" id="nom" name="nom" placeholder="Nom de l'application" size="30" required=""/>

            <br>
            <label for="description">Bref description:</label>
            <br>
            <input type="text" id="description" name="description" placeholder="Bref description" size="30" required=""/>

            <br>
            <label for="details">Description plus detaillée:</label>
            <br>
            <textarea type="text" id="details" name="details" placeholder="Details de l'application" size="30" required=""></textarea>

            <br>
            <label for="type_id">Type de l'application:</label>
            <br>
            <select id="type_id" name="type_id" required="">
                <option value=""></option>
                <option value="1">Type 1</option>
                <option value="2">Type 2</option>
                <option value="3">Type 3</option>
            </select>

            <br>
            <label for="date_de_creation">Date de création</label>
            <br>
            <input type="date" id="date_de_creation" name="date_de_creation" size="30" placeholder="Date de creation" required=""/>

            <br>
            <label for="garant">Nom du garant:</label>
            <br>
            <input type="text" id="garant" name="garant" size="30" placeholder="Nom du garant" required=""/>

            <br>
            <label for="idGarant_PG">Contact du garant:</label>
            <br>
            <input type="email" id="idGarant_PG" name="idGarant_PG" placeholder="moi@example.com" size="30" required=""/>
            <br>
            
            <br>
            <label for="thumbnail">Capture d'ecran</label>
            <br>
            <input type="file" name="thumbnail" id="thumbnail" required="">
            <br>

            <button type="submit">Valider</button>
            <button type="reset">Annuler</button>
        </form>
</body>
</html>