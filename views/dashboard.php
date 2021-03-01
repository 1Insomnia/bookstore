<?php
    use \App\Book;
?>

<!-- LOGOUT SUCCESS -->
<?php if (isset($_GET["auth_logout"]) && $_GET["auth_logout"] === "success"): ?>
<div class="text-success container">
  Déconnecté avec succès
</div>
<?php endif;?>
<section class="container">
  <div class="my-2">
    <h2 class="text-primary">Bookstore Management</h2>
  </div>
  <?php if (isset($_SESSION) && !isset($_SESSION["logged_in"])): ?>
  <p>Vous n'êtes pas authentifié, veuillez utiliser la page login pour continuer</p>
  <a href="index.php?page=login" class="text-danger">Login</a>
</section>
<?php exit();?>
<?php else: ?>
<div class="my-3">
  <p>Utiliser la barre de navigation pour utiliser l'application</p>
  <p class="display-4">Bienvenue <span class="text-success"><?php echo $_SESSION["user_name"] ?></span></p>
</div>
<section class="container mt-5">
  <div class="mt-3">Afficher tout les livres</div>
  <form class="form-group" action="" method="POST">
    <button name="submit" class="btn btn-success" name="pull_search">Search</button>
  </form>
</section>
<?php endif;?>

<?php
    if (isset($_POST) && !empty($_POST)) {
        $book = new Book();
        $book::dump_table($book->readBook());
        Book::dump_row($book->getOneBook());
}
?>