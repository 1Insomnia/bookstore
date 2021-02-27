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
        $current_user->checkUser($username, $password);
    }
    var_dump($_SESSION);
    echo $current_user->errors;

?>
<section class="container text-center mt-5">
  <h1 class="display-4">Login Page</h1>
</section>

<section class="container">
  <form class="form-group" action="" method="POST">
    <label class="form-label" for="username">Entrer votre nom d'utilisateur</label>
    <input class="form-control" type="text" name="username" id="username" placeholder="Jean Luc" required>
      <label for="password">Entrer votre mot de passe</label>
    <input class="form-control" type="password" name="password" id="password" required>
    <button class="btn btn-primary" type="submit">Login</button>
      <?php if (count($current_user->errors) > 0): ?>
      <div class="is-invalid"> <?php echo $current_user->errors ?></div>
      <?php endif; ?>
  </form>
</section>

