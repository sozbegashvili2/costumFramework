<?php
namespace app\controllers;

class RegisterController
{
    public function register(\app\Router $router) {
            return $router->getViewContent('register');
    }
    public function postRegister(\app\Router $router,\app\IRequest $request) {
        $data = $request->getBody();
        $errors = [];
           foreach ($data as $key => $value) {
               if($value == '') $errors[$key] = 'Please Fill This Field';
           }
          return $router->getViewContent('register',[
             'errors' => $errors,
             'data' => $data]);
    }

}
