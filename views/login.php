<?php

    use \App\Auth;
    use \App\Filter;

    $errors = [];

    if (isset($_POST) && !empty($_POST)) {
        $username = Filter::filter($_POST["username"]);
        $password = Filter::filter($_POST["password"]);

        if (strlen($username) < Filter::MIN_USERNAME_LEN) {
            $errors["username"] = "Username to short. Username must between 2 and 80 char";
        }

        if (strlen($password) < Filter::MIN_PASSWORD_LEN) {
            $errors["password"] = "Password too short. Password must between 5 and 24 char";
        }

        if (strlen($username) > Filter::MAX_USERNAME_LEN) {
            $errors["username"] = "Username to short.  Password must between 5 and 24 char";
        }

        if (strlen($password) > Filter::MAX_PASSWORD_LEN) {
            $errors["password"] = "Password too short. Password must between 5 and 24 char";
        }

        if (empty($errors)) {
            $password = md5($password);
            $current_user = new Auth($username, $password);
            $current_user_state = $current_user->checkUser();
        }
    }

?>
<?php if ((isset($_GET["auth_status"])) && ($_GET["auth_status"] === "fail")): ?>
<div class="danger alert-danger container my-3 p-3">
  <?php echo "Fail to log in wrong username or password" ?>
</div>
<?php endif;?>
<section class="container">
  <form class="form-group" action="" method="POST">
    <div class="form-group">
      <label class="form-label mb-2" for="username">Entrer votre nom d'utilisateur</label>
      <input class="form-control mb-3" type="text" name="username" id="username" placeholder="Le Scrameustache"
        required>
      <?php if (!empty($errors["username"])): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $errors["username"] ?>
      </div>
      <?php endif;?>
    </div>
    <div class="form-group">
      <label class="form-label mb-2" for="password">Entrer votre mot de passe</label>
      <input class="form-control mb-5" type="password" name="password" id="password" required>
      <?php if (!empty($errors["username"])): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $errors["password"] ?>
      </div>
      <?php endif;?>
    </div>
    <button class="btn btn-primary" type="submit">Login</button>
  </form>
</section>