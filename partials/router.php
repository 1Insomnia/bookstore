<?php
/*
Most basic router
 */

if (isset($_GET["page"])) {

    $page = $_GET['page'];
    switch ($page) {
        case "dashboard":
            include "views/dashboard.php";
            break;
        case "create":
            include "views/create.php";
            break;
        case "update":
            include "views/update.php";
            break;
        case "delete":
            include "views/delete.php";
            break;
        case "login":
            include "views/login.php";
            break;
        case "logout":
            include "views/logout.php";
            break;
        default:
            include "views/page_404.php";
            break;
    }
}