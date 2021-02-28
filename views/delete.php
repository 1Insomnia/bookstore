<?php
use \App\{Book, Filter};

if (isset($_POST) && !empty($_POST)) {
    $id_livre = Filter::filter($_POST["id_livre"]);
    // TODO : Validation
    $book = new Book();
    $book->deleteBook($id_livre);
}
?>

<?php if(!isset($_SESSION["logged_in"])): ?>
    <div class="text-danger container">
        Veuillez d'abord vous connecter
        <a href="index.php?page=login">Login</a>
    </div>
<?php exit() ?>
<?php endif; ?>
<?php if (isset($_GET["book_status"])): ?>
    <div class="text-success container">
        Livre <?= " " . $_GET["book_status"] . " "?> supprimé.
    </div>
<?php endif ?>
<section class="container">
  <form class="form-group" action="" method="POST">
    <div class="mb-3">
      <label class="form-label mb-2">Identifiant Livre</label>
      <input class="form-control mb-3" name="id_livre" type="text" placeholder="100" required>
    </div>
    <button name="submit" class="btn btn-success">Submit</button>
  </form>
</section>