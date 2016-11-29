/* 
 * Mamy RAOBY
 * mamyraoby@outlook.com
 * +261 34 27 71 392
 */
$(function(){
    loadDomaine();
    actualiser();
 });
 $('#domaine').on('change',loadType);
 $('#keyword').keyup(actualiserTable);