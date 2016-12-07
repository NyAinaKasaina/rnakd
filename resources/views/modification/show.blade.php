<div class="shadow" id="details-app" style="margin-top: 70px;">
    <div class="app-bar" style="padding: 5px;">
        <span class="header">Cycle de vie de l'application:</span>
        <button class="button info"></button>
    </div>
    <div style="padding: 30px 30px;">
        <table class="table hovered">
            <thead>
                <tr>
                    <th>Date de modifiaction</th>
                    <th>Nom du dev</th>
                    <th>Version</th>
                    <th>Motif de modification</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ date("d-M-y",strtotime($modification['date_de_modification'])) }}</td>
                    <td>{{ $modification['nomDev'] }}</td>
                    <td>{{ $modification['version'] }}</td>
                    <td>{{ $modification['motif'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>