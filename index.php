<?php
include "partials/header.php";
include "partials/router.php";
include "partials/footer.php";

if (!isset($_GET["page"])) {
    header("location: index.php?page=dashboard");
}