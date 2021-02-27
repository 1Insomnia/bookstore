<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bookstore - <?php echo strtolower($_GET["page"]); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/main.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" defer>
  </script>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-sm bg-primary text-light navbar-dark px-1">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="collapsibleNavbar">
        <ul class="navbar-nav text-md text-left align-items-center">
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=home">
              Accueil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=login">
              Se connecter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=logout">
              Se deconnecter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=add">
              Ajout article
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=modify">
              Modifier article
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=remove">
              Supprimer article
            </a>
          </li>
        </ul>
        <?php if (!empty($_SESSION["auth"]) && $_SESSION["auth"] === 1): ?>
        <div>
          <span>Login as</span>
          <span><?php echo $_SESSION["user_name"] ?></span>
        </div>
        <?php endif;?>
      </div>
    </nav>

  </header>