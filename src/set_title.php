<?php

if (isset($_GET["page"])) {

    $page = $_GET['page'];

    switch ($page) {
        case 'dashboard':
            $page_title = "Accueil";
            break;
        case "create":
            $page_title = "Ajout Article";
            break;
        case "read":
            $page_title = "Lister Articles";
            break;
        case "update":
            $page_title = "Modifier Article";
            break;
        case "delete":
            $page_title = "Supprimer Article";
            break;
        case "login":
            $page_title = "Login";
            break;
        case "logout":
            $page_title = "Logout";
            break;
        default:
            $page_title = "Unknown";
            break;
    }
}