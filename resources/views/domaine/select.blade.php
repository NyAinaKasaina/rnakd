<option value="%">Tous</option>
@foreach($domaines as $domaine)
<option value="{{ $domaine->id }}">{{ $domaine->domaine }}</option>
@endforeach