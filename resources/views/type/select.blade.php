<option value="%">Tous</option>
@foreach($types as $type)
<option value="{{ $type->id }}">{{ $type->type }}</option>
@endforeach