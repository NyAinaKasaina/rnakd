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

function actualiser(){
    actualiserTable();
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
            activateDatatable();
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

/* Events */
$('.triage').on('click', function (){
    var column = $(this).attr("data-column");
    var desc = 'mif-arrow-down triage';
    var asc = 'mif-arrow-up triage';
    var order = function () {
        var ret = "ASC";
        if($('#order').val() === "ASC") {
            ret = "DESC";
            var tmp = desc;
            desc = asc;
            asc = tmp;
        }
        return ret;
    };
    $('#order').val(order);
    $('#column').val(column);
    $('.triage').attr('class','mif-list2 triage');
    $(this).attr('class',asc + ' fg-white');
    actualiserTable();
});

function activateDatatable(){
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
                "next" : "<span class='mif-next' title='Page suivant'></span>",
                "previous": "<span class='mif-previous' title='Page précédent'></span>",
                "first" : "Début",
                "last" : "Fin"
            }
        }
    });
}