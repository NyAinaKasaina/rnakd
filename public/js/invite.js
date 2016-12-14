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
            if(title === "Type" || title === "Domaine" || title === "Nom du garant") {
                $(this).html( '<input type="text" placeholder="Rechercher '+title+'" />' );
            }
        } );
        var table = $('#applitable').DataTable({
        "searching" : true,
        "language" : {
                    "sProcessing":     "Traitement en cours...",
                    "sSearch":         "Rechercher&nbsp;:",
                    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix":    "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                            "sFirst":      "<span class='mif-next' title='Page suivant'></span>",
                            "sPrevious":   "<span class='mif-previous' title='Page précédent'></span>",
                            "sNext":       "<span class='mif-next' title='Page suivant'></span>",
                            "sLast":       "<span class='mif-next' title='Page suivant'></span>"
                    },
                    "oAria": {
		"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
		"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
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