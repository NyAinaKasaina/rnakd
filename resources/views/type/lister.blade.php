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
        <a href="/type/create">Ajouter</a>
        <hr>
        <table>
            <tbody>
                @foreach($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->domaine_id }}</td>
                    <td>
                        <a href="/type/{{ $type->id }}/edit">Modifier</a>
                        <form action="/type/{{ $type->id }}" method="POST">
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