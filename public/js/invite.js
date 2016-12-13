/* 
 * Mamy RAOBY
 * mamyraoby@outlook.com
 * +261 34 27 71 392
 */

function loadDomaine(){
    $.ajax({
        url: '/select/domaine',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data){
            $('#domaine').html(data);
            loadType();
        },
        error: function (){
          alert('error');  
        }
    });
}

function loadType(){
    $.ajax({
        url: '/select/type',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            domaine: $('#domaine').val()
        },
        success: function (data){
            $('#type').html(data);
            actualiserTable();
        },
        error: function (){
          alert('error');  
        }
    });
}

function showApp(id) {
    switchToDiv('submain');
    $('#submain-content').html($('#loading').html());
    $('#submain-content').load('/application/'+id);
}
function actualiserTable(){
    $.ajax({
        url: "/application",
        type: 'GET',
        data: {
            type: $('#type').val(),
            domaine: $('#domaine').val()
        },
        success: function(data){
            $('#liste').html(data);
//            $('#applitable').destroy();
            if(activateDatatable()){
                $('.dataTables_filter input').attr("placeholder", "Rechercher");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}

function switchToDiv(id) {
    $('.page-content').hide();
    $('#'+id).fadeIn(1000);
}

function cycleApp(id){
    switchToDiv('cycle');
    $('#cycle-vie').html($('#loading').html());
    $('#cycle-vie').load('/modification/'+id);
}

function activateDatatable(){
        $('#applitable tfoot th').each( function () {
            var title = $(this).text();
            if(title === "Type" || title === "Domaine") {
                $(this).html( '<input type="text" placeholder="Rechercher '+title+'" />' );
            }
        } );
        var table = $('#applitable').DataTable({
        "searching" : true,
        "language": {
            "lengthMenu": "Afficher _MENU_ résultats par page",
            "zeroRecords": "Aucun résultat trouvé",
            "info": "Afficher page _PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat disponible",
            "infoFiltered": "(filtré de _MAX_ enregistrements)",
            "search": "Rechercher :",
            "paginate" : {
                "next" : "<span class='mif-next' title='Page suivant'></span>",
                "previous": "<span class='mif-previous' title='Page précédent'></span>",
                "first" : "Début",
                "last" : "Fin"
            }
        }
    });
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    return true;
}