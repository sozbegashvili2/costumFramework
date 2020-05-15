<?php
session_start();
require_once __DIR__.'/../vendor/autoload.php';
use app\{Router,Request};
use app\controllers\{RegisterController,HomeController,AboutController,ContactController,LoginController};
$conn = new app\db\Database();
$router = new Router(new Request(),$conn);
$router->get('/',[HomeController::class,'index']);
$router->get('/about',[AboutController::class,'about']);
$router->get('/contact',[ContactController::class,'contact']);
$router->post('/contact',[ContactController::class,'postContact']);
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'loginAction']);
$router->get('/logout',[LoginController::class,'logout']);
$router->get('/register',[RegisterController::class,'register']);
$router->post('/register',[RegisterController::class,'postRegister']);