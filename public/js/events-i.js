/* 
 * Mamy RAOBY
 * mamyraoby@outlook.com
 * +261 34 27 71 392
 */
$(function(){
    $('#loading').hide();
    $('#submain').hide();
    loadDomaine();
 });
 $('#domaine').on('change',loadType);
 $('#type').on('change',actualiserTable);
 $('#keyword').keyup(actualiserTable);