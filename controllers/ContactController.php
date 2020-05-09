<?php
namespace app\controllers;
class ContactController
{
    public function contact(\app\Router $router,\app\IRequest $request) {
        return $router->getViewContent('contact');
    }
    public function postContact(\app\Router $router,\app\IRequest $request) {
         $data = $request->getBody();
         $errors = [];
         foreach ($data as $key => $value) {
             if ($value == '') $errors[$key] = 'Please fill This field';
             else $errors[$key] = null;
         }
        return $router->getViewContent('contact',[
            'errors' => $errors,
            'data' => $data
        ]);
    }
}