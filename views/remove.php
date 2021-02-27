<section class="container my-5">
  <h1 class="mb-3">Dashboard - Supprimer Article</h1>
  <p>
    Supprimer un livre avec le formulaire ci-dessous.
  </p>
</section>

<section class="container">
  <form class="form-group" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <!-- Id -->
    <div class="mb-3">
      <label class="form-label mb-2">Identifiant Livre</label>
      <input class="form-control form-control-lg" name="id_livre" type="text" placeholder="100">
    </div>
    <!-- Button -->
    <button name="submit" class="btn btn-success">Submit</button>
  </form>
</section>