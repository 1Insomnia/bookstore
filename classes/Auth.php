<?php

require "connection.php";

class Auth extends Connection
{
    public $errors = "";
    public function __construct()
    {
        parent::__construct();
    }

    public function checkUser(string $username, string $password) {

        $query = $this->pdo->prepare("select username, password from users where username = :u and password = :p limit 1");
        $query->bindParam(":u", $username);
        $query->bindParam(":p", $password);
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($response) === 1) {

            $_SESSION["auth"] = 1;
            $_SESSION["status"] = "admin";

        } else {
            $this->errors = "wrong username or password";
            echo "<script> alert($this->errors)</script>";
            session_unset();
        }
    }
}