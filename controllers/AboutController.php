<?php
namespace app\controllers;
class AboutController
{
    public function about(\app\Router $router){
        return $router->getViewContent('about');
    }
}