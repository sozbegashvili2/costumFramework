<?php
namespace app;
class Router
{
    private $getRoutes = [];
    private $postRoutes = [];
    public $request = null;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path,$callback) {
        $this->getRoutes[$path] = $callback;
    }
    public function post($path,$callback) {
        $this->postRoutes[$path] = $callback;
    }

    public function __destruct()
    {
        $pathInfo = $this->request->getPath();;
        if ($this->request->getMethod() === 'GET') {
            $check = $this->getRoutes[$pathInfo] ?? false;
        }
        else
        {
            $check = $this->postRoutes[$pathInfo] ?? false;
        }
        if(!$check) {
            $content = '404 - Page not found';
        }
        else
        {

           if (is_string($check)) {
                $content = $this->getViewContent($check);
           }
           else
           {
               $content = call_user_func($check,$this,$this->request);
           }
        }
        require_once __DIR__.'/views/layout.php';
    }

    public function getViewContent($check,$params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once "views/$check.php";
        return ob_get_clean();
    }
}