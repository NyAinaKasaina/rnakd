<div class="shadow" id="details-app" style="min-height: 500px;overflow: auto">
    <div class="app-bar" style="padding: 5px;">
        <span class="header">Modification:</span>
    </div>
    <div style="padding: 30px 30px;">
        <form method="POST" action="/modification" id="addModif">
            {{ csrf_field() }}

            <input type="hidden" name="application_id" value="{{ $application_id }}"/>
          
            <label for="date_de_modification">Date:</label>
            <div class="input-control text full-size" id="datepicker">
                <input type="text" name="date_de_modification" value="{{ date("d/m/Y") }}" />
                <button type="button" class="button"><span class="icon mif-calendar"></span></button>
            </div>
            
            <br>
            <label for="motif">Motif:</label>
            <div class="input-control text full-size" id="datepicker">
                <textarea name="motif"></textarea>
            </div>
            
            <br>
            <label for="degre">Degré de modification</label>
            <div class="input-control select full-size">
                <select name="degre" required="">
                    <option value=""> --- Degré ---</option>
                    <option value="mineur"> --- Mineur ---</option>
                    <option value="majeur"> --- Majeur ---</option>
                    <option value="stabilite"> --- Stabilité ---</option>
                </select>
            </div>
            
            <br>
            <label for="email">Email developpeur:</label>
            <div class="input-control email">
                <input type="email" name="mailDeveloppeur_PG"/>
            </div>
            
            <br>
            <button type="submit">Valider</button>
            <button type="reset">Annuler</button>
        </form>
        
    </div>
    
</div>

<script type="text/javascript">
    $(function(){
        $("#datepicker").datepicker({
            date: '{{ date("d/m/Y") }}',
            locale: 'fr',
            format: 'dd/mm/yyyy'
        });
    });
    $('#addModif').submit(ajaxApplink);
</script>