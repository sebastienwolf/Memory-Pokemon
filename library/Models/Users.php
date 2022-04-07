<?php

namespace Models;


class Users extends Model
{
    protected $table = "users";

    public function createUsers($usersData)
    {
        extract($usersData);

        $sql = $this->pdo->prepare("INSERT INTO users (idUsers, pseudo, pwd) VALUES (DEFAULT , :pseudo, :mdp)");
        $sql->execute(["pseudo" => $userPseudo, "mdp" => $hash]);
    }
}
