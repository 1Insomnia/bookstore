<?php

namespace App;

use \PDO;
use \PDOException;

class Connection
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=bookstore", "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (PDOException $e) {
            echo "Problem with DATABASE : " . $e->getMessage();
        }
    }
}