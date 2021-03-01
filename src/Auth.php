<?php

namespace App;

use \App\Connection;
use \PDO;

class Auth extends Connection
{
    public string $username;
    public string $password;

    public function __construct($username, $password)
    {
        parent::__construct();
        $this->username = $username;
        $this->password = $password;
    }

    public function checkUser(): string
    {

        $query = $this->pdo->prepare("SELECT username, password FROM users WHERE username = :u AND password = :p limit 1");
        $query->bindParam(":u", $this->username);
        $query->bindParam(":p", $this->password);
        $query->execute();
        $response = $query->fetchAll();

        if (count($response) === 1) {
            $_SESSION["logged_in"] = 1;
            $_SESSION["user_name"] = $this->username;
            header("location:index.php?page=dashboard&auth_status=success&user_name=" . $this->username);
            return $this->username . " Auth Successful";
        } else {
            header("location:index.php?page=login&auth_status=fail");
            session_unset();
            return "Auth deny wrong username or password";
        }
    }


    public static function dropUser()
    {
        if (isset($_SESSION["logged_in"])) {
            session_unset();
            header("location:index.php?page=dashboard&auth_logout=success");
        }
    }

    public static function isLogged()
    {
        if (!(isset($_SESSION["logged_in"]))) {
            return true;
        } else {
            return false;
        }
    }
}