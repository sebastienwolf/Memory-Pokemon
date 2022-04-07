<?php

namespace Controllers;


class Page extends Controller
{

    protected $modelName = \Models\Page::class;

    // ===================================================================================================
    // ===============================        connexion    ===========================================
    // ===================================================================================================

    public function connexion()
    {
        $pageTitle = 'connexion';
        \Renderer::render('articles/connexion', compact('pageTitle'));
    }
    // ===================================================================================================
    // ===============================        inscription    ===========================================
    // ===================================================================================================

    public function inscription()
    {
        $pageTitle = 'inscription';
        \Renderer::render('articles/inscription', compact('pageTitle'));
    }
}
