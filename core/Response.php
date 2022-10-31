<?php

namespace app\core;

class Response{

    //Set the status codes
    public function setStatusCode(int $code){
        http_response_code($code);
    }
}