<style>
table {
    width: 100%;
    margin: .625rem 0;
    border: 0.1em #999999 solid;
    font-size: 0.7em;
  }
table th,
table td {
  padding: 0.25rem;
}

table tr:nth-child(odd) {
    background: #eeeeee;
}

table tr:nth-child(even) {
    background: #dddddd;
}
</style>
<table>
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
</table>