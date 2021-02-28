<section class="container">
    <div class="my-2">
        <h2 class="text-primary">Bookstore Management</h2>
    </div>
    <?php if (isset($_SESSION) && !isset($_SESSION["logged_in"])): ?>
        <p>Vous n'êtes pas authentifié, veuillez utiliser la page login pour continuer</p>
        <a href="index.php?page=login" class="text-danger">Login</a>
    <?php else: ?>
        <p>Bienvenue <?= $_SESSION["user_name"]?></p>
        <p>Utiliser la barre de navigation pour utiliser l'application</p>
    <?php endif; ?>
</section>
