/* 
 * Mamy RAOBY
 * mamyraoby@outlook.com
 * +261 34 27 71 392
 */
$(function(){
    window.history.forward();
    $('#loading').hide();
    $('#submain').hide();
    $('#cycle').hide();
    $('.menu').hide();
    loadDomaine();
 });
 $('#domaine').on('change',loadType);
 $('#type').on('change',actualiserTable);
 $('#keyword').keyup(actualiserTable);
 
 function slideMenu(id) {
     $('.menu').hide();
     $(id).slideDown();
 }
 
 function newApp() {
     switchToDiv('submain');
     $('#submain-content').html($('#loading').html());
     $('#submain-content').load('/application/create');
     hideMetroCharm('#charm');
 }
 function newDomaine() {
     switchToDiv('submain');
     $('#submain-content').html($('#loading').html());
     $('#submain-content').load('/domaine/create');
     hideMetroCharm('#charm');
 }
 
 function listerDomaine() {
     switchToDiv('submain');
     $('#submain-content').html($('#loading').html());
     $('#submain-content').load('/domaine');
     hideMetroCharm('#charm');
 }

function newType() {
     switchToDiv('submain');
     $('#submain-content').html($('#loading').html());
     $('#submain-content').load('/type/create');
     hideMetroCharm('#charm');
 }
 
 function listerType() {
     switchToDiv('submain');
     $('#submain-content').html($('#loading').html());
     $('#submain-content').load('/type');
     hideMetroCharm('#charm');
 }
 
 function ajaxApplink(){
     $.ajax({
         url: $(this).attr('action'),
         type: $(this).attr('method'),
         data: $(this).serialize(),
         success: function (response) {
             $.Notify({
                caption: 'Succés.',
                content: response,
                type: 'success',
                shadow: true,
                timeout: 5000
            });
            loadDomaine();
            switchToDiv('main');
         },
         error: function (error) {
             switchToDiv('main');
             $.Notify({
                caption: 'Echec',
                content: error,
                type: 'alert',
                shadow: true,
                timeout: 5000
            });
         }
     });
     return false;
 }
 
 function modifierType(id) {
     alert(id);
     switchToDiv('submain');
     $('#submain-content').html($('#loading').html());
     $('#submain-content').load('/type/'+id+'/edit');
 }
 
 function modifierDomaine(id) {
     switchToDiv('submain');
     $('#submain-content').html($('#loading').html());
     $('#submain-content').load('/domaine/'+id+'/edit');
 }