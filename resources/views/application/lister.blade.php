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
                @foreach($applications as $applicaation)
                    <th>{{ $application->id }}</th>
                    <th>{{ $application->nom }}</th>
                    <th>{{ $application->desciption }}</th>
                    <th>{{ $application->domaine }}</th>
                    <th>{{ $application->date }}</th>
                    <th>{{ $application->version }}</th>
                    <th>{{ $application->nom_garant }}</th>
                @endforeach
                <tr>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
