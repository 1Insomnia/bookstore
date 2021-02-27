<?php
    require "classes/Book.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && (!empty($_POST))) {
        if (isset($_POST["id_livre"]) && !empty($_POST["id_livre"])) {
            $id_livre = $_POST["id_livre"];
        }
        $book = new Book();
        $book->removeBook($id_livre);
    }

?>

<section class="container my-5 text-primary">
  <h1>Supprimer Article</h1>
  <?php
      if (isset($_GET["livre_status"])) {
          echo "<div class='text-success'>" . "Livre : " . $_GET["livre_status"] . " supprimé </div>";
      }
  ?>
</section>

<section class="container">
  <form class="form-group" action="" method="POST">
    <div class="mb-3">
      <label class="form-label mb-2">Identifiant Livre</label>
      <input class="form-control mb-3" name="id_livre" type="text" placeholder="100" required>
    </div>
    <button name="submit" class="btn btn-success">Submit</button>
  </form>
</section>