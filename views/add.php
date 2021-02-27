<?php
    require "classes/Book.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && (!empty($_POST))) {
        if (isset($_POST["titre"]) && !empty($_POST["titre"])) {
            $titre = $_POST["titre"];
        }
        if (isset($_POST["auteur"]) && !empty($_POST["auteur"])) {
            $auteur = $_POST["auteur"];
        }
        if (isset($_POST["is_active"]) && !empty($_POST["is_active"])) {
            $is_active = $_POST["is_active"];
        }

        $book = new Book();
        $book->addBook($_POST);
    }

?>

<section class="container my-5">
  <h1>Ajout Article</h1>
  <?php
      if (isset($_GET["livre_status"])) {
          echo "<div class='text-success'>" . "Livre : " . $_GET["livre_status"] . " ajouté </div>";
      }
  ?>
</section>

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