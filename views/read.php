<?php if(!isset($_SESSION["logged_in"])): ?>
    <div class="text-danger container">
        Veuillez d'abord vous connecter
        <a href="index.php?page=login">Login</a>
    </div>
<?php exit() ?>
<?php endif; ?>


