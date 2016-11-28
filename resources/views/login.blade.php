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
        <meta charset="UTF-8" lang="fr">
        <meta name="description" content="AppLink | Contrôle de version des applications chez Jouve Madagascar, developpé par Mamy RAOBY et Ny Aina Kasaina Ramaroson David"/>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-icons.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/metro-colors.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/vnd.microsoft.icon"/>
        <title>Connexion AppLink | Jouve Madagascar</title>
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
        
        <div id="login" class="shadow user-field">
            <div class="app-bar" style="padding: 5px;">
                <span class="header place-right">Connexion Admin</span>
            </div>
            <?php
                $user = "";
                if(isset($error)){
                    $user = $username;
                    echo "<center><br>$error</center>";
                }
            ?>
            <form class="formulaire" method="POST" action="/">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="input-control text full-size">
                    <label>Administrateur:</label>
                    <span class="mif-user prepend-icon"></span>
                    <input type="text" name="username" placeholder="Login administrateur" value="{{ $user }}" required="">
                </div>
                <br><br>
                <div class="input-control password full-size">
                    <label>Mot de passe:</label>
                    <span class="mif-lock prepend-icon"></span>
                    <input type="password" name="password" placeholder="Mot de passe administrateur" required="">
                </div>
                <br>
                <br>
                <div class="button-group">
                    <center>
                        <button class="button success shadow" type="submit">Se connecter</button>
                        <button class="button danger shadow" type="reset">Annuler</button>
                    </center>
                </div>
                <br>
                <center>
                    <input name="rememberme" id="rememberme" type="checkbox">
                    <label for="rememberme">Mémoriser la session</label>
                </center>
            </form>
            <div class="app-bar" style="padding: 5px;">
                <a class="place-right">
                    <span class="mif-users"></span> Passer en mode invité
                </a>
            </div>
        </div>
        
        <div class="fixed-bottom app-bar" id="footer">
            <center>
                AppLink | ©<?php echo date("Y"); ?> - Jouve Madagascar
            </center>
        </div>
    </body>
</html>
