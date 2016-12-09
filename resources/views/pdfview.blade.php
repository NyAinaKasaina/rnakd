<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>
<div class="container">
	<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
	<table>
		<tr>
			<th>id</th>
			<th>type</th>
			<th>Domaine</th>
		</tr>
		@foreach ($types as $key => $item)
		<tr>
			<td>{{ $item->id }}</td>

			<td>{{ $item->type }}</td>

			<td>{{ $item->domaine_id }}</td>

		</tr>
		@endforeach
	</table>
</div>
