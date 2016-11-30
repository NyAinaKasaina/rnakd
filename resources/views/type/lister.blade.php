<table class="table bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>ID Domaine</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($types as $type)
        <tr>
            <td>{{ $type->id }}</td>
            <td>{{ $type->type }}</td>
            <td>{{ $type->domaine_id }}</td>
            <td>
                <button class="button warning" onclick="modifierType({{ $type->id }})" title="Modifier"><span class="mif-pencil"></span></button>
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