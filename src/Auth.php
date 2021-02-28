<?php

namespace App;

use \App\Connection;
use \PDO;

class Auth extends Connection
{
    public $error_message;

    public function __construct()
    {
        parent::__construct();
    }

    public function checkUser(string $username, string $password)
    {

        $query = $this->pdo->prepare("select username, password from users where username = :u and password = :p limit 1");
        $query->bindParam(":u", $username);
        $query->bindParam(":p", $password);
        $query->execute();
        $response = $query->fetchAll();

    }

    /*
     * logout
     *
     * @return void
     */
    // public static function logout(): void
    // {
    //     if ($_SESSION["auth"] === 1) {
    //         session_unset();
    //         header("location: index.php?page=home");
    //     }
    // }
}