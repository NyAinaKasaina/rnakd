<div style="padding: 20px 20px; max-height: 70%;overflow: auto;">
    <h2>Nouvelle Application</h2>
    <hr>
    <br>
    <form method="POST" action="/application" id="formula">
        {{ csrf_field() }}

        <label for="nom">Nom de l'application:</label>
        <br>
        <div class="input-control text full-size">
            <span class="mif-apps prepend-icon"></span>
            <input type="text" id="nom" name="nom" placeholder="Nom de l'application" required="">
        </div>

        <label for="description">Bref description:</label>
        <br>
        <div class="input-control text full-size">
            <span class="mif-apps prepend-icon"></span>
            <input type="text" id="description" name="description" placeholder="Description de l'application" required="">
        </div>

        <label for="details">Description plus detaillée:</label>
        <br>
        <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
            <textarea type="text" id="details" name="details" placeholder="Details de l'application" required=""></textarea>
        </div>

        <label for="type_id">Type de l'application:</label>
        <br>
        <div class="input-control select full-size">
            <select id="type_id" name="type_id" style="padding-left: 12px;" required="">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>

        <label for="date_de_creation">Date de création</label>
        <br>
        <div class="input-control text full-size" data-role="datepicker">
            <span class="mif-calendar prepend-icon"></span>
            <input type="text" id="date_de_creation" name="date_de_creation" placeholder="Date de creation" required=""/>
            <button class="button"><span class="mif-calendar"></span></button>
        </div>

        <label>Nom du garant</label>
        <br>
        <div class="input-control text full-size">
            <span class="mif-user prepend-icon"></span>
            <input type="text" id="garant" name="garant" placeholder="Nom du garant" required="">
        </div>

        <label>Contact du garant</label>
        <br>
        <div class="input-control email full-size">
            <span class="mif-mail prepend-icon"></span>
            <input type="text" id="mail_PG" name="mail_PG" placeholder="moi@example.com" required="">
        </div>

        <label>Capture d'ecran</label>
        <br>
        <div class="input-control file full-size" data-role="input">
            <span class="mif-image prepend-icon"></span>
            <input type="file" name="thumbnail" id="thumbnail" placeholder="Fichier de capture d'ecran de l'application" required="">
            <button class="button"><span class="mif-folder"></span></button>
        </div>
        <center>
            <button class="button info shadow" type="submit">Valider</button>
            <button class="button warning shadow" type="reset" onclick="switchToDiv('main')">Annuler</button>
        </center>
    </form>
</div>

<!--<script>
    $(function(){
        $("#datepicker").datepicker();
    });
    $('#formula').submit(ajaxApplink);
</script>-->