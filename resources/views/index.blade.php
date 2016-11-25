<!DOCTYPE html>
<!--
Copyright (C) 2016 Mamy RAOBY <mamyraoby@outlook.com>

    +===========================================================+
    |                          Mamy RAOBY                       |
    |___________________________________________________________|
    |    Mail : mamyraoby@outlook.com                           |
    |     Tél : +261 34 27 713 92                               |
    |  GitHub : @MamyRaoby (http://www.github.com/MamyRaoby)    |
    | Twitter : @MamyRaoby (http://www.twitter.com/MamyRaoby)   |
    |___________________________________________________________|
    |               Ecole  Nationale  d'Informatique            |
    |                 Université  de  Fianarantsoa              |
    |                   Fianarantsoa, Madagascar                |
    +===========================================================+    


______________________________________________________________________
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>AppLink | Jouve Madagascar</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-icons.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-colors.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/vnd.microsoft.icon"/>
    </head>
    <body>
        <div class="app-bar fixed-top">
            <a class="app-bar-element">
                <img alt="JOUVE MADAGASCAR" src="{{ asset('images/logo.png') }}" id="logo"/>
            </a>
            <span class="app-bar-divider"></span>
            <a class="app-bar-element">
                <span class="icon mif-3x mif-apps"></span> <b>APPLINK</b>
                <i> - Contrôle de version des applications</i>
            </a>
            <ul class="app-bar-menu place-right">
                <li>
                    <span class="app-bar-divider"></span>
                </li>
                <li>
                    <a class="app-bar-element">
                        <span class="icon mif-user-check"></span>
                        &nbsp;Mode Admin
                    </a>
                </li>
            </ul>
        </div>
        
        <div id="loading-animation">
            <center>
                <span class="mif-ani-pulse mif-spinner mif-2x"></span>
                <br>
                Chargement en cours...
            </center>
        </div>
        
        <div id="content">
            <div>
                <h1>
                    Liste de toutes les applications
                    <button class="button primary shadow place-right" title="Ajouter une nouvelle application" onclick="ajouterBtnClicked()"><span class="icon mif-plus fg-active-lightGreen"></span> Ajouter</button>
                </h1>
                <hr>
                <div id="control" class="place-right">
                    <div class="input-control select">
                        <label>Domaine :</label> 
                        <select id="domain"></select>
                    </div>
                    <div class="input-control select">
                        <label>Type de l'application :</label> 
                        <select id="type"></select>
                    </div>
                    <div class="input-control text" data-role="input">
                        <label>Mots-clés:</label>
                        <input type="text" placeholder="Rechercher ici" id="keyword">
                        <button class="button" onclick="refreshTable()"><span class="mif-search icon"></span></button>
                    </div>
                </div>
                <br><hr>
                <br><hr>
                <table class="table striped hovered full-height">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom de l'application</th>
                            <th>Domaine</th>
                            <th>Description</th>
                            <th>Dernière modification</th>
                            <th>Version</th>
                            <th>Nom du garant</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="liste">
                    </tbody>
                </table>
            </div>
        </div>
        <div id="control-pane" class="fixed-bottom">
            <hr>
            <div class="place-left button-group">
                <span class="bold">Resultats par page:</span>
                <button class="button info shadow" onclick="decrementLimit()"><span class="icon mif-minus"></span></button>
                <button class="button primary shadow" limit="5" id="limit">5</button>
                <button class="button info shadow" onclick="incrementLimit()"><span class="icon mif-plus"></span></button>
            </div>
            <div class="place-right button-group">
                <button class="button shadow success" title="Exporter la table en tant que PDF."><span class="icon mif-file-pdf fg-red"></span> Exporter PDF</button>
            </div>
            <div class="button-group place-right" style="padding-right: 100px;">
                <span>Page:</span>
                <button class="button info shadow"><span class="icon mif-previous"></span></button>
                <button class="button primary shadow">1 / 2</button>
                <button class="button info shadow"><span class="icon mif-next"></span></button>
            </div>
        </div>
        <div class="fixed-bottom app-bar" id="footer">
            <center>
                AppLink | ©<?php echo date("Y"); ?> - Jouve Madagascar
            </center>
        </div>
        
        <div data-role="dialog" id="dialog" data-type="default" data-close-button="true">
            <span class="icon mif-2x mif-cross place-right"></span>
            <div id="dialog-content">
                <center>
                    <span class="mif-ani-pulse mif-spinner mif-2x"></span>
                    <br>
                    Chargement en cours...
                </center>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/metro.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/events.js') }}"></script>
    </body>
</html>
