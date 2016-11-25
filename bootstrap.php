<?php
require __DIR__ . '/vendor/autoload.php';
// mozda u routes.php file
use Small\App\Route;
Route::request('/t2/public_html/test', 'TestControler@index');
