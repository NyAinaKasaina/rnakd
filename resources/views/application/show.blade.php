<div class="shadow">
    <div class="app-bar" style="padding: 5px;">
        <span class="header">Details de l'application:</span>
    </div>
    <div style="padding: 30px 50px;">
        
        <div class="input-control text full-size">
        <label for="nom">Nom de l'application:</label>
        <span class="mif-apps prepend-icon"></span>
        <input type="text" id="nom" name="nom" placeholder="Nom de l'application" required="">
    </div>

    <div class="input-control text full-size">
        <label for="description">Bref description:</label>
        <span class="mif-apps prepend-icon"></span>
        <input type="text" id="description" name="description" placeholder="Description de l'application" required="">
    </div>
    
    <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
        <label for="details">Description plus detaillée:</label>
        <textarea type="text" id="details" name="details" placeholder="Details de l'application" required=""></textarea>
    </div>

    <div class="input-control select full-size">
        <label for="type_id">Type de l'application:</label>
        <select id="type_id" name="type_id" style="padding-left: 12px;" required="">
            <option>1</option>
            <option>2</option>
            <option>3</option>
        </select>
    </div>
    
    <div class="input-control text full-size" data-role="datepicker">
        <label for="date_de_creation">Date de création</label>
        <span class="mif-calendar prepend-icon"></span>
        <input type="text" id="date_de_creation" name="date_de_creation" placeholder="Date de creation" required=""/>
        <button class="button"><span class="mif-calendar"></span></button>
    </div>
    
    <div class="input-control text full-size">
        <label>Nom du garant</label>
        <span class="mif-user prepend-icon"></span>
        <input type="text" id="garant" name="garant" placeholder="Nom du garant" required="">
    </div>

    <div class="input-control email full-size">
        <label>Contact du garant</label>
        <span class="mif-mail prepend-icon"></span>
        <input type="text" id="mail_PG" name="mail_PG" placeholder="moi@example.com" required="">
    </div>

    <div class="input-control file full-size" data-role="input">
        <label>Capture d'ecran</label>
        <span class="mif-image prepend-icon"></span>
        <input type="file" name="thumbnail" id="thumbnail" placeholder="Fichier de capture d'ecran de l'application" required="">
        <button class="button"><span class="mif-folder"></span></button>
    </div>
    <div class="button-group">
        <button class="button" type="submit">Valider</button>
        <button class="button" type="reset">Annuler</button>
    </div>
        
        
    </div>
    <div class="app-bar" style="padding: 5px;">
        <a class="place-right" href="/applink/invite">
            <span class="mif-users"></span> Cycle de vie de l'application
        </a>
    </div>
</div>