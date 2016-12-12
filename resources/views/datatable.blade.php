<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" lang="fr"/>
    </head>
    <body>
        <table class="dataTable" data-role="datatable" border='1'>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0;$i < 20;$i++)
                <tr>
                    <td>Name {{ $i }}</td>
                    <td>Adresse{{ $i }}</td>
                </tr>
                
                @endfor
            </tbody>
        </table>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/datatable.min.js') }}"></script>
        <script>
            $("table").dataTable({
                'searching' : true,
                'language': {
                    "lengthMenu": "Afficher _MENU_ résultats par page",
                    "zeroRecords": "Aucun résultat trouvé",
                    "info": "Afficher page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun resultat disponible",
                    "infoFiltered": "(filtré de _MAX_ enregistrements)",
                    "search": "Rechercher",
                    "paginate" : {
                        "next" : "Suivant",
                        "previous": "Précédent",
                        "first" : "Début",
                        "last" : "Fin"
                    }
                }
            });
        </script>
    </body>
</html>