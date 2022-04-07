<?php

namespace Models;



class Game extends Model
{

    protected $table = "game";


    public function save($i)
    {
        extract($i);

        $sql = $this->pdo->prepare("INSERT INTO game (id, score, id_Users, dateSend) VALUES (DEFAULT , ?, ?, DEFAULT)");
        $sql->execute(array($result, $id));
    }
}
