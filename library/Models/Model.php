<?php

namespace Models;

use Database;

// require_once('librari/database.php');

abstract class Model
{

    protected $pdo;
    protected $table;

    public function __construct()
    {

        $this->pdo = \Database::getPdo();
    }
    // ===================================================================================================
    // ===============================        showAll   ===================================
    // ===================================================================================================
    public function showAll($i)
    {
        if ($i == '5') {
            $id = $_SESSION['id'];
            $i = "id_Users = $id ORDER BY score DESC LIMIT 10";
        }
        $sql = $this->pdo->prepare("SELECT * FROM $this->table Where $i");
        $sql->execute();
        $response = $sql->fetchAll();
        // $test = $sql->errorInfo();
        return $response;
    }
    // ===================================================================================================
    // ===============================        show game   ===================================
    // ===================================================================================================
    public function showGame($i)
    {




        $sql = $this->pdo->prepare("SELECT score, DATE_FORMAT(`dateSend`, '%d/%m/%Y') as dateE
        FROM game Where $i");
        $sql->execute();
        $response = $sql->fetchAll();
        // $test = $sql->errorInfo();
        return $response;
    }


    // ===================================================================================================
    // ===============================        showAllTable   ===================================
    // ===================================================================================================
    public function showAllTable($i)
    {
        $requette = ("SELECT score, DATE_FORMAT(`dateSend`, '%d/%m/%Y') as dateE, users.pseudo 
        FROM game 
        LEFT JOIN users ON users.idUsers = game.id_Users 
        WHERE $i ORDER BY score ASC LIMIT 10");
        $sql = $this->pdo->prepare($requette);
        $sql->execute();

        $response = $sql->fetchAll();
        return $response;
    }

    // ===================================================================================================
    // ===============================        udapte   ===================================
    // ===================================================================================================
    public function udapte($item, $id)
    {
        $requette = "UPDATE $this->table SET " . $item . " WHERE " . $id;
        $sql = $this->pdo->prepare($requette);
        $response = $sql->execute();
        return $response;
    }
}
