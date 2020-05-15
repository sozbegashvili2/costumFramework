<?php
namespace app\controllers;
class LoginController
{
    public function login(\app\Router $router){
        return $router->getViewContent('login');
    }
    public function loginAction(\app\Router $router,\app\IRequest $request){
        $data = $request->getBody();
        list($success,$message,$user) = $router->database->login($data['userEmail'],$data['password']);
        if ($success) {
             $_SESSION['currentUser'] = $user;
             return header("Location:/");
        }
        else return $router->getViewContent('login',[
            'errorMessage' => $message,
            'data' => $data]);
    }
    public function logout() {
        session_destroy();
        header('Location:/');
    }
}