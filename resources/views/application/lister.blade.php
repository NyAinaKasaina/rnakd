@foreach($applications as $applicaation)
<tr>
    <td>{{ $application['id'] }}</td>
    <td>{{ $application['nom'] }}</td>
    <td>{{ $application['domaine'] }}</td>
    <td>{{ $application['description'] }}</td>
    <td>{{ $application['date_de_modification'] }}</td>
    <td>{{ $application['version'] }}</td>
    <td>{{ $application['nomGarant'] }}</td>
    <td>Invité</td>
</tr>
@endforeach
