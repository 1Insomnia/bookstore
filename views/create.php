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