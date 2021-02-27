<?php require "classes/Auth.php"?>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && (!empty($_POST))) {
        logout();
    }
?>
<section class="container my-5">
  <h1>Logout</h1>
</section>

<section class="container mt-5">
  <form action="" method="POST">
    <?php if (!empty($_SESSION["auth"]) && $_SESSION["auth"] === 1): ?>
    <div class="mb-3">Deconnecter vous en cliquant sur Logout</div>
    <button class="btn btn-danger" type="submit" name="logout">Logout</button>
    <?php else: ?>
    <h2 class="text-warning mb-3 display-5">You are not even logged in dude ...</h2>
    <?php endif;?>
    <p class="form-text mb-1"><small>Go back home</small></p>
    <a href="index.php?page=home">Accueil</a>
  </form>
</section>