<?php

use App\Auth;

if ($_SERVER["REQUEST_METHOD"] === "POST" && (!empty($_POST))) {
    Auth::dropUser();
}

?>
<?php if (isset($_GET["auth_logout"]) && $_GET["auth_logout"] === "success"): ?>
    <div class="text-success container">
        Déconnecté avec succès
    <a href="index.php?page=dashboard" class="text-primary">Accueil</a>
    </div>
<?php endif; ?>

<section class="container mt-5">
    <form action="" method="POST">
        <?php if (!isset($_SESSION["logged_in"]) && !isset($_GET["auth_logout"])): ?>
            <div class="text-danger">
                Vous n'êtes même pas identifié...
            </div>
        <?php else: ?>
            <button class="btn btn-danger" type="submit" name="logout">Logout</button>
        <?php endif; ?>
    </form>
</section>