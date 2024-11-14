<?php

namespace Ryan\DownloadFacil\Core;

class View
{
    public static function render($view, $data = [])
    {
        $viewPath = __DIR__ . '/../Views/' . str_replace('.', '/', $view) . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("A view {$view} não foi encontrada.");
        }

        extract($data);
        include $viewPath;
    }
}
