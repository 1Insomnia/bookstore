<?php

    use \App\Book;
    use \App\Filter;

    $errors = [];

    if (isset($_POST) && !empty($_POST)) {
        $auteur = Filter::filter($_POST["auteur"]);
        $titre = Filter::filter($_POST["titre"]);
        $is_active = Filter::filter($_POST["is_active"]);
        $book = new Book();
        $book->createBook($auteur, $titre, $is_active);
    }
?>

<?php if (!isset($_SESSION["logged_in"])): ?>
<div class="text-danger container">
  Veuillez d'abord vous connecter
  <a href="index.php?page=login">Login</a>
</div>
<?php exit()?>
<?php endif;?>
<?php if (isset($_GET["book_status"])): ?>
<div class="text-success container">
  Livre <?php echo " " . $_GET["book_status"] . " " ?> ajouté.
</div>
<?php endif?>
<section class="container">
  <form class="form-group" action="" method="post">
    <!-- Title -->
    <div class="mb-3">
      <label class="form-label mb-2">Titre</label>
      <input class="form-control form-control-lg" name="titre" type="text" placeholder="La vérite sur Mr Php ?"
        required>
    </div>
    <!-- Author -->
    <div class="mb-3">
      <label class="form-label mb-2">Auteur</label>
      <input class="form-control form-control-lg" name="auteur" type="text" placeholder="Mr Javascript" required>
    </div>
    <!-- Emprumpt -->
    <div class="mb-3">
      <label class="col-sm-2 form-label mb-2">Emprunt</label>
      <select class="form-control form-control-lg" name="is_active" required>
        <option value="1">Disponible</option>
        <option value="0">Non Disponible</option>
      </select>
    </div>
    <button name="submit" class="btn btn-primary">Submit</button>
  </form>
</section>
<?php
    $book = new Book();
?>