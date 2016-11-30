<table class="table bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Domaine</th>
            <th>Action</th>
        </tr>
    </thead>
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