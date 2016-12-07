<!DOCTYPE html>
<!--
Mamy RAOBY
mamyraoby@outlook.com
+261 34 27 71 392
-->
<html>
    <head>
        <meta charset="UTF-8" lang="fr">
        <meta name="description" content="AppLink | Contrôle de version des applications chez Jouve Madagascar, developpé par Mamy RAOBY et Ny Aina Kasaina Ramaroson David"/>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-icons.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-colors.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/invite.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/applink.css') }}"/>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/vnd.microsoft.icon"/>
        <title>AppLink | Mode Invité</title>
    </head>
    <body>
        <div class="app-bar fixed-top" id="header">
            <a class="app-bar-element">
                <img alt="JOUVE MADAGASCAR" src="{{ asset('images/logo.png') }}" id="logo"/>
            </a>
            <span class="app-bar-divider"></span>
            <a class="app-bar-element">
                <span class="icon mif-3x mif-apps"></span> <b>APPLINK</b>
                    <span> - Contrôle de version des applications</span>
            </a>
            <ul class="app-bar-menu place-right">
                <li>
                    <span class="app-bar-divider"></span>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">
                        <span class="mif-2x mif-user"></span> Invité
                    </a>
                    <ul class="d-menu" data-role="dropdown" data-no-close="true">
                        <li>
                            <a href="/applink/admin">Admin</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="main" class="page-content">
            <div>
                <h1>
                    Liste de toutes les applications
                </h1>
                <hr>
                <div id="control" class="place-right">
                    <div class="input-control select">
                        <label>Domaine :</label> 
                        <select id="domaine"></select>
                    </div>
                    <div class="input-control select">
                        <label>Type de l'application :</label> 
                        <select id="type"></select>
                    </div>
                    <div class="input-control text" data-role="input">
                        <label>Mots-clés:</label>
                        <input type="text" placeholder="Rechercher ici" id="keyword">
                    </div>
                </div>
            </div>
            <div id="content">
                <table class="table striped hovered" id="table">
                    <thead>
                        <tr>
                            <th><span class="mif-sort-asc"></span> ID</th>
                            <th><span class="mif-sort-asc"></span> Nom</th>
                            <th><span class="mif-sort-asc"></span> Domaine</th>
                            <th><span class="mif-sort-asc"></span> Type</th>
                            <th><span class="mif-sort-asc"></span> Descritption</th>
                            <th><span class="mif-sort-asc"></span> Date</th>
                            <th><span class="mif-sort-asc"></span> Version</th>
                            <th><span class="mif-sort-asc"></span> <input type="text" placeholder="Nom du garant" id="nomGarant"></th>
                        </tr>
                    </thead>
                    <tbody id="liste">

                    </tbody>
                </table>
            </div>
        </div>
        <div id="submain" class="page-content">
            <span class="mif-2x mif-cross place-right" onclick="switchToDiv('main')" style="cursor: pointer;display: block"></span>
            <div id="submain-content">
                Submain
            </div>
        </div>
        
        <div id="cycle" class="page-content">
            <button class="button place-right warning" onclick="switchToDiv('submain')"><span class="mif-arrow-left"></span> Retour</button>
            <br>
            <div id="cycle-vie">
                
            </div>
        </div>
        <div class="fixed-bottom app-bar" id="footer">
            <center>
                AppLink | ©<?php echo date("Y"); ?> - Jouve Madagascar
            </center>
        </div>
        <div id="loading">
            <center>
                <span class="mif-ani-pulse mif-spinner"></span>
                <br>
                Chargement en cours...
            </center>
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/metro.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/invite.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/events-i.js') }}"></script>
    </body>
</html>
