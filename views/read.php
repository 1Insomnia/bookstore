<?php

use \App\Book;

if (isset($_POST) && !empty($_POST)) {
    $book = new Book();
    $book::dump_table($book->readBook());
}
?>

<?php if (!isset($_SESSION["logged_in"])): ?>
    <div class="text-danger container">
        Veuillez d'abord vous connecter
        <a href="index.php?page=login">Login</a>
    </div>
    <?php exit() ?>
<?php endif; ?>
<section class="container">
    <div>Afficher tout les livres</div>

    <form class="form-group" action="" method="POST">
        <button name="submit" class="btn btn-success" name="pull_search">Search</button>
    </form>
</section>

