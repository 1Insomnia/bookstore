<section class="container my-5 text-primary">
  <h1>Dashboard</h1>
</section>

<section class="container text-center mt-5">
  <?php if (isset($_SESSION["auth"]) && $_SESSION["auth"] === 1): ?>
  <div class='text-primary mt-3'> Vous êtes bien connecté(e)</div>
  <?php else: ?>
  <div class='text-danger mt-3'>Veuillez d'abord vous connecté(e)</div>
  <a href="index.php?page=login">Login</a>
  <?php endif;?>
</section>