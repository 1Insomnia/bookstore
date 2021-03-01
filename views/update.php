<?php

use \App\{Book, Filter};


if (!isset($_SESSION["logged_in"])) {
    exit();
}

if (isset($_GET["id_livre"])) {
    $id_livre = $_GET["id_livre"];
    $book = new Book();
    $res = $book->getOneBook();
    $auteur_pre = $res[0]["auteur"];
    $titre_pre = $res[0]["titre"];
    $is_active = $res[0]["is_active"];
    dump($auteur_pre, $titre_pre);

}

if (isset($_POST) && !empty($_POST)) {
    $id_livre = $_GET["id_livre"];
    $auteur = Filter::filter($_POST["auteur"]);
    $titre = Filter::filter($_POST["titre"]);
    $is_active = Filter::filter($_POST["is_active"]);
    // TODO : Validation
}

?>


<?php if (isset($_GET["book_status"])): ?>
    <div class="text-success container">
        Livre <?php echo " " . $_GET["book_status"] . " " ?> modifié.
    </div>
<?php endif ?>
<section class="container">
    <!-- Title -->
    <div class="mb-3">
        <label class="form-label mb-2">Titre</label>
        <input class="form-control form-control-lg" name="titre" type="text" placeholder="La vérite sur Mr Javascript ?"
               required value="<?php echo $titre_pre ?? ""; ?>">
    </div>
    <!-- Author -->
    <div class="mb-3">
        <label class="form-label mb-2">Auteur</label>
        <input class="form-control form-control-lg" name="auteur" type="text" placeholder="Mr Php" required
               value="<?php echo $auteur_pre ?? ""; ?>">
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