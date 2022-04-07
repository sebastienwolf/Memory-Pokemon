<?php

namespace Controllers;


class Card extends Controller
{

    protected $modelName = \Models\Card::class;

    // ===================================================================================================
    // ===============================        index    ===========================================
    // ===================================================================================================

    public function index()
    {
        session_start();
        $cards = $this->model->showAll(1);
        $arrayCards = [];
        foreach ($cards as $card) {
            array_push($arrayCards, $card['pathFile']);
        }
        $result = $this->model->showAllTable(1);

        $number = count($arrayCards);
        $numArray = ($number * 2);
        $tableau = [];
        for ($i = 0; $i < $numArray; $i++) {
            array_push($tableau, $i);
        }
        $pageTitle = 'Accueil';
        \Renderer::render('articles/index', compact('pageTitle', 'arrayCards', 'result', 'tableau'));
    }

    // ===================================================================================================
    // ===============================        index    ===========================================
    // ===================================================================================================

    public function cardsPath()
    {
        $cards = $this->model->showAll();
        $arrayCards = [];
        foreach ($cards as $card) {
            array_push($arrayCards, $card['pathFile']);
        }
        echo json_encode($arrayCards);
    }
}
