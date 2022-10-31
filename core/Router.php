<?php

namespace app\core;

class Router {

    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request, Response $response){
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){

        //Get the Request Path
        $path = $this->request->getPath();

        //Get the Request method
        $method = $this->request->getMethod();

        //Callback
        $callback = $this->routes[$method][$path] ?? false;

        // var_dump($callback);
        if($callback == false){

            //Not Found callback
            $this->response->setStatusCode(404);

            // return $this->renderContent('Not Found');
            return $this->renderView('_404');
        }

        if(is_string($callback)){
            return $this->renderView($callback);
        }

        if(is_array($callback)){
            //Create instance of controller form the callback
            $callback[0] = new $callback[0]();
        }

        //Call user function to return the callback
        return call_user_func($callback,$this->request);
    }

    public function renderView($view_name,$params = []){

        //Return the view layouts
        $layoutContent = $this->getLayoutContent();
        $viewContent = $this->renderOnlyView($view_name,$params);

        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    public function renderContent($viewContent){

        //Return the view layouts
        $layoutContent = $this->getLayoutContent();

        return str_replace('{{content}}',$viewContent,$layoutContent);
    }

    protected function getLayoutContent(){
    
        //Return the layout file
        ob_start();
        include_once Application::$ROOT_DIRECTOR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view_name,$params){
        
        //Loop through the supplied paramaters
        foreach ($params as $key => $value){
            $$key = $value;
        }

        //Return the only view file
        ob_start();
        include_once Application::$ROOT_DIRECTOR."/views/$view_name.php";
        return ob_get_clean();
    }

}