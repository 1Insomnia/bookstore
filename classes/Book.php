<?php

require "Connection.php";

class Book extends Connection
{
    public $pdo;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllBook()
    {
        $statement = $this->pdo->prepare("SELECT * FROM livre;");
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getBookId(string $id)
    {
        $str = "id_livre";

        $statement = $this->pdo->prepare("SELECT titre, auteur FROM livre WHERE :idl = :id;");
        $statement->bindParam("idl", $str);
        $statement->bindParam("id", $id);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $this;
    }

    public function addBook(array $values)
    {
        $statement = $this->pdo->prepare("INSERT INTO livre (auteur, titre, is_active) VALUES(:aut, :tit, :ia);");
        $statement->bindParam("aut", $values["auteur"]);
        $statement->bindParam("tit", $values["titre"]);
        $statement->bindParam("ia", $values["is_active"]);
        $statement->execute();
        header('location:index.php?page=add&livre_status=' . $values["titre"]);
    }

    // TODO : Message on delete
    public function removeBook(string $id)
    {
        $statement = $this->pdo->prepare("DELETE FROM livre where id_livre = :id;");
        $statement->bindParam("id", $id);
        $statement->execute();
        header('location:index.php?page=remove&livre_status=' . $id);
        return $this;
    }

    // Dump table
    public static function dump_table(array $data)
    {
        echo "<table class='table table-bordered border-primary'";
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
    public static function dump_row(array $data)
    {
        echo "<ul class='list-group>'";
        foreach ($data as $key => $value) {
            echo "<li class='list-item'>" . implode(" ", $value) . "</li>";
        }
        echo "</ul>";
    }

}