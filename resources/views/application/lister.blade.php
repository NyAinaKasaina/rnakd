@foreach($tableauApplications as $application)
<tr onclick="showApp({{ $application['id'] }})">
    <td>{{ $application['id'] }}</td>
    <td>{{ $application['nom'] }}</td>
    <td>{{ $application['domaine'] }}</td>
    <td>{{ $application['types'] }}</td>
    <td>{{ $application['description'] }}</td>
    <td>{{ $application['date_de_modification'] }}</td>
    <td>{{ $application['version'] }}</td>
    <td>{{ $application['nomGarant'] }}</td>
</tr>
@endforeach
