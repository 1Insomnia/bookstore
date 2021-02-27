<?php

require "Connection.php";

class Auth extends Connection
{
    public $error_message;

    public function __construct()
    {
        parent::__construct();
    }

    public function User(string $username, string $password)
    {

        $query = $this->pdo->prepare("select username, password from users where username = :u and password = :p limit 1");
        $query->bindParam(":u", $username);
        $query->bindParam(":p", $password);
        $query->execute();
        $response = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($response) === 1) {

            $_SESSION["auth"] = 1;
            $_SESSION["user_name"] = "admin";

        } else {
            $this->error_message = "wrong username or password";
            session_unset();
        }
    }

    /**
     * Get the value of error_message
     */
    public function getError_message()
    {
        if (!empty(!$this->error_message));
        return $this->error_message;
    }
}

function logout()
{
    if ($_SESSION["auth"] === 1) {
        session_unset();
        header("location: index.php?page=home");
    }
}