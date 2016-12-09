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
                <form action="/type/{{ $type->id }}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <button class="button warning shadow" onclick="modifierType({{ $type->id }})" title="Modifier"><span class="mif-pencil"></span></button>
                    <button type="submit" class="button warning shadow"><span class="icon mif-unlink"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>