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
        <hr>
            <a href="/domaine/create">Ajouter</a>
        <hr>
        <table>
            <tbody>
                @foreach($domaines as $domaine)
                <tr>
                    <td>{{ $domaine->id }}</td>
                    <td>{{ $domaine->domaine }}</td>
                    <td>
                        <button class="button warning" onclick="modifierDomaine({{ $domaine->id }})" title="Modifier"><span class="mif-pencil"></span></button>
                        <form action="/domaine/{{ $domaine->id }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <button type="submit">Effacer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
