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
        <link rel="stylesheet" href="{{ asset('css/metro.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-icons.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-colors.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/invite.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/applink.css') }}"/>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/vnd.microsoft.icon"/>
        <style>
            #dialog-content{
                max-height: 500px;
            }
        </style>
        <title>AppLink | Mode Admin</title>
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
                        <span class="mif-2x mif-user"></span> Admin
                    </a>
                    <ul class="d-menu" data-role="dropdown" data-no-close="true">
                        <li>
                            <a href="/logout">Quitter</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        
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
            </div>
        <div id="content">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Domaine</th>
                        <th>Descritption</th>
                        <th>Date</th>
                        <th>Version</th>
                        <th>Nom du garant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="liste">
                    
                </tbody>
            </table>
        </div>
        
        <div class="fixed-bottom app-bar" id="footer">
            <center>
                AppLink | ©<?php echo date("Y"); ?> - Jouve Madagascar
            </center>
        </div>
        

        <div data-role="dialog" id="dialog">
            <div id="dialog-content">
                
            </div>
        </div>


        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/metro.min.js') }}"></script>
        <script>
            $(function(){
               actualiser(); 
            });
            function actualiser(){
                actualiserTable();
            }
            function actualiserTable(){
                $('#liste').load('/application');
            }
            function ajouterBtnClicked(){
                var dialog = $('#dialog').data('dialog');
                dialog.open();
                $('#dialog-content').load('/application/create');
            }
        </script>
    </body>
</html>
