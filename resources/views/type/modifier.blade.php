<!DOCTYPE html>
<html>
<head>
    <title>Ajouter nouvelle application</title>
</head>
<body>
	<h1>Nouvelle App</h1>
        <hr>
        <form method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT"/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <br>
            <label for="id">ID:</label>
            <br>
            <input type="text" id="id" name="id" placeholder="ID de l'application" size="30" value="{{ $id }}" readonly=""/> 
            
            <br>
            <label for="nom">Nom de l'application:</label>
            <br>
            <input type="text" id="nom" name="nom" placeholder="Nom de l'application" size="30" value="" required=""/> 
 
            <br>
            <label for="description">Bref description:</label>
            <br>
            <input type="text" id="description" name="description" placeholder="Bref description" size="30" value="" required=""/> 
            
            <br>
            <label for="details">Description plus detaillée:</label>
            <br>
            <textarea type="text" id="details" name="details" placeholder="Details de l'application" size="30" required=""></textarea>
            
            <br>
            <label for="type">Type de l'application:</label>
            <br>
            <select id="type" name="type" required="">
                <option value=""></option>
                <option value="1">Type 1</option>
                <option value="2">Type 2</option>
                <option value="3">Type 3</option>
            </select>
            
            <br>
            <label for="date">Date de création</label>
            <br>
            <input type="date" id="date" name="date" size="30" placeholder="Date de creation" value="" required=""/>
            
            <br>
            <label for="garant">Nom du garant:</label>
            <br>
            <input type="text" id="garant" name="garant" size="30" placeholder="Nom du garant" value="" required=""/>

            <br>
            <label for="garant">Contact du garant:</label>
            <br>
            <input type="email" id="contact" name="contact" placeholder="moi@example.com" size="30" value="" required=""/>
            <br>
            <br>
            
            <button type="submit">Valider</button>
            <button type="reset">Annuler</button>
        </form>
</body>
</html>