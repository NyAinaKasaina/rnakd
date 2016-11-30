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
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/vnd.microsoft.icon"/>
        <title>Erreur 404 | Page Introuvable</title>
        <style>
            body{
                background-image: url('/images/404.gif');
                background-size: 100% auto;
                background-color: #1a6eec;
                background-repeat: no-repeat;
                padding-top: 80px;
            }
            #message{
                background-color: rgba(200,200,255,0.3);
                min-width: 200px;
                max-width: 500px;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                padding: 20px 50px;
                border-radius: 10px;
            }
            #message a{
                color: whitesmoke;
                text-decoration: blink;
            }
            #header{
                min-width: 700px;
            }
        </style>
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
        </div>
        <div id="message" class="shadow">
            <blink>
                <h2 id="titre">La page que vous avez demandée n'existe pas.</h2>
            </blink>
            Revenir à la <a href="/" class="bg-cyan fg-white padding5"><b>page d'accueil.</b></a>
        </div>
    </body>
</html>
        