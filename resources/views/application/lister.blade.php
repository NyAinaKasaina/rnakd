<!DOCTYPE html>
<!--
Mamy RAOBY
mamyraoby@outlook.com
+261 34 27 71 392
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tbody>
                @foreach($domaines as $domaine)
                <tr>
                    <td>{{ $domaine->id }}</td>
                    <td>{{ $domaine->domaine }}</td>
                    <td>Action</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
