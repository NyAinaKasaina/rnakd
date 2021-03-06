<div class="shadow" id="details-app" style="margin-top: 70px;">
    <div class="app-bar" style="padding: 5px;">
        <span class="header">Cycle de vie de l'application: <span id="appnamem"></span></span>
        @if(isset($grant))
            <button class="button info place-right" onclick="updateApp('{{ $idapp }}')"><span class="mif-plus"></span></button>
        @endif
    </div>
    <div style="padding: 30px 30px;">
        <table class="table striped">
            <thead>
                <tr>
                    <th>Date de modifiaction</th>
                    <th>Nom du dev</th>
                    <th>Version</th>
                    <th>Motif de modification</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($modification))
                    @foreach($modification as $modificationTable)
                    <tr>
                        <td>{{ date("d-M-y",strtotime($modificationTable['date_de_modification'])) }}</td>
                        <td>{{ $modificationTable['nomDev'][0]->Nom_prenoms }}</td>
                        <td>{{ $modificationTable['version'] }}</td>
                        <td>{{ $modificationTable['motif'] }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4"><center>Cette application n'a pas encore des mise à jour.</center></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@if(isset($grant))
<script>
    $(function (){
        $('#appnamem').text($('#appname{{ $idapp }}').text());
    });
    function updateApp(id) {
        switchToDiv('submain');
        $('#submain-content').html($('#loading').html());
        $('#submain-content').load('/modification/create?application_id='+id);
    }
</script>
@endif
