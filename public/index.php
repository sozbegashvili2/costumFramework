<?php
require_once __DIR__.'/../vendor/autoload.php';
use app\{Router,Request};
use app\controllers\{HomeController,AboutController,ContactController};
$router = new Router(new Request());
$router->get('/',[HomeController::class,'index']);
$router->get('/about',[AboutController::class,'about']);
$router->get('/contact',[ContactController::class,'contact']);
$router->post('/contact',[ContactController::class,'postContact']);