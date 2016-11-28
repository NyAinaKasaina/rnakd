<!DOCTYPE html>
<!--
Mamy RAOBY
mamyraoby@outlook.com
+261 34 27 71 392
-->

<!--public $fillable = ['nom','description','details','date_de_creation','thumbnail','idGarant_PG','type_id'];-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date dernier modif</th>
                    <th>Version</th>
                    <th>Nom du garant</th>
            </thead>
            <tbody>
                @foreach($tableauApplications as $application)
                <tr>
                  <td>{{$application['id']}}</td>
                  <td>{{$application['domaine']}}</td>
                  <td>{{$application['description']}}</td>
                  <td>{{$application['date_de_modification']}}</td>
                  <td>{{$application['version']}}</td>
                  <td>{{$application['nomGarant']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
