<?php

namespace Controllers;


class Users extends Controller
{
    protected $modelName = \Models\Users::class;

    public function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        header('location: index.php?controller=card&task=index');
    }
    // ===================================================================================================
    // ===============================        connexion    ===========================================
    // ===================================================================================================

    // connexion user
    public function connexion()
    {
        $pseudo = filter_input(INPUT_POST, 'pseudo');
        //-----------------------------------------
        $a = filter_input(INPUT_POST, 'password');
        //------------------------
        $password = htmlspecialchars(filter_input(INPUT_POST, 'password'));
        if ($pseudo && $password) {
            $userLog = $this->model->showAll("pseudo = '{$pseudo}'");

            $verifPassword = password_verify($password, $userLog[0]['pwd']);
            if ($verifPassword == true && ($pseudo == $userLog[0]['pseudo'])) // nom d'utilisateur et mot de passe correctes
            {
                session_start();
                $_SESSION['pseudo'] = $userLog[0]['pseudo'];
                $_SESSION['id'] = $userLog[0]['idUsers'];

                //connecter
                echo json_encode("1");
            } else {
                echo json_encode("2");
            }
        } else {
            echo json_encode("3");
        }
    }


    // ===================================================================================================
    // ===============================        profil    ===========================================
    // ===================================================================================================
    public function profil()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: index.php?controller=card&task=index');
        } else {
            $pageTitle = 'profil';
            \Renderer::render('articles/profil', compact('pageTitle'));
        }
    }
    //============================================================================                 
    //============================================================================
    // inscription new user
    public function inscription()
    {

        $userPseudo = htmlspecialchars(filter_input(INPUT_POST, 'userPseudo'));
        $userPassword = htmlspecialchars(filter_input(INPUT_POST, 'password'));

        $option = ['cost' => 12,];
        $hash = password_hash($userPassword, PASSWORD_BCRYPT, $option);

        if ($userPseudo && $hash) {
            $verifPseudo = $this->model->showAll("pseudo = " . "'{$userPseudo}'");

            if ($verifPseudo['0']['pseudo'] == $userPseudo) {
                echo json_encode(("4"));
            } else {
                $usersData = compact("userPseudo", "hash");
                $sql = $this->model->createUsers($usersData);
                echo json_encode(("1"));
            }
        } else {
            echo json_encode(("3"));
        }
    }
    // ====================================================================
    // ====================================================================
    // modifier les donnée user

    public function modify()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: index.php?controller=card&task=index');
        } else {


            $userPseudo = htmlspecialchars(filter_input(INPUT_POST, 'userPseudo'));
            $userPassword = htmlspecialchars(filter_input(INPUT_POST, 'password'));
            $idUsers = $_SESSION['id'];
            //=======================================
            // Pseudo
            if ($userPseudo !== "") {
                $item = "pseudo = '{$userPseudo}'";
                $condition = "idUsers = '{$idUsers}'";
                $this->model->udapte($item, $condition);
                $_SESSION['pseudo'] = $userPseudo;
            }
            //=======================================
            // mot de passe
            if ($userPassword !== "") {
                $option = ['cost' => 12,];
                $hash = password_hash($userPassword, PASSWORD_BCRYPT, $option);

                $item = "pwd = '{$hash}'";
                $condition = "idUsers = '{$idUsers}'";
                $this->model->udapte($item, $condition);
            }
            //=======================================

            echo json_encode('1');
        }
    }
}
