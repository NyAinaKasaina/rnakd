@foreach($tableauApplications as $application)
<tr onclick="showApp({{ $application['id'] }})">
    <td>{{ $application['id'] }}</td>
    <td id="appname{{ $application['id'] }}">{{ $application['nom'] }}</td>
    <td>{{ $application['domaine'] }}</td>
    <td>{{ $application['types'] }}</td>
    <td>{{ $application['description'] }}</td>
    <td>{{ date("d M Y", strtotime($application['date_de_modification'])) }}</td>
    <td>{{ $application['version'] }}</td>
    <td>{{ $application['nomGarant'] }}</td>
</tr>
@endforeach