/* 
 * Copyright (C) 2016 Mamy RAOBY <mamyraoby@outlook.com>
 *
 *     +===========================================================+
 *     |                          Mamy RAOBY                       |
 *     |___________________________________________________________|
 *     |    Mail : mamyraoby@outlook.com                           |
 *     |     Tél : +261 34 27 713 92                               |
 *     |  GitHub : @MamyRaoby (http://www.github.com/MamyRaoby)    |
 *     | Twitter : @MamyRaoby (http://www.twitter.com/MamyRaoby)   |
 *     |___________________________________________________________|
 *     |               Ecole  Nationale  d'Informatique            |
 *     |                 Université  de  Fianarantsoa              |
 *     |                   Fianarantsoa, Madagascar                |
 *     +===========================================================+    
 * 
 *
 * ______________________________________________________________________
 */

/*
 * Actualiser la page entière
 */
function refresh(){
    refreshTable();
    refreshDomaine();
}

/*
 * Actualiser la table 'Liste des applications' via JQuery/AJAX
 */
function refreshTable() {
    $.ajax({
        url: '/applications/lister',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            limit: $('#limit').attr('limit'),
            domain: $('#domain').val(),
            type: $('#type').val(),
            keyword: $('#keyword').val()
        },
        success: function (response) {
            $('#liste').html(response);
        },
        error: function (error) {
            showError(error);
        }
    });
}

function incrementLimit() {
    var limit = $('#limit').attr('limit');
    if(limit < 20) {
        limit = limit - 1 + 2;
        $('#limit').attr('limit',limit);
        $('#limit').text(limit);
        refreshTable();
    }
}

function decrementLimit() {
    var limit = $('#limit').attr('limit');
    if(limit > 5) {
        limit = limit - 1;
        $('#limit').attr('limit',limit);
        $('#limit').text(limit);
        refreshTable();
    }
}

function refreshDomaine(){
    $.ajax({
        url: '/applications/domaine',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#domain').html(response);
        },
        error: function (error) {
            alert(error);
        }
    });
    refreshType();
}

function refreshType() {
    $.ajax({
        url: '/applications/domaine/type',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            domaine: $('#domain').val()
        },
        success: function (response) {
            $('#type').html(response);
        },
        error: function (error) {
            notify('alert','Erreur','Impossible de charger les types.\nVerifier votre paramètre réseaux.', 'mif-ani-fast flash');
        }
    });
    tableSpinner();
    refreshTable();
}
/*
 * @param {string} type Type of the notification
 * @param {string} title Title of the notification
 * @param {string} message Message of the notification   
 */
function notify(type, title, message) {
    $.Notify({
        caption: title,
        content: message,
        type: type,
        timeout: 5000
    });
}
/*
 * @param {string} type Type of the notification
 * @param {string} title Title of the notification
 * @param {string} message Message of the notification   
 * @param {string} icon Metro icon name
 */
function notify(type, title, message, icon) {
    $.Notify({
        caption: title,
        content: message,
        type: type,
        icon: '<span class="'+icon+'"></span>',
        timeout: 5000
    });
}
/*
 * @param {string} type Type of the notification
 * @param {string} title Title of the notification
 * @param {string} message Message of the notification   
 * @param {string} icon Metro icon name
 * @param {boolean} alwaysVisible Keep the visibility 
 */
function notify(type, title, message, icon, alwaysVisible) {
    $.Notify({
        caption: title,
        content: message,
        type: type,
        icon: icon,
        keepOpen: alwaysVisible
    });
}

function tableSpinner() {
    var spinner = $('#loading-animation').html();
    spinner = '<tr><td colspan="8">'+spinner;
    spinner = spinner + '</td></tr>';
    $('#liste').html(spinner);
}

function ajouterBtnClicked() {
    showMetroDialog('#dialog');
    $.ajax({
        url: '/application/create',
        type: 'GET',
        success: function (data) {
            $('#dialog-content').html(data);
        },
        error: function (error) {
            alert(error);
        }
    });
}