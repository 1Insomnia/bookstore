<?php
    include "classes/Auth.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && (!empty($_POST))) {
        if (isset($_POST["username"]) && !empty($_POST["username"])) {
            $username = $_POST["username"];
        }
        if (isset($_POST["password"]) && !empty($_POST["password"])) {
            $password = md5($_POST["password"]);
        }

        $current_user = new Auth();
        $current_user->User($username, $password);
        echo $current_user->getError_message();
    }
?>

<section class="container my-5 text-primary">
  <h1>Login</h1>
</section>

<section class="container">
  <form class="form-group" action="" method="POST">
    <label class="form-label mb-2" for="username">Entrer votre nom d'utilisateur</label>
    <input class="form-control mb-3" type="text" name="username" id="username" placeholder="Jean Luc" required>
    <label class="form-label mb-2" for="password">Entrer votre mot de passe</label>
    <input class="form-control mb-5" type="password" name="password" id="password" required>
    <button class="btn btn-primary" type="submit">Login</button>
  </form>
</section>