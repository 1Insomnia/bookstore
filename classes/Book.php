<?php

class Book
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=bookstore', 'root', '');
        } catch (PDOException $e) {
            echo "<strong class='color: red;'>" . $e->getMessage() . '</strong>';
        }
    }

    public function getBookId(string $id)
    {
        $str = "id_client";

        $statement = $this->pdo->prepare("SELECT titre, auteur from livre where :idl = :id");
        $statement->bindParam("idl", $str);
        $statement->bindParam("id", $id);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_ASSOC);
        print_r($res);
    }

    public function setBook(array $values)
    {
        $statement = $this->pdo->prepare("insert into livre values(:idl, :aut, :tit)");
        $statement->bindParam("idl", $values["id_livre"]);
        $statement->bindParam("aut", $values["auteur"]);
        $statement->bindParam("tit", $values["titre"]);
        $statement->execute();
    }
}