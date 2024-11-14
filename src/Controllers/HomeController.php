<?php

namespace Ryan\DownloadFacil\Controllers;

use Ryan\DownloadFacil\Core\View;

class HomeController
{
    public function index()
    {
        // Dados a serem passados para a view
        $data = [
            'title' => 'Página Inicial',
            'message' => 'Bem-vindo ao site de download de vídeos e músicas!'
        ];

        // Renderiza a view 'home'
        View::render('home', $data);
    }
}
