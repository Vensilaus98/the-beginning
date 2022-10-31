<?php

namespace app\core;

class Request
{
    public function getPath(){

        // Get Full Request Uri
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        // check if the url is supplied with parameters
        $position = strpos($path,'?');

        if($position == false){
            //return path if the requestUri has no parameters
            return $path;
        }

        //If there is parameters return only the url
        return substr($path, 0, $position);
    }

    public function getMethod(){

        //Get the request method (GET /POST)
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBody(){

        //Get request body
        $request_body = [];

        if($this->getMethod() === 'get'){
            foreach($_GET as $key => $value){
                $request_body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        
        if($this->getMethod() === 'post'){
            foreach($_POST as $key => $value){
                $request_body[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
    }
}