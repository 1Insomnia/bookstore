<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Bookstore - <?php echo $page_title ?? "Accueil"; ?></title>
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
      <div class="collapse navbar-collapse d-flex justify-content-between container-fluid" id="collapsibleNavbar">
        <ul class="navbar-nav text-md text-left align-items-center">
          <a class="navbar-brand" href="index.php?page=home"><img src="assets/logo.svg" alt="" height="32"
              width="32"></a>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=dashboard">
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
            <a class="nav-link text-white" href="index.php?page=create">
              Ajout article
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=read">
              Lister articles
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=update">
              Modifier article
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?page=delete">
              Supprimer article
            </a>
          </li>
        </ul>
          <?php if(isset($_SESSION["logged_in"])) :?>
          <div>
              <span>Logged In As</span>
              <span><?= $_SESSION["user_name"]?></span>
          </div>
          <?php endif; ?>
        <!-- TODO : Login as user["name] -->
      </div>
    </nav>
  </header>

  <section class="container my-5 text-primary">
    <h1><?php echo $page_title ?? ""; ?></h1>
  </section>