<?php

namespace App;

use \App\Connection;
use \PDO;

class Book extends Connection
{
    public $pdo;

    public function __construct()
    {
        parent::__construct();
    }

    public function readBook()
    {
        $statement = $this->pdo->prepare("SELECT id_livre, auteur, titre, is_active as disponibilité FROM livre;");
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    public function createBook(string $auteur, string $titre, string $is_active): void
    {
        $statement = $this->pdo->prepare("INSERT INTO livre (auteur, titre, is_active) VALUES(:aut, :tit, :ia);");
        $statement->bindParam("aut", $auteur);
        $statement->bindParam("tit", $titre);
        $statement->bindParam("ia", $is_active);
        $statement->execute();
        header('location:index.php?page=create&book_status=' . $titre);
    }

    public function updateBook(string $id_livre, string $auteur, string $titre, string $is_active): void
    {
        $statement = $this->pdo->prepare("UPDATE livre SET auteur = :aut, titre = :tit, is_active = :ia WHERE id_livre = :id;");
        $statement->bindParam("id", $id_livre);
        $statement->bindParam("aut", $auteur);
        $statement->bindParam("tit", $titre);
        $statement->bindParam("ia", $is_active);
        $statement->execute();
        header('location:index.php?page=update&book_status=' . $titre);
    }

    public function deleteBook(string $id_livre): void
    {
        try {
        $statement = $this->pdo->prepare("DELETE FROM livre where id_livre = :id;");
        $statement->bindParam("id", $id_livre);
        $statement->execute();
        header('location:index.php?page=delete&book_status=' . $id_livre);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Dump table
    public static function dump_table(array $data): void
    {
        echo "<table class='table table-bordered border-primary mt-5 container'";
        echo "<tr>";
        // Get row headers
        foreach ($data[0] as $key => $value) {
            echo "<th class='text-primary'>" . $key . "</th>";
        }
        // Get values
        foreach ($data as $key => $value) {
            echo "<tr>";
            foreach ($value as $k => $v) {
                echo "<td>" . $v . "</td>";
            }
            echo "</tr>";
        }
        echo "</tr>";
        echo "</table>";
    }

    // Helpers functions
    public static function dump_row(array $data): void
    {
        echo "<ul class='list-group>'";
        foreach ($data as $key => $value) {
            echo "<li class='list-item'>" . implode(" ", $value) . "</li>";
        }
        echo "</ul>";
    }

}
