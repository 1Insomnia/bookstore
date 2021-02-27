<?php
if (isset($_GET["page"])) {

    $page = $_GET['page'];

    switch ($page) {
        case 'home':
            include "views/dashboard.php";
            break;

        case "add":
            include "views/add.php";
            break;

        case "modify":
            include "views/modify.php";
            break;

        case "remove":
            include "views/remove.php";
            break;

        default:
            include "views/page_404.php";
            break;
    }
}