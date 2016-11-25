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
 * Action executée lors de la fin du chargement de la page principale
 */
$(function (){
    $('#loading-animation').hide();
    tableSpinner();
    refresh();
});

/*
 * Evenement lors de la frappe dans la barre de recherche
 */
$('#keyword').keyup(refreshTable);

/*
 * Evenement lors de la changemet de filtre
 */
$('#type').on('change', function (){
    tableSpinner();
    refreshTable();
});
















