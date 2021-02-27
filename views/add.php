<section class="container my-5">
  <h1 class="mb-3">Dashboard - Ajout Article</h1>
  <p>
    Ajouter un nouveau livre avec la form ci-dessous.
  </p>
</section>

<?php if(isset($_SESSION["auth"]) && $_SESSION["auth"] !== 1): ?>

    <div class='text-danger mt-3'>Veuillez d'abord vous connecté(e)</div>
    <a href="index.php?page=connect">Login</a>

<?php else: ?>

<section class="container">
  <form class="form-group" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <!-- Title -->
    <div class="mb-3">
      <label class="form-label mb-2">Titre</label>
      <input class="form-control form-control-lg" name="titre" type="text" placeholder="La vérite sur Mr Php ?">
    </div>
    <!-- Author -->
    <div class="mb-3">
      <label class="form-label mb-2">Auteur</label>
      <input class="form-control form-control-lg" name="auteur" type="text" placeholder="Mr Javascript">
    </div>
    <!-- Emprumpt -->
    <div class="mb-3">
      <label class="col-sm-2 form-label mb-2">Emprunt</label>
      <select class="form-control form-control-lg" name="is_active">
        <option value="1">Disponible</option>
        <option value="0">Non Disponible</option>
      </select>
    </div>
    <!-- Button -->
    <button name="submit" class="btn btn-success">Submit</button>
  </form>
</section>

<?php endif; ?>