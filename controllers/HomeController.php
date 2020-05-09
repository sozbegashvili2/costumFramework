<?php
namespace app\controllers;
class HomeController
{
public function index(\app\Router $router){
return $router->getViewContent('index');
}

}