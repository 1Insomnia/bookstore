<?php

class Connection {
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=bookstore", "root", "");
        } catch ( PDOException $e) {
            echo "Problem with DATABASE : " . $e->getMessage();
        }
    }
}