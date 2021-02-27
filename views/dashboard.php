<section class="container my-5 text-primary">
  <h1>Dashboard</h1>
</section>

<section class="container mt-5">
  <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === 1): ?>
  <div class='mt-3 text-success'>
    Vous êtes bien connecté(e) en tant que<?php echo " " . $_SESSION["user_name"]; ?>
  </div>
  <?php else: ?>
  <div class='text-danger mt-3'>Veuillez d'abord vous connecté(e)</div>
  <a href="index.php?page=login">Login</a>
  <?php endif;?>
</section>

<section>
</section>
<section class="container">
  <div>Afficher tout les livres</div>

  <form class="form-group" action="" method="POST">
    <button name="submit" class="btn btn-success" name="pull_search">Search</button>
  </form>
</section>

<?php

    if (isset($_POST) && !empty($_POST) && isset($_SESSION["auth"])) {
        require "classes/Book.php";
        $book = new Book();
    $book::dump_table($book->getAllBook());
}