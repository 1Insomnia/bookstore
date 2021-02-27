<section class="container my-5 text-primary">
  <h1>Supprimer Article</h1>
</section>

<section class="container">
  <form class="form-group" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <div class="mb-3">
      <label class="form-label mb-2">Identifiant Livre</label>
      <input class="form-control mb-3" name="id_livre" type="text" placeholder="100">
    </div>
    <button name="submit" class="btn btn-success">Submit</button>
  </form>
</section>