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
            column: $('#column').val(),
            order: $('#order').val(),
            type: $('#type').val(),
            domaine: $('#domaine').val(),
            keyword: $('#keyword').val()
        },
        success: function(data){
            $('#liste').html(data);
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
    var order = function () {
        var ret = "ASC";
        if($('#order').val() === "ASC") {
            ret = "DESC";
        }
        return ret;
    };
    $('#order').val(order);
    $('#column').val(column);
    actualiserTable();
});