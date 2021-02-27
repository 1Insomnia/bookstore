<section class="container text-center mt-5">
  <h1 class="display-4">Bienvenue sur bookstore app</h1>
  <h2 class="display-4">Application de management pour biliothèque</h2>
</section>

<section class="container text-center mt-5">
  <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === 1): ?>
  <div class='text-primary mt-3'> Vous êtes bien connecté(e)</div>
  <?php else: ?>
  <div class='text-danger mt-3'>Veuillez d'abord vous connecté(e)</div>
  <a href="index.php?page=connect">Login</a>
  <?php endif;?>
</section>

