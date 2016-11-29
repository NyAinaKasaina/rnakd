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
        },
        error: function (){
          alert('error');  
        }
    });
}

function actualiser(){
    actualiserTable();
}

function showApp(idApp) {
    alert('You are trying to show App: ' + idApp);
}
function actualiserTable(){
    $.ajax({
        url: "/application",
        type: 'GET',
        data: {
            type: $('#type').val(),
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