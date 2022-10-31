<?php

namespace app\core;

class Controller{

    //Create a render view method
    public function render($view_name,$parameters = []) {
        return Application::$app->router->renderView($view_name,$parameters);
    }
    
}