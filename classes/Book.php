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
        dump_table($res);
        return $res;
    }

    public function getBookId(string $id)
    {
        $str = "id_client";

        $statement = $this->pdo->prepare("SELECT titre, auteur FROM livre WHERE :idl = :id;");
        $statement->bindParam("idl", $str);
        $statement->bindParam("id", $id);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_ASSOC);
        print_r($res);
        return $res;
    }

    public function setBook(array $values)
    {
        $statement = $this->pdo->prepare("INSERT INTO livre VALUES(:idl, :aut, :tit);");
        $statement->bindParam("idl", $values["id_livre"]);
        $statement->bindParam("aut", $values["auteur"]);
        $statement->bindParam("tit", $values["titre"]);
        $statement->execute();
        return $this;
    }
}

// Helpers functions
function dump_row(array $data)
{
    echo "<ul class='list-group>'";
    foreach ($data as $key => $value) {
        echo "<li class='list-item'>" . implode(" ", $value) . "</li>";
    }
    echo "</ul>";
}

//
function dump(array $data)
{
    echo "<pre style='color: green;'>";
    echo print_r($data);
    echo "</pre>";
}

// Dump table
function dump_table(array $data)
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