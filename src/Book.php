<?php

namespace App;

use \App\Connection;

class Book extends Connection
{
    public $pdo;
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * readBook
     * Fetch All or one line
     * @param  mixed $bookNumber
     * @return array
     */

    public function readBook(mixed $bookNumber = false): array
    {
        $statement = $this->pdo->prepare("SELECT id_livre, auteur, titre, is_active as disponibilité FROM livre ORDER BY id_livre DESC;");
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getOneBook($id): array
    {
        $statement = $this->pdo->prepare("SELECT auteur, titre, is_active FROM livre WHERE id_livre = ?;");
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    /**
     * createBook
     *
     * @param  mixed $auteur
     * @param  mixed $titre
     * @param  mixed $is_active
     * @return void
     */

    public function createBook(string $auteur, string $titre, string $is_active): void
    {
        $statement = $this->pdo->prepare("INSERT INTO livre (auteur, titre, is_active) VALUES(:aut, :tit, :ia);");
        $statement->bindParam("aut", $auteur);
        $statement->bindParam("tit", $titre);
        $statement->bindParam("ia", $is_active);
        $statement->execute();
        header('location:index.php?page=create&book_status=' . $titre);
    }

    /**
     * updateBook
     *
     * @param  mixed $id_livre
     * @param  mixed $auteur
     * @param  mixed $titre
     * @param  mixed $is_active
     * @return void
     */

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

    /**
     * deleteBook
     *
     * @param  mixed $id_livre
     * @return void
     */

    public function deleteBook(string $id_livre): void
    {
        $statement = $this->pdo->prepare("DELETE FROM livre where id_livre = :id;");
        $statement->bindParam("id", $id_livre);
        $statement->execute();
        header('location:index.php?page=dashboard&book_status=' . $id_livre);
    }

    // Dump table
    /**
     * dump_table
     *
     * @param  mixed $data
     * @return void
     */

    public static function dump_table(array $data): void
    {
        echo "<table class='table table-bordered border-primary mt-5 container'";
        echo "<tr>";
        // Get row headers
        foreach ($data[0] as $key => $value) {
            echo "<th class='text-primary'>" . $key . "</th>";
        }
        echo "</tr>";
        // Get values
        foreach ($data as $key => $value) {
            echo "<tr>";
            foreach ($value as $k => $v) {
                echo "<td>" . $v . "</td>";
            }
            echo "<td><a href='index.php?page=update&id_livre={$value['id_livre']}&auteur={$value['auteur']}&disponiblité={$value['disponibilité']}'>Modifier</a</td>";
            echo "<td><a href='index.php?page=delete&id_livre={$value['id_livre']}&auteur={$value['auteur']}&disponiblité={$value['disponibilité']}'>Suprimer</a</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    // Helpers functions
    /**
     * dump_row
     *
     * @param  mixed $data
     * @return void
     */

    public static function dump_row(array $data): void
    {
        echo "<ul class='list-group>'";
        foreach ($data as $key => $value) {
            echo "<li class='list-item'>" . implode(" ", $value) . "</li>";
        }
        echo "</ul>";
    }

}