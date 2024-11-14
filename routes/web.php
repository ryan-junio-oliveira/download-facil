<?php

use Ryan\DownloadFacil\Core\Route;
use Ryan\DownloadFacil\Controllers\HomeController;
use Ryan\DownloadFacil\Controllers\DownloadController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/download', [DownloadController::class, 'download']);
Route::get('/download', [DownloadController::class, 'serveDownload']);

Route::dispatch();
