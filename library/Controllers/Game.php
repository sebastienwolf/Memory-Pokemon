<?php

namespace Controllers;


class Game extends Controller
{

    protected $modelName = \Models\Game::class;

    // ===================================================================================================
    // ===============================        save result    ===========================================
    // ===================================================================================================

    public function save()
    {
        if (isset($_SESSION)) {
            $result = $_POST['result'];
            $id = $_SESSION['id'];
            $send = compact('result', 'id');
            $sql = $this->model->save($send);
            echo json_encode(1);
        }
    }
    // ===================================================================================================
    // ===============================         myResult    ===========================================
    // ===================================================================================================

    public function myResult()
    {
        $id = $_SESSION['id'];
        $result = $this->model->showAllTable("id_Users = $id "); //top 10
        $all = $this->model->showGame("id_Users = $id");

        $pageTitle = 'Mes resultat';
        \Renderer::render('articles/myResult', compact('pageTitle', 'result', 'all'));
    }
}
